<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jawaban_model extends CI_Model {

    /**
     * Mengambil semua soal beserta jawaban user (jika ada),
     * lengkap dengan opsi, nilai, dan tanggal dibuat.
     * Jika user belum menjawab, tetap ditampilkan.
     * 
     * @param int $id_user
     * @return array
     */
    public function get_jawaban_detail_by_user($id_user) {
        $this->db->select('
            s.id_soal,
            s.pertanyaan,
            ju.id_opsi,
            o.teks_opsi AS jawaban_text,
            ju.nilai,
            ju.created_at
        ');
        $this->db->from('soal s');
        $this->db->join('jawaban_user ju', 's.id_soal = ju.id_soal AND ju.id_user = ' . $this->db->escape($id_user), 'left');
        $this->db->join('opsi o', 'ju.id_opsi = o.id_opsi', 'left');
        $this->db->order_by('s.id_soal', 'ASC');

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
