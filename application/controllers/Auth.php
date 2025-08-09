<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model untuk akses tabel users
        $this->load->model('User_model');
        // Load library session untuk menyimpan data login
        $this->load->library('session');
        // Load helper url & form untuk mempermudah pembuatan form dan redirect
        $this->load->helper(['url', 'form']);
    }

    // ==================== LOGIN ====================
    public function login() {
        // Cek apakah form login sudah di-submit (HTTP POST)
        if ($this->input->post()) {
            // Ambil input NPM dan password dari form
            $npm = $this->input->post('npm');
            $password = $this->input->post('password');

            // Ambil data user berdasarkan NPM
            $user = $this->User_model->get_by_npm($npm);

            // Jika user ditemukan dan password cocok
            if ($user && password_verify($password, $user->password)) {
                // Simpan data user ke session untuk menandakan sudah login
                $this->session->set_userdata([
                    'id'       => $user->id,
                    'npm'      => $user->npm,
                    'nama'     => $user->nama,
                    'logged_in'=> TRUE
                ]);
                // Arahkan ke halaman home
                redirect('home');
            } else {
                // Jika login gagal, tampilkan pesan error
                $this->session->set_flashdata('error', 'NPM atau password salah!');
            }
        }
        // Tampilkan halaman login
        $this->load->view('auth/login');
    }

    // ==================== REGISTER ====================
    public function register() {
        // Cek apakah form registrasi sudah di-submit
        if ($this->input->post()) {
            // Siapkan data untuk disimpan ke database
            $data = [
                'npm'      => $this->input->post('npm'),
                'nama'     => $this->input->post('nama'),
                'email'    => $this->input->post('email'),
                'jurusan'  => $this->input->post('jurusan'),
                'fakultas' => $this->input->post('fakultas'),
                // Password di-hash agar aman
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];

            // Simpan data ke tabel users
            $this->User_model->insert($data);

            // Kirim pesan sukses dan arahkan ke login
            $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
            redirect('auth/login');
        }
        // Tampilkan halaman registrasi
        $this->load->view('auth/register');
    }

    // ==================== LOGOUT ====================
    // public function logout() {
    //     // Hapus semua data session
    //     $this->session->sess_destroy();
    //     // Arahkan kembali ke halaman login
    //     redirect('auth/login');
    // }

    // V2
    public function logout() {
        $this->session->sess_destroy();
        redirect('beranda');
    }
}
