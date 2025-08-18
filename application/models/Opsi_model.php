<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opsi_model extends CI_Model {

    // Ambil semua opsi berdasarkan soal_id
    public function get_by_soal($soal_id) {
        return $this->db->get_where('opsi', ['soal_id' => $soal_id])->result();
    }

    // Tambah opsi baru
    public function insert_opsi($data) {
        return $this->db->insert('opsi', $data);
         if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            log_message('error', 'Insert opsi gagal: ' . $this->db->last_query());
            return false;
        }
    }

    // Update opsi
    public function update_opsi($id_opsi, $data) {
        return $this->db->where('id_opsi', $id_opsi)
                        ->update('opsi', $data);
    }

    // Hapus opsi
    public function delete_opsi($id_opsi) {
        return $this->db->where('id_opsi', $id_opsi)
                        ->delete('opsi');
    }
}
