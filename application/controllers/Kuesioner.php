<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuesioner extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Soal_model');
    }

    public function index() {
        $data['title'] = 'Kuesioner';
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

        // Simpan jawaban ke database, ambil nilai dari tabel opsi berdasarkan id_opsi
        foreach ($jawaban as $id_soal => $id_opsi) {
            // Ambil nilai opsi dari database
            $opsi = $this->db->get_where('opsi', ['id_opsi' => $id_opsi])->row();
            $nilai = $opsi ? $opsi->nilai : 0; // default 0 kalau gak ditemukan

            $data = [
                'id_soal' => $id_soal,
                'id_opsi' => $id_opsi,
                'nilai'   => $nilai,
                'id_user' => $id_user,
                'created_at' => date('Y-m-d H:i:s')
            ];
            $this->db->insert('jawaban_user', $data);
        }

        $this->session->set_flashdata('success', 'Jawaban berhasil disimpan.');
        redirect('hasil');
    }
}
