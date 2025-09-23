<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuesioner extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Soal_model');
        $this->load->library(['pagination', 'session']);
    }

    public function index() {
        $data['title'] = 'Kuesioner';

        // Konfigurasi Pagination
        $config['base_url'] = base_url('index.php/kuesioner/index');
        $config['total_rows'] = $this->Soal_model->count_all_soal();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = 10;

        // Styling Pagination Bootstrap
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? (int)$this->uri->segment(3) : 0;

        $data['soal'] = $this->Soal_model->get_soal_dan_opsi($config['per_page'], $page);
        $data['offset'] = $page;
        $data['total_soal'] = $config['total_rows'];
        $data['per_page'] = $config['per_page'];
        $data['is_last_page'] = ($page + $config['per_page']) >= $config['total_rows'];

        $this->load->view('template-mahasiswa/header', $data);
        $this->load->view('template-mahasiswa/sidebar');
        $this->load->view('kuesioner', $data);
        $this->load->view('template-mahasiswa/footer');
    }

    public function submit() {
        $jawaban = $this->input->post('jawaban');
        $current_page = (int)$this->input->post('current_page');
        $total_soal = $this->Soal_model->count_all_soal();
        $per_page = 5;

        // Cek jumlah jawaban dibanding jumlah soal di halaman ini
        $soal_halaman_ini = $this->Soal_model->get_soal_dan_opsi($per_page, $current_page); // ambil soal halaman sekarang
        if (count($jawaban ?? []) < count($soal_halaman_ini)) {
            $this->session->set_flashdata('error', 'Silakan isi semua pertanyaan sebelum lanjut.');
            redirect('kuesioner/index/' . $current_page);
        }

        // Simpan jawaban ke session (gabungkan jawaban yang baru dengan yang lama)
        $existing = $this->session->userdata('jawaban_kuesioner') ?? [];

        foreach ($jawaban as $id_soal => $id_opsi) {
            $existing[$id_soal] = $id_opsi;
        }

        $this->session->set_userdata('jawaban_kuesioner', $existing);

        $next_page = $current_page + $per_page;
        $is_last_page = ($next_page >= $total_soal);

        if ($is_last_page) {
            // Kirim ke database
            $id_user = $this->session->userdata('id');
            if (!$id_user) {
                redirect('auth/login');
            }

            foreach ($existing as $id_soal => $id_opsi) {
                $opsi = $this->db->get_where('opsi', ['id_opsi' => $id_opsi])->row();
                $nilai = $opsi ? $opsi->nilai : 0;

                $data = [
                    'id_soal' => $id_soal,
                    'id_opsi' => $id_opsi,
                    'nilai' => $nilai,
                    'id_user' => $id_user,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $this->db->insert('jawaban_user', $data);
            }

            $this->session->unset_userdata('jawaban_kuesioner');
            $this->session->set_flashdata('success', 'Jawaban berhasil disimpan.');
            redirect('hitungAHP');
        } else {
            redirect('kuesioner/index/' . $next_page);
        }
    }
}
