<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HitungAHP extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Jawaban_model');
        $this->load->model('Kursus_model');
        $this->load->model('Soal_model'); // Load di constructor supaya tidak di-load ulang di method lain
    }

public function index() {
    $id_user = $this->session->userdata('id');
    if (!$id_user) {
        redirect('auth/login');
    }

    // Ambil data user untuk ditampilkan di view
    $user = $this->db->get_where('users', ['id' => $id_user])->row(); // Asumsi tabel 'users' dan field 'name' ada

    // Ambil jawaban lengkap user untuk tabel tampilan
    $data['jawaban'] = $this->Jawaban_model->get_jawaban_detail_by_user($id_user);

    // Ambil jawaban dalam format id_soal => nilai, untuk hitung AHP
    $jawaban_nilai = $this->Jawaban_model->get_jawaban_by_user($id_user);

    if (empty($jawaban_nilai)) {
        $this->session->set_flashdata('error', 'Anda belum mengisi kuesioner.');
        redirect('kuesioner');
    }

    // Hitung skor AHP berdasarkan jawaban
    $hasil_ahp = $this->hitung_ahp($jawaban_nilai);

    // Ambil semua kursus dari database
    $kursus = $this->Kursus_model->get_all_kursus();

    // Gabungkan skor AHP dengan data kursus untuk rekomendasi
    $rekomendasi = [];
    foreach ($kursus as $k) {
        // Ambil skor berdasarkan id_kursus, jika tidak ada skor maka 0
        $skor = isset($hasil_ahp[$k->id_kursus]) ? $hasil_ahp[$k->id_kursus] : 0;

        $rekomendasi[] = [
            'nama_kursus' => $k->nama_kursus,
            'deskripsi' => $k->deskripsi,
            'tujuan' => $k->tujuan,
            'skor' => $skor
        ];
    }

    // Urutkan rekomendasi berdasarkan skor terbesar ke kecil
    usort($rekomendasi, function($a, $b) {
        return $b['skor'] <=> $a['skor'];
    });

    // Kirim data rekomendasi dan data user ke view
    $data['rekomendasi'] = $rekomendasi;
    $data['user_name'] = $user->nama;  // Asumsi nama user ada di field 'name'

    // Render view hasil.php
    $this->load->view('template-mahasiswa/header', ['title' => 'Hasil Rekomendasi']);
    $this->load->view('template-mahasiswa/sidebar');
    $this->load->view('hasil', $data); // Kirim data user_name ke view 'hasil'
    $this->load->view('template-mahasiswa/footer');
}


    /**
     * Hitung skor AHP berdasarkan jawaban user
     * @param array $jawaban format: [id_soal => nilai]
     * @return array skor normalisasi per id_kursus
     */
    private function hitung_ahp($jawaban) {
        // Ambil mapping soal ke kursus, format: [id_soal => id_kursus]
        $map_soal_kursus = $this->Soal_model->get_mapping_soal_to_kursus();

        $skor = [];

        foreach ($jawaban as $id_soal => $nilai) {
            if (isset($map_soal_kursus[$id_soal])) {
                $id_kursus = $map_soal_kursus[$id_soal];

                if (!isset($skor[$id_kursus])) {
                    $skor[$id_kursus] = 0;
                }
                $skor[$id_kursus] += $nilai;
            }
        }

        // Normalisasi skor supaya totalnya 1 (bila total skor > 0)
        $total = array_sum($skor);
        if ($total > 0) {
            foreach ($skor as $key => $val) {
                $skor[$key] = round($val / $total, 4);
            }
        } else {
            // Jika total 0, semua skor tetap 0 agar tidak error
            foreach ($skor as $key => $val) {
                $skor[$key] = 0;
            }
        }

        return $skor;
    }
}