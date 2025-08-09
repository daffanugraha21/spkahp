<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load library session untuk cek status login
        $this->load->library('session');
        // Jika belum login, arahkan ke halaman login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    // Fungsi untuk menampilkan halaman utama setelah login
    public function index() {
        $this->load->view('home');
    }
}
