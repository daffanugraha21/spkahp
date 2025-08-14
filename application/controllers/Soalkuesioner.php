<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soalkuesioner extends CI_Controller {

    public function index() {
        $data['title'] = 'Soal Kuesioner';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/soalkuesioner');
        $this->load->view('template/footer');
    }
}
