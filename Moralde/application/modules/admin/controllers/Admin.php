<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model');  // Load the Model
        $this->load->library('form_validation');

    }

    // Method to load common views
    private function load_views($view_name, $data = []) {
        $this->load->view('header');
        $this->load->view('sidebar');
        $this->load->view($view_name, $data);
        $this->load->view('footer');
    }

    public function index() {
        $this->load_views('content');
    }

    // Method to show users
    public function users() {
        $data['users'] = $this->model->getResult('users');
        $this->load_views('users', $data);  
    }
    public function logout() {
        // Destroy the session to log out
        $this->session->sess_destroy();
        
        // Redirect the user to the login page after logout
        redirect(base_url()); // Redirect to the login page
    }

    // Method for user login
    public function login_process() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata("message", "Please fill in all fields correctly!");
            $this->session->set_flashdata("icon", "error");
            redirect(base_url());
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $where = ['email' => $email];

            $user = $this->model->getdata('users', $where);

            if ($user == null) {
                $this->session->set_flashdata("message", "Credentials are incorrect!");
                $this->session->set_flashdata("icon", "error");
                redirect(base_url());
            } else {
                if (password_verify($password, $user->password)) {
                    $this->session->set_flashdata("message", "Welcome " . $user->firstname . " " . $user->lastname);
                    $this->session->set_flashdata("icon", "success");
                    $this->session->set_userdata("user_data", $user); // Store user data in session
                    redirect(base_url('users/home/'));
                } else {
                    $this->session->set_flashdata("message", "Credentials are incorrect!");
                    $this->session->set_flashdata("icon", "error");
                    redirect(base_url());
                }
            }
        }
    }

    // Method for home page
    public function home() {
        $this->load_views('home');
    }
    public function register() {
        $this->load_views('registration');
    }


    public function reg_process() {
        // Set validation rules
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata("message", "Please fill in all fields correctly!");
            $this->session->set_flashdata("icon", "error");
            redirect(base_url('admin/register'));
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            $data = $this->input->post();

            unset($data['password']);
            unset($data['retype']);  // Remove unnecessary fields

            $data['password'] = $password;
            $data['usertype'] = 'user';
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');

            if ($this->model->insertData("users", $data)) {
                $this->session->set_flashdata("message", "Registration successful!");
                $this->session->set_flashdata("icon", "success");
                redirect(base_url('admin/login'));
            } else {
                $this->session->set_flashdata("message", "Error occurred during registration.");
                $this->session->set_flashdata("icon", "error");
                redirect(base_url('admin/register'));
            }
        }
    }
    // Method to handle user update
        public function update() {
            // Set form validation rules
            $this->form_validation->set_rules('firstname', 'First Name', 'required');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('birthday', 'Birthday', 'required');
            $this->form_validation->set_rules('usertype', 'User Type', 'required');
            // Validate the form
            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata("message", "Please fill in all fields correctly!");
                $this->session->set_flashdata("icon", "error");
                redirect('admin/users'); // Redirect back to users list
            } else {
                // Get user ID from the form
                $userId = $this->input->post('id');
                $data = [
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'middlename' => $this->input->post('middlename'),
                    'address' => $this->input->post('address'),
                    'birthday' => $this->input->post('birthday'),
                    'email' => $this->input->post('email'),
                    'gender' => $this->input->post('gender'),
                    'usertype' => $this->input->post('usertype'),
                    'updated_at' => date('Y-m-d H:i:s') // Set updated timestamp
                ];

                // Call model function to update the user in the database
                if ($this->model->updateData('users', $data, ['id' => $userId])) {
                    $this->session->set_flashdata("message", "User updated successfully!");
                    $this->session->set_flashdata("icon", "success");
                } else {
                    $this->session->set_flashdata("message", "Error occurred while updating user.");
                    $this->session->set_flashdata("icon", "error");
                }

                // Redirect back to the users list page
                redirect('admin/users');
            }
        }
        // Controller method to delete a user
public function delete($id) {
    // Delete the user from the database
    $where = ['id' => $id];
    if ($this->model->deleteData('users', $where)) {
        $this->session->set_flashdata('message', 'User deleted successfully!');
        $this->session->set_flashdata('icon', 'success');
    } else {
        $this->session->set_flashdata('message', 'Failed to delete user.');
        $this->session->set_flashdata('icon', 'error');
    }

    // Redirect back to the users page
    redirect(base_url('admin/users'));
}

}