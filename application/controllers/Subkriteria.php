<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subkriteria extends CI_Controller {

    public function index() {
        $data['title'] = 'Sub Kriteria';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/subkriteria');
        $this->load->view('template/footer');
    }
}
