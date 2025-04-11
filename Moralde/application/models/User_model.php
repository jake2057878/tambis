<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Method to fetch all users from the database
    public function get_all_users() {
        $query = $this->db->get('users');
        return $query->result_array();
    }
    public function insertData($table, $data) {
        return $this->db->insert($table, $data);
    }
}
