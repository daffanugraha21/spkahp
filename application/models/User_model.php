<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

      public function __construct()
    {
        parent::__construct(); // Panggil constructor CI_Model
        $this->load->database(); // Load database supaya $this->db bisa dipakai
    }

    // Fungsi untuk menyimpan data user baru ke database
    public function insert($data) {
        return $this->db->insert('users', $data);
    }

    // Fungsi untuk mencari user berdasarkan NPM
    public function get_by_npm($npm) {
        return $this->db->get_where('users', ['npm' => $npm])->row();
    }
}