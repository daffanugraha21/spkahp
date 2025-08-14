<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

    public function index() {
        $data['title'] = 'Kriteria';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/kriteria');
        $this->load->view('template/footer');
    }
}
