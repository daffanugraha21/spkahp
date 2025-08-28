<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jawaban_model extends CI_Model {

    /**
     * Mengambil jawaban lengkap dengan join ke tabel soal dan opsi,
     * berdasarkan id_user.
     * Mengembalikan array objek jawaban dengan detail pertanyaan, opsi,
     * nilai, dan tanggal dibuat.
     * 
     * @param int $id_user
     * @return array
     */
    public function get_jawaban_detail_by_user($id_user) {
        $this->db->select('
            ju.id_soal,
            s.pertanyaan,
            ju.id_opsi,
            o.teks_opsi as jawaban_text,
            ju.nilai,
            ju.created_at
        ');
        $this->db->from('jawaban_user ju');
        $this->db->join('soal s', 'ju.id_soal = s.id_soal');
        $this->db->join('opsi o', 'ju.id_opsi = o.id_opsi', 'left'); // opsi bisa jadi opsional
        $this->db->where('ju.id_user', $id_user);
        $this->db->order_by('ju.created_at', 'DESC');

        return $this->db->get()->result();
    }

    /**
     * Mengambil jawaban user dalam format array [id_soal => nilai]
     * untuk keperluan perhitungan AHP.
     * 
     * @param int $id_user
     * @return array
     */
    public function get_jawaban_by_user($id_user) {
        $this->db->select('id_soal, nilai');
        $this->db->where('id_user', $id_user);
        $result = $this->db->get('jawaban_user')->result();

        $jawaban = [];
        foreach ($result as $row) {
            $jawaban[$row->id_soal] = $row->nilai;
        }

        return $jawaban;
    }
}
