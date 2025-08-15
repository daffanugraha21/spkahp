<?php
// Pastikan file tidak bisa diakses langsung lewat URL
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    // Constructor akan dijalankan otomatis saat class ini dipanggil
    public function __construct() {
        parent::__construct();
        // Load model User_model agar bisa ambil data user
        $this->load->model('User_model');
    }

    // Fungsi utama saat buka halaman profile
    public function index() {
        // Ambil 'npm' dari session yang diset saat login
        $npm = $this->session->userdata('npm');

        // Set judul halaman
        $data['title'] = 'Profile';

        // Ambil data user berdasarkan NPM
        $data['user'] = $this->User_model->get_by_npm($npm);

        // Load bagian-bagian view
        $this->load->view('template-mahasiswa/header', $data); // Header dengan title
        $this->load->view('template-mahasiswa/sidebar');       // Sidebar
        $this->load->view('profile', $data);                   // Konten profile utama
        $this->load->view('template-mahasiswa/footer');        // Footer
    }
}
