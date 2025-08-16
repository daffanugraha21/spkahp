<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

     public function __construct() {
        parent::__construct();
        $this->load->model('Kriteria_model');
    }

    public function index() {
        $data['title'] = 'Kriteria';
        $data['kriteria'] = $this->Kriteria_model->get_all();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/kriteria');
        $this->load->view('template/footer');
    }

     // Tampilkan form tambah
    public function tambah_kriteria() {
        $this->load->view('admin/tambah_kriteria');
    }

    // Proses simpan data baru
    public function store() {
        $data = [
            'nama_kriteria' => $this->input->post('nama_kriteria', true)
        ];
        $this->Kriteria_model->insert($data);
        redirect('kriteria');
    }

    // Tampilkan form edit
    public function edit_kriteria($id) {
        $data['kriteria'] = $this->Kriteria_model->get_by_id($id);
        $this->load->view('admin/edit_kriteria', $data);
    }

    // Proses update data
    public function update($id) {
        $data = [
            'nama_kriteria' => $this->input->post('nama_kriteria', true)
        ];
        $this->Kriteria_model->update($id, $data);
        redirect('kriteria');
    }

    // Hapus data
    public function delete($id) {
        $this->Kriteria_model->delete($id);
        redirect('kriteria');
    }
}
