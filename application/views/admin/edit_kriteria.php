<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<!-- Mulai Konten Utama -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Kriteria</h1>
  </section>

  <section class="content">
    <div class="container-fluid">
      <form action="<?= site_url('kriteria/update/' . $kriteria->id_kriteria); ?>" method="post">
        <div class="form-group">
          <label>Nama Kriteria</label>
          <input type="text" name="nama_kriteria" class="form-control" value="<?= $kriteria->nama_kriteria; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= site_url('kriteria'); ?>" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </section>
</div>
<!-- Akhir Konten Utama -->

<?php $this->load->view('template/footer'); ?>
