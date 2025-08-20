<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soalkuesioner extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Soal_model'); // model soal
        $this->load->model('Opsi_model'); // model opsi
        $this->load->helper(array('url','form'));
        $this->load->library('session'); // buat flashdata
        $this->load->library('pagination'); // tambahkan library pagination
    }

    // Halaman utama daftar soal (pakai pagination)
    public function index()
    {
        $data['title'] = 'Soal Kuesioner';

        // Konfigurasi pagination
        $config['base_url'] = site_url('soalkuesioner/index');
        $config['total_rows'] = $this->Soal_model->count_all_soal();
        $config['per_page'] = 4;
        $config['uri_segment'] = 3;

        // Styling pagination (Bootstrap 4/5)
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = '&raquo;';
        $config['prev_link'] = '&laquo;';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = ['class' => 'page-link'];

        // Inisialisasi pagination
        $this->pagination->initialize($config);

        // Ambil data soal sesuai halaman
        $start = $this->uri->segment(3, 0);
        $data['soal'] = $this->Soal_model->get_soal_pagination($config['per_page'], $start);
        $data['pagination'] = $this->pagination->create_links();

        // Load view
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/soalkuesioner', $data); 
        $this->load->view('template/footer');
    }

    // Tambah soal
    public function tambah_soal()
    {
        if ($this->input->post()) {
            $data = [
                'pertanyaan' => $this->input->post('pertanyaan')
            ];
            $this->Soal_model->insert_soal($data);

            $this->session->set_flashdata('success', 'Soal berhasil ditambahkan!');
            redirect('soalkuesioner');
        }

        $data['title'] = 'Tambah Soal';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/tambah_soal');
        $this->load->view('template/footer');
    }

    // Edit soal
    public function edit_soal($id_soal)
    {
        if ($this->input->post()) {
            $data = [
                'pertanyaan' => $this->input->post('pertanyaan')
            ];
            $this->Soal_model->update_soal($id_soal, $data);

            $this->session->set_flashdata('success', 'Soal berhasil diupdate!');
            redirect('soalkuesioner');
        }

        $data['title'] = 'Edit Soal';
        $data['soal']  = $this->Soal_model->get_soal_by_id($id_soal);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/edit_soal', $data);
        $this->load->view('template/footer');
    }

    // Hapus soal
    public function hapus_soal($id_soal)
    {
        $this->Soal_model->delete_soal($id_soal);

        $this->session->set_flashdata('success', 'Soal berhasil dihapus!');
        redirect('soalkuesioner');
    }

    // Kelola opsi per soal
    public function opsi($id_soal)
    {
        // ambil data soal
        $data['soal'] = $this->Soal_model->get_soal_by_id($id_soal);

        // kalau submit tambah opsi
        if ($this->input->post('tambah_opsi')) {
            $opsi = [
                'soal_id'   => $id_soal,  // foreign key
                'teks_opsi' => $this->input->post('teks_opsi'),
                'nilai'     => $this->input->post('nilai'),
            ];
            $this->Opsi_model->insert_opsi($opsi);
            $this->session->set_flashdata('success', 'Opsi berhasil ditambahkan!');
            redirect('soalkuesioner/opsi/'.$id_soal);
        }

        // ambil data opsi berdasarkan soal
        $data['opsi'] = $this->Opsi_model->get_by_soal($id_soal);
        $data['title'] = 'Kelola Opsi';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/opsi', $data);
        $this->load->view('template/footer');
    }

    // Hapus opsi
    public function hapus_opsi($id_opsi, $id_soal)
    {
        $this->Opsi_model->delete_opsi($id_opsi);
        $this->session->set_flashdata('success', 'Opsi berhasil dihapus!');
        redirect('soalkuesioner/opsi/'.$id_soal);
    }
}