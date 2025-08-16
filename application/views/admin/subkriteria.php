<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<!-- Mulai Konten Utama -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Sub Kriteria</h1>
  </section>

  <section class="content">
    <div class="container-fluid">
      <a href="<?= site_url('subkriteria/tambah_subkriteria'); ?>" class="btn btn-primary mb-3">Tambah Subkriteria</a>

      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Subkriteria</th>
            <th>Kriteria</th>
            <th>Tipe</th>
            <th>Rentang Nilai</th>
            <th>Operator</th>
            <th>ID Nilai</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($subkriteria as $s): ?>
            <tr>
              <td><?= $s->id_subkriteria; ?></td>
              <td><?= $s->nama_subkriteria; ?></td>
              <td><?= $s->nama_kriteria; ?></td>
              <td><?= $s->tipe; ?></td>
              <td><?= $s->nilai_minimum . ' - ' . $s->nilai_maksimum; ?></td>
              <td><?= $s->op_min . ' ... ' . $s->op_max; ?></td>
              <td><?= $s->id_nilai; ?></td>
              <td>
                <a href="<?= site_url('subkriteria/edit_subkriteria/' . $s->id_subkriteria); ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= site_url('subkriteria/delete/' . $s->id_subkriteria); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
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
