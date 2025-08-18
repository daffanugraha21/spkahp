<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<!-- Mulai Konten Utama -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Kriteria</h1>
  </section>

  <section class="content">
    <div class="container-fluid">
      <a href="<?= site_url('kriteria/tambah_kriteria'); ?>" class="btn btn-primary mb-3">Tambah Kriteria</a>

      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Kriteria</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($kriteria as $k): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $k->nama_kriteria; ?></td>
              <td>
                <a href="<?= site_url('kriteria/edit_kriteria/' . $k->id_kriteria); ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= site_url('kriteria/delete/' . $k->id_kriteria); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section>
</div>
<!-- Akhir Konten Utama -->

<?php $this->load->view('template/footer'); ?>
