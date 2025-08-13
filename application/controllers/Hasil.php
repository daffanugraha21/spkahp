<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller {

    public function index() {
        $data['title'] = 'Hasil';
        $this->load->view('template-mahasiswa/header', $data);
        $this->load->view('template-mahasiswa/sidebar');
        $this->load->view('hasil'); // halaman konten
        $this->load->view('template-mahasiswa/footer');
    }
}
