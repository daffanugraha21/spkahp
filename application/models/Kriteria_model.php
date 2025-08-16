<?php
class Kriteria_model extends CI_Model {

    // Ambil semua data
    public function get_all() {
        return $this->db->get('kriteria')->result();
    }

    // Simpan data baru
    public function insert($data) {
        return $this->db->insert('kriteria', $data);
    }

    // Ambil data berdasarkan ID
    public function get_by_id($id) {
        return $this->db->get_where('kriteria', ['id_kriteria' => $id])->row();
    }

    // Update data
    public function update($id, $data) {
        $this->db->where('id_kriteria', $id);
        return $this->db->update('kriteria', $data);
    }

    // Hapus data
    public function delete($id) {
        return $this->db->delete('kriteria', ['id_kriteria' => $id]);
    }
}
