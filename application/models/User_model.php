<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // CREATE
    public function insert($data)
    {
        return $this->db->insert('users', $data);
    }

    // READ by NPM
    public function get_by_npm($npm)
    {
        return $this->db->get_where('users', ['npm' => $npm])->row();
    }

    // READ all
    public function get_all_users()
    {
        return $this->db->get('users')->result();
    }

    // READ by ID (buat edit / delete)
    public function get_by_id($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    // UPDATE
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    // DELETE
    public function delete($id)
    {
        return $this->db->delete('users', ['id' => $id]);
    }
}
