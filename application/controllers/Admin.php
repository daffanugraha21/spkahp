<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index() {
        redirect('admin/login');
    }
    // public function index() {
    //     redirect('beranda/admin/login');
    // }

    public function login() {
        $this->load->view('admin/login');
    }

    public function do_login() {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $admin = $this->Admin_model->login($username, $password);

      // if ($admin) {
      //     echo "Login berhasil!<br>";
      //     print_r($admin);
      //     exit;
      // } else {
      //     echo "Login gagal!";
      //     exit;
      // }

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
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        $this->load->view('admin/dashboard');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('beranda');
    }
}
