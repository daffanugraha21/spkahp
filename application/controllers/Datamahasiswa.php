<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datamahasiswa extends CI_Controller {

    public function index() {
        $data['title'] = 'Data Mahasiswa';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/datamahasiswa');
        $this->load->view('template/footer');
    }
}
