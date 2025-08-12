<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password)); // atau bcrypt kalau mau lebih aman
        $query = $this->db->get('admin'); // tabel admin

        if ($query->num_rows() == 1) {
            return $query->row();
        }
        return false;
    }
}
