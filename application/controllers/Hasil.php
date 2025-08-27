<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load database, session, model jika diperlukan
    }

    public function index() {
        $data['title'] = 'Hasil';

        $id_user = $this->session->userdata('id'); // Cek login
        if (!$id_user) {
            redirect('auth/login');
        }

        // 1. Ambil jawaban user lengkap (untuk ditampilkan di tabel)
        $this->db->select('ju.*, s.pertanyaan, o.teks_opsi AS jawaban_text');
        $this->db->from('jawaban_user ju');
        $this->db->join('soal s', 's.id_soal = ju.id_soal', 'left');
        $this->db->join('opsi o', 'o.id_opsi = ju.id_opsi', 'left');
        $this->db->where('ju.id_user', $id_user);
        $data['jawaban'] = $this->db->get()->result();

        // 2. Ambil nilai jawaban + bobot kriteria (lewat tabel soal)
        $jawaban = $this->db->select('s.id_kriteria, ju.nilai, bk.bobot AS bobot_global')
            ->from('jawaban_user ju')
            ->join('soal s', 's.id_soal = ju.id_soal')
            ->join('bobot_kriteria bk', 'bk.id_kriteria = s.id_kriteria')
            ->where('ju.id_user', $id_user)
            ->get()->result();

        // 3. Ambil semua bobot kursus berdasarkan kriteria
        $bobot_kursus = $this->db->get('bobot_kursus')->result();

        // 4. Proses AHP: Hitung skor setiap kursus
        $skor_kursus = [];

        foreach ($bobot_kursus as $bk) {
            foreach ($jawaban as $j) {
                if ($j->id_kriteria == $bk->id_kriteria) {
                    $nilai_akhir = $j->nilai * $j->bobot_global * $bk->bobot;

                    if (!isset($skor_kursus[$bk->id_kursus])) {
                        $skor_kursus[$bk->id_kursus] = 0;
                    }

                    $skor_kursus[$bk->id_kursus] += $nilai_akhir;
                }
            }
        }

        // 5. Ambil info kursus berdasarkan skor tertinggi
        $data['rekomendasi'] = [];
        if (!empty($skor_kursus)) {
            arsort($skor_kursus); // Urutkan dari skor tertinggi

            foreach ($skor_kursus as $id_kursus => $skor) {
                $kursus = $this->db->get_where('kursus', ['id_kursus' => $id_kursus])->row();

                if ($kursus) {
                    $data['rekomendasi'][] = [
                        'nama_kursus' => $kursus->nama_kursus,
                        'skor'        => round($skor, 4),
                        'deskripsi'   => $kursus->deskripsi,
                        'tujuan'      => $kursus->tujuan
                    ];
                }
            }
        }

        // 6. Load tampilan
        $this->load->view('template-mahasiswa/header', $data);
        $this->load->view('template-mahasiswa/sidebar');
        $this->load->view('hasil', $data);
        $this->load->view('template-mahasiswa/footer');
    }
}