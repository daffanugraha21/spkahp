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

    // ---------------- Soal ----------------
    public function get_all_soal() {
        return $this->db->get('soal')->result();
    }

    public function insert_soal($data) {
        return $this->db->insert('soal', $data);
    }

    public function get_soal_by_id($id) {
        return $this->db->get_where('soal', ['id_soal' => $id])->row();
    }

    public function update_soal($id, $data) {
        return $this->db->where('id_soal', $id)->update('soal', $data);
    }

    public function delete_soal($id) {
        $this->db->delete('opsi', ['soal_id' => $id]); // hapus opsi dulu
        return $this->db->delete('soal', ['id_soal' => $id]);
    }

    // ---------------- Opsi ----------------
    public function get_opsi_by_soal($soal_id) {
        return $this->db->get_where('opsi', ['soal_id' => $soal_id])->result();
    }

    public function insert_opsi($data) {
        return $this->db->insert('opsi', $data);
    }

    public function update_opsi($id, $data) {
        return $this->db->where('id_opsi', $id)->update('opsi', $data);
    }

    public function delete_opsi($id) {
        return $this->db->delete('opsi', ['id_opsi' => $id]);
    }
}
