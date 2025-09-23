<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('User_model');  // Model untuk mengambil data user
        $this->load->model('Jawaban_model'); // Model untuk mengambil hasil AHP
        $this->load->library(['session']);
        $this->load->helper(['url', 'form']);
    }

    // ---------------- Login ----------------
    public function index() {
        redirect('admin/login');
    }

    public function login() {
        $this->load->view('admin/login');
    }

    public function do_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->Admin_model->login($username, $password);

        if ($admin) {
            $this->session->set_userdata('admin_logged_in', true);
            $this->session->set_userdata('admin_id', $admin->id);
            redirect('admin/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('admin/login');
        }
    }

    public function dashboard() {
        $this->cek_login();
        $this->load->view('admin/dashboard');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/login');
    }

    // ---------------- Data User ----------------
    public function data_user() {
        $this->cek_login();

        // Ambil data user dari model User_model
        $data['users'] = $this->User_model->get_all_users(); // Pastikan method ini ada di model User_model
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/data_user', $data); // Kirim data user ke view
        $this->load->view('admin/template/footer');
    }

    // ---------------- Hasil User ----------------
    public function hasil_user($id_user) {
        $this->cek_login();

        // Ambil data jawaban dan hasil AHP untuk user tertentu
        $data['jawaban'] = $this->Jawaban_model->get_jawaban_detail_by_user($id_user);
        $jawaban_nilai = $this->Jawaban_model->get_jawaban_by_user($id_user);
        
        // Hitung hasil AHP
        $hasil_ahp = $this->hitung_ahp($jawaban_nilai);
        $kursus = $this->Kursus_model->get_all_kursus();
        
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
        
        usort($rekomendasi, function($a, $b) {
            return $b['skor'] <=> $a['skor'];
        });

        $data['rekomendasi'] = $rekomendasi;

        // Kirim data hasil per user ke view
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/hasil_user', $data);
        $this->load->view('admin/template/footer');
    }

    private function hitung_ahp($jawaban) {
        // Hitung skor AHP berdasarkan jawaban user
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

    // ---------------- Helper ----------------
    private function cek_login() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    }
}
