<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kursus extends CI_Controller {

    public function index() {
        $data['title'] = 'Kursus';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/kursus');
        $this->load->view('template/footer');
    }
}
