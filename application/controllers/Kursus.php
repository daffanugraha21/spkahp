<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kursus extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kursus_model');
    }

    public function index() {
        $data['title'] = 'Data Kursus';
        $data['kursus'] = $this->Kursus_model->getAll();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        // Load view sesuai folder kamu
        $this->load->view('admin/kursus', $data);
        $this->load->view('template/footer');
    }

    public function tambah_form() {
        $data['title'] = 'Tambah Kursus';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        // Sesuai struktur folder kamu
        $this->load->view('admin/tambah');
        $this->load->view('template/footer');
    }

    public function tambah() {
        $this->Kursus_model->insert();
        redirect('kursus');
    }

    public function edit($id_kursus) {
        $data['title'] = 'Edit Kursus';
        $data['kursus'] = $this->Kursus_model->getById($id_kursus);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        // Sesuaikan dengan folder views kamu
        $this->load->view('admin/edit', $data);
        $this->load->view('template/footer');
    }

    public function update() {
        $this->Kursus_model->update();
        redirect('kursus');
    }

    public function hapus($id_kursus) {
        $this->Kursus_model->delete($id_kursus);
        redirect('kursus');
    }
}