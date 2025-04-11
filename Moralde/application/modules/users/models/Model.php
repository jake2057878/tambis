<?php

class Model extends CI_Model {

    // This method gets the user count
    public function get_user_count() {
        return $this->db->count_all('users');  // Count all users from the 'users' table
    }

    // This method can fetch user data based on certain conditions (if needed)
    public function getdata($table, $where) {
        return $this->db->get_where($table, $where)->row(); // Return a single row if user is found
    }
    public function insertData($table, $data) {
        return $this->db->insert($table, $data);  // Insert data into the specified table
    }

    // Other methods (e.g., get_user_count, getdata)...
}

    // Add other methods as needed...
