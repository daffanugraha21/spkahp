<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasilkuesioner extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');    // Model untuk mengambil data user
        $this->load->model('Jawaban_model'); // Model untuk mengambil hasil AHP
        $this->load->model('Kursus_model');  // Model untuk kursus
        $this->load->model('Soal_model');    // Model untuk soal dan AHP
        $this->load->library(['session']);
        $this->load->helper(['url', 'form']);
    }

    public function index() {
        $data['title'] = 'Hasil Kuesioner';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/hasilkuesioner');
        $this->load->view('template/footer');
    }

        // Hasil Kuesioner untuk Admin (Ganti nama fungsi menjadi hasilkuesioner)
    public function hasilkuesioner() {
        $this->cek_login();

        // Ambil semua data user
        $data['users'] = $this->User_model->get_all_users(); // Ambil semua user

        // Ambil hasil AHP dan rekomendasi untuk setiap user
        $data['hasil'] = [];
        foreach ($data['users'] as $user) {
            // Ambil data jawaban dari user
            $jawaban_nilai = $this->Jawaban_model->get_jawaban_by_user($user->id);
            
            // Hitung hasil AHP
            $hasil_ahp = $this->hitung_ahp($jawaban_nilai);

            // Ambil kursus untuk user
            $kursus = $this->Kursus_model->get_all_kursus();

            // Gabungkan hasil AHP dengan kursus untuk rekomendasi
            $rekomendasi = [];
            foreach ($kursus as $k) {
                $skor = isset($hasil_ahp[$k->id_kursus]) ? $hasil_ahp[$k->id_kursus] : 0;
                $rekomendasi[] = [
                    'nama_kursus' => $k->nama_kursus,
                    'deskripsi' => $k->deskripsi,
                    'tujuan' => $k->tujuan,
                    'skor' => $skor
                ];
            }

            // Urutkan berdasarkan skor terbesar
            usort($rekomendasi, function($a, $b) {
                return $b['skor'] <=> $a['skor'];
            });

            $data['hasil'][] = [
                'user' => $user,
                'rekomendasi' => $rekomendasi
            ];
        }

        // Tampilkan hasil di halaman admin
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('hasilkuesioner', $data);  // Pastikan nama view sama
        $this->load->view('template/footer');
    }

    // Helper untuk pengecekan login
    private function cek_login() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    }

    // Hitung skor AHP berdasarkan jawaban user
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

        // Normalisasi skor supaya totalnya 1
        $total = array_sum($skor);
        if ($total > 0) {
            foreach ($skor as $key => $val) {
                $skor[$key] = round($val / $total, 4);
            }
        } else {
            foreach ($skor as $key => $val) {
                $skor[$key] = 0;
            }
        }

        return $skor;
    }
}
