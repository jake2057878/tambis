<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {

    // Insert data into a table
    function insertData($table, $data) {
        return $this->db->insert($table, $data);
    }

    // Get a single row of data from a table
    function getdataRow($table, $where) {
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get()->row(); // Returns a single row
    }

    // Get multiple rows of data from a table
    function getResult($table, $where = array()) {
        $this->db->from($table);
        if (!empty($where)) {
            $this->db->where($where);
        }
        return $this->db->get()->result(); // Returns multiple rows as an array of objects
    }
    // User_model.php
 function get_user_count()
{
    return $this->db->count_all('users');  // Make sure 'users' is the correct table name
}

    // Update data in a table
    function updateData($table, $data, $where) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // Delete data from a table
    function deleteData($table, $where) {
        $this->db->delete($table, $where);
    }
}