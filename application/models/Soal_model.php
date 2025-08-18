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
}
