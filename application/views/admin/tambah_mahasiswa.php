<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Tambah Mahasiswa</h1>
  </section>

  <section class="content">
    <div class="container-fluid">
      <form action="<?= site_url('datamahasiswa/store_mahasiswa'); ?>" method="post">
        
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" name="nama" id="nama" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="jurusan">Jurusan</label>
          <input type="text" name="jurusan" id="jurusan" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="fakultas">Fakultas</label>
          <input type="text" name="fakultas" id="fakultas" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('datamahasiswa'); ?>" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </section>
</div>

<?php $this->load->view('template/footer'); ?>
