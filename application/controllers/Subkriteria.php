<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subkriteria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Subkriteria_model');
        $this->load->model('Kriteria_model'); // untuk dropdown
    }

    public function index() {
        $data['title'] = 'Sub Kriteria';
        $data['subkriteria'] = $this->Subkriteria_model->get_all();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/subkriteria');
        $this->load->view('template/footer');
    }

    public function tambah_subkriteria() {
        $data['kriteria'] = $this->Kriteria_model->get_all(); // dropdown kriteria
        $this->load->view('admin/tambah_subkriteria', $data);
    }

    public function store() {
        $data = [
            'nama_subkriteria' => $this->input->post('nama_subkriteria'),
            'id_kriteria'      => $this->input->post('id_kriteria'),
            'tipe'             => $this->input->post('tipe'),
            'nilai_minimum'    => $this->input->post('nilai_minimum'),
            'nilai_maksimum'   => $this->input->post('nilai_maksimum'),
            'op_min'           => $this->input->post('op_min'),
            'op_max'           => $this->input->post('op_max'),
            'id_nilai'         => $this->input->post('id_nilai')
        ];
        $this->Subkriteria_model->insert($data);
        redirect('subkriteria');
    }

    public function edit($id) {
        $data['subkriteria'] = $this->Subkriteria_model->get_by_id($id);
        $data['kriteria'] = $this->Kriteria_model->get_all();
        $this->load->view('admin/edit_subkriteria', $data);
    }

    public function update($id) {
        $data = [
            'nama_subkriteria' => $this->input->post('nama_subkriteria'),
            'id_kriteria'      => $this->input->post('id_kriteria'),
            'tipe'             => $this->input->post('tipe'),
            'nilai_minimum'    => $this->input->post('nilai_minimum'),
            'nilai_maksimum'   => $this->input->post('nilai_maksimum'),
            'op_min'           => $this->input->post('op_min'),
            'op_max'           => $this->input->post('op_max'),
            'id_nilai'         => $this->input->post('id_nilai')
        ];
        $this->Subkriteria_model->update($id, $data);
        redirect('subkriteria');
    }

    public function delete($id) {
        $this->Subkriteria_model->delete($id);
        redirect('subkriteria');
    }
}
