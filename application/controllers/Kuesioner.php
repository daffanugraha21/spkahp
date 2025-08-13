<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuesioner extends CI_Controller {

    public function index() {
        $data['title'] = 'Kuesioner';
        $this->load->view('template-mahasiswa/header', $data);
        $this->load->view('template-mahasiswa/sidebar');
        $this->load->view('kuesioner'); // halaman konten
        $this->load->view('template-mahasiswa/footer');
    }
}
