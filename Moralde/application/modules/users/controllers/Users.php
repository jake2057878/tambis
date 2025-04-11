<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller {

    public function __construct() {
        parent::__construct();
        // Load the necessary model
        $this->load->model(array('model')); 
    }

    // This method shows the login page
    public function index() {
        // Check if the user is already logged in
        if ($this->session->userdata('user_data')) {
            // Redirect to the appropriate home page based on the user type
            $user_data = $this->session->userdata('user_data');
            if ($user_data->usertype == 'admin') {
                redirect(base_url('admin')); // Redirect to admin page
            } else {
                redirect(base_url('users/home')); // Redirect to user home page
            }
        }
        $this->load->view('login'); // Load the login view if not logged in
    }

    // This method processes the login
    public function login_process() {
        // Get email and password from the login form
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        // Query the database to find the user with the given email
        $where = ['email' => $email];
        $row = $this->model->getdata('users', $where);

        if ($row == null) {
            // If the user doesn't exist, show an error message
            $this->session->set_flashdata("message", "Credentials are incorrect!");
            $this->session->set_flashdata("icon", "error");
            redirect(base_url()); // Redirect to login page
        } else {
            // If the user exists, verify the password
            if (password_verify($password, $row->password)) {
                // Set session data if login is successful
                $this->session->set_flashdata("message", "Welcome " . $row->firstname . " " . $row->lastname);
                $this->session->set_flashdata("icon", "success");
                $this->session->set_userdata('user_data', $row); // Store user data in session

                // Redirect to the appropriate page based on user type
                if ($row->usertype == 'admin') {
                    redirect(base_url('admin')); // Admin dashboard
                } else {
                    redirect(base_url('users/home')); // User home page
                }
            } else {
                // If the password is incorrect, show an error message
                $this->session->set_flashdata("message", "Credentials are incorrect!");
                $this->session->set_flashdata("icon", "error");
                redirect(base_url()); // Redirect to login page
            }
        }
    }

    // This method shows the user's home page after login
    public function home() {
        // Check if the user is logged in
        if (!$this->session->userdata('user_data')) {
            redirect(base_url()); // If not logged in, redirect to login page
        }

        // Get the number of users from the model
        $user_count = $this->model->get_user_count();
        
        // Pass the user count to the view
        $data['user_count'] = $user_count;

        // Load the user home view and pass the data
        $this->load->view('home', $data);
    }

    // This method loads the registration page
    public function register() {
        $this->load->view('registration');
    }

    // Place the logout method at the bottom of the class
    public function logout() {
        // Destroy the session to log the user out
        $this->session->sess_destroy();
        // Redirect to the login page after logout
        redirect(base_url());
    }

    // This method processes the user registration
    public function reg_process() {
    // Hash the password before saving it to the database
    $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

    // Get all input data from the form
    $data = $this->input->post();

    // Remove unnecessary data fields like 'password' and 'retype'
    unset($data['password']);
    unset($data['retype']);

    // Add the hashed password and set the user type as 'user'
    $data['password'] = $password;
    $data['usertype'] = 'user'; // Default user type

    // Add timestamps for created and updated fields
    $data['created_at'] = date('Y-m-d H:i:s');
    $data['updated_at'] = date('Y-m-d H:i:s');

    // Insert the user data into the database
    if ($this->db->insert('users', $data)) {
        // If data is successfully inserted
        $this->session->set_flashdata("message", "Data successfully saved!");
        $this->session->set_flashdata("icon", "success");
    } else {
        // If there was an error inserting data
        $this->session->set_flashdata("message", "Error occurred while saving the data!");
        $this->session->set_flashdata("icon", "error");
    }

    // Redirect to the login page after registration
    redirect(base_url());
}

    // Show the edit page for the user
    public function edit() {
        // Check if the user is logged in
        if (!$this->session->userdata('user_data')) {
            redirect(base_url()); // If not logged in, redirect to login page
        }

        $user_data = $this->session->userdata('user_data');
        // Fetch user data from the model
        $data['user'] = $this->model->getdata('users', ['id' => $user_data->id]);

        // Load the edit view and pass the data
        $this->load->view('edit', $data);
    }

    // Process the user update
    public function update() {
        // Check if the user is logged in
        if (!$this->session->userdata('user_data')) {
            redirect(base_url()); // If not logged in, redirect to login page
        }

        // Get the user data from the form
        $user_data = $this->session->userdata('user_data');
        $data = $this->input->post();

        // Check if the password is being updated
        if (!empty($data['password'])) {
            // Hash the new password
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        } else {
            // If the password is not updated, remove it from the data array
            unset($data['password']);
        }

        // Add updated timestamp
        $data['updated_at'] = date('Y-m-d H:i:s');

        // Update the user data in the database
        if ($this->model->updateData('users', $data, ['id' => $user_data->id])) {
            // If update is successful
            $this->session->set_flashdata("message", "Profile updated successfully!");
            $this->session->set_flashdata("icon", "success");
        } else {
            // If update fails
            $this->session->set_flashdata("message", "Error occurred while updating profile!");
            $this->session->set_flashdata("icon", "error");
        }

        // Redirect to the home page
        redirect(base_url('users/home'));
    }

    // Delete the user
    public function delete() {
        // Check if the user is logged in
        if (!$this->session->userdata('user_data')) {
            redirect(base_url()); // If not logged in, redirect to login page
        }

        // Get the logged-in user ID
        $user_data = $this->session->userdata('user_data');
        
        // Delete the user data from the database
        if ($this->model->deleteData('users', ['id' => $user_data->id])) {
            // If delete is successful
            $this->session->set_flashdata("message", "Account deleted successfully!");
            $this->session->set_flashdata("icon", "success");
            
            // Log the user out by destroying the session
            $this->session->sess_destroy();

            // Redirect to the login page after deletion
            redirect(base_url());
        } else {
            // If delete fails
            $this->session->set_flashdata("message", "Error occurred while deleting account!");
            $this->session->set_flashdata("icon", "error");
            
            // Redirect to the home page
            redirect(base_url('users/home'));
        }
    }
}
