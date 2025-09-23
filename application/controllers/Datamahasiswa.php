<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datamahasiswa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    // READ: Menampilkan data mahasiswa
    public function index() {
        $data['title'] = 'Data Mahasiswa';
        $data['users'] = $this->User_model->get_all_users();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/datamahasiswa', $data);
        $this->load->view('template/footer');
    }

    // CREATE: Form tambah mahasiswa
    public function tambah_mahasiswa() {
        $data['title'] = 'Tambah Mahasiswa';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/tambah_mahasiswa');
        $this->load->view('template/footer');
    }

    // CREATE: Simpan mahasiswa baru
    public function store_mahasiswa() {
        $data = [
            'nama'     => $this->input->post('nama'),
            'email'    => $this->input->post('email'),
            'jurusan'  => $this->input->post('jurusan'),
            'fakultas' => $this->input->post('fakultas')
        ];

        $this->User_model->insert($data);
        redirect('datamahasiswa');
    }

    // UPDATE: Form edit mahasiswa
    public function edit_mahasiswa($id) {
        $data['title'] = 'Edit Mahasiswa';
        $data['user']  = $this->User_model->get_by_id($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/edit_mahasiswa', $data);
        $this->load->view('template/footer');
    }

    // UPDATE: Simpan hasil edit
    public function update_mahasiswa($id) {
        $data = [
            'nama'     => $this->input->post('nama'),
            'email'    => $this->input->post('email'),
            'jurusan'  => $this->input->post('jurusan'),
            'fakultas' => $this->input->post('fakultas')
        ];

        $this->User_model->update($id, $data);
        redirect('datamahasiswa');
    }

    // DELETE: Hapus mahasiswa
    public function delete_mahasiswa($id) {
        $this->User_model->delete($id);
        redirect('datamahasiswa');
    }
}
