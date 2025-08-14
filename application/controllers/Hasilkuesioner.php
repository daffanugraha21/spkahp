<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasilkuesioner extends CI_Controller {

    public function index() {
        $data['title'] = 'Hasil Kuesioner';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/hasilkuesioner');
        $this->load->view('template/footer');
    }
}
