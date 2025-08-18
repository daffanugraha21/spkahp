<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opsi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Opsi_model');
        $this->load->model('Soal_model');
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
    }

    // Tampilkan halaman kelola opsi
    public function index($id_soal)
    {
        $data['soal'] = $this->Soal_model->get_soal_by_id($id_soal);
        $data['opsi'] = $this->Opsi_model->get_by_soal($id_soal);
        $data['title'] = 'Kelola Opsi';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/opsi', $data);
        $this->load->view('template/footer');
    }

    // Tambah opsi baru
    public function tambah($id_soal)
    {
        $data = [
            'soal_id'   => $id_soal,
            'teks_opsi' => $this->input->post('teks_opsi'),
            'nilai'     => $this->input->post('nilai')
        ];

        if ($this->Opsi_model->insert_opsi($data)) {
            $this->session->set_flashdata('success', 'Opsi berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan opsi!');
        }

        redirect('opsi/index/' . $id_soal);
    }

    // Hapus opsi
    public function hapus($id_opsi, $id_soal)
    {
        if ($this->Opsi_model->delete_opsi($id_opsi)) {
            $this->session->set_flashdata('success', 'Opsi berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus opsi!');
        }

        redirect('opsi/index/' . $id_soal);
    }
}
