<?php $this->load->view('template-mahasiswa/header'); ?>
<?php $this->load->view('template-mahasiswa/sidebar'); ?>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

  <!-- Mulai Konten Utama -->
<div class="content-wrapper">
  <section class="content-header">
    <h1 class="judul-halaman">Kuesioner</h1>
  </section>

  <section class="content">
    <div class="container-fluid">
      <p class="kuesioner">Ini halaman kuesioner kamu.</p>
      <button type="button" class="btn btn-primary">Kerjakan Kuesioner</button>
    </div>
  </section>
</div>
<!-- Akhir Konten Utama -->

<?php $this->load->view('template-mahasiswa/footer'); ?>
