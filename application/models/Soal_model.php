<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal_model extends CI_Model {

    public function get_all_soal()
    {
        return $this->db->get('soal')->result();
    }

    public function get_soal_by_id($id)
    {
        return $this->db->get_where('soal', ['id_soal' => $id])->row();
    }

    public function insert_soal($data)
    {
        return $this->db->insert('soal', $data);
    }

    public function update_soal($id, $data)
    {
        return $this->db->where('id_soal', $id)->update('soal', $data);
    }

    public function delete_soal($id)
    {
        return $this->db->delete('soal', ['id_soal' => $id]);
    }

    // === Tambahan untuk pagination ===

    // Mengambil jumlah total soal
    public function count_all_soal()
    {
        return $this->db->count_all('soal');
    }

    // Mengambil data soal berdasarkan limit dan start (offset)
    public function get_soal_pagination($limit, $start)
    {
        return $this->db->limit($limit, $start)->get('soal')->result();
    }

    public function get_soal_dan_opsi() {
        $this->db->order_by('id_soal', 'ASC');
        $soal_data = $this->db->get('soal')->result();

        foreach ($soal_data as $soal) {
            $this->db->where('soal_id', $soal->id_soal);
            $this->db->order_by('id_opsi', 'ASC');
            $soal->opsi = $this->db->get('opsi')->result(); // properti opsi sebagai array objek
        }

        return $soal_data; // array objek dengan nested opsi
    }
}