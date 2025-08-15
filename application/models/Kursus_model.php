<?php
class Kursus_model extends CI_Model {

  // Ambil semua data dari tabel kursus
  public function getAll() {
    return $this->db->get('kursus')->result();
  }

  // Tambah data baru ke tabel kursus
  public function insert() {
    $data = [
      'nama_kursus' => $this->input->post('nama_kursus'),
      'deskripsi' => $this->input->post('deskripsi'),
      'tujuan' => $this->input->post('tujuan'),
      'metode' => $this->input->post('metode'),
      'kontak' => $this->input->post('kontak'),
      'jumlah_pemilih' => $this->input->post('jumlah_pemilih'),
      'skor_ahp' => $this->input->post('skor_ahp'),
      'peringkat' => $this->input->post('peringkat')
    ];
    $this->db->insert('kursus', $data);
  }

  // Ambil data berdasarkan id_kursus
  public function getById($id_kursus) {
    return $this->db->get_where('kursus', ['id_kursus' => $id_kursus])->row();
  }

  // Update data kursus berdasarkan id_kursus
  public function update() {
    $data = [
      'nama_kursus' => $this->input->post('nama_kursus'),
      'deskripsi' => $this->input->post('deskripsi'),
      'tujuan' => $this->input->post('tujuan'),
      'metode' => $this->input->post('metode'),
      'kontak' => $this->input->post('kontak'),
      'jumlah_pemilih' => $this->input->post('jumlah_pemilih'),
      'skor_ahp' => $this->input->post('skor_ahp'),
      'peringkat' => $this->input->post('peringkat')
    ];
    $this->db->where('id_kursus', $this->input->post('id_kursus'));
    $this->db->update('kursus', $data);
  }

  // Hapus data kursus berdasarkan id_kursus
  public function delete($id_kursus) {
    $this->db->delete('kursus', ['id_kursus' => $id_kursus]);
  }
}