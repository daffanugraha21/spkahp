<?php
class Subkriteria_model extends CI_Model {

    public function get_all() {
        $this->db->select('subkriteria.*, kriteria.nama_kriteria');
        $this->db->from('subkriteria');
        $this->db->join('kriteria', 'kriteria.id_kriteria = subkriteria.id_kriteria');
        return $this->db->get()->result();
    }

    public function insert($data) {
        return $this->db->insert('subkriteria', $data);
    }

    public function get_by_id($id) {
        return $this->db->get_where('subkriteria', ['id_subkriteria' => $id])->row();
    }

    public function update($id, $data) {
        $this->db->where('id_subkriteria', $id);
        return $this->db->update('subkriteria', $data);
    }

    public function delete($id) {
        return $this->db->delete('subkriteria', ['id_subkriteria' => $id]);
    }
}
