<?php $this->load->view('template-mahasiswa/header'); ?>  <!-- Load header mahasiswa -->
<?php $this->load->view('template-mahasiswa/sidebar'); ?> <!-- Load sidebar mahasiswa -->

<!-- Konten utama halaman -->
<div class="content-wrapper">
  <section class="content-header">
    <h1 class="judul-halaman">Profile</h1>
  </section>

  <!-- Judul halaman -->
  <!-- Tampilkan judul dari controller -->
  <!-- <section class="content-header">
    <h1><?= $title ?></h1> 
  </section> -->

  <section>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
  </section>

   <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

  <!-- Isi konten profil -->
  <section class="content">
    <div class="card card-primary"> <!-- Bootstrap card -->
      <div class="card-body"> <!-- Isi dalam card -->

        <!-- Tabel data user -->
        <table class="table table-bordered">
          <tr>
            <th>Nama</th>
            <td><?= $user->nama ?></td> <!-- Tampilkan nama -->
          </tr>
          <tr>
            <th>Email</th>
            <td><?= $user->email ?></td> <!-- Tampilkan email -->
          </tr>
          <tr>
            <th>Jurusan</th>
            <td><?= $user->jurusan ?></td> <!-- Tampilkan jurusan -->
          </tr>
          <tr>
            <th>Fakultas</th>
            <td><?= $user->fakultas ?></td> <!-- Tampilkan fakultas -->
          </tr>
        </table>
        
      </div>
    </div>
  </section>
</div>

<?php $this->load->view('template-mahasiswa/footer'); ?> <!-- Load footer -->
