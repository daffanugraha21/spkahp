<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuesioner extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Soal_model');
    }

    public function index() {
        $data['title'] = 'Kuesioner';
        // Ambil soal beserta opsi (pastikan di model sudah benar)
        $data['soal'] = $this->Soal_model->get_soal_dan_opsi();

        $this->load->view('template-mahasiswa/header', $data);
        $this->load->view('template-mahasiswa/sidebar');
        $this->load->view('kuesioner', $data);
        $this->load->view('template-mahasiswa/footer');
    }

    public function submit() {
        $jawaban = $this->input->post('jawaban');

        if (!$jawaban) {
            $this->session->set_flashdata('error', 'Anda harus mengisi semua pertanyaan.');
            redirect('kuesioner');
        }

        $id_user = $this->session->userdata('id');
        if (!$id_user) {
            redirect('auth/login');
        }

        // Simpan jawaban ke database
        foreach ($jawaban as $id_soal => $nilai) {
            $data = [
                'id_soal' => $id_soal,
                'nilai' => $nilai,
                'id_user' => $id_user,
                'created_at' => date('Y-m-d H:i:s')
            ];
            $this->db->insert('jawaban_user', $data);
        }

        // Redirect ke halaman hasil setelah submit
        redirect('hasil');
    }
}
