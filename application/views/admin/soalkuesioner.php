<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>
<!-- <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?> -->

<!-- Mulai Konten Utama -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>Soal Kuesioner</h1>
  </section>

  <section class="content">
    <div class="container-fluid">

      <!-- Tombol Tambah -->
      <a href="<?= site_url('soalkuesioner/tambah_soal') ?>" class="btn btn-primary mb-3">Tambah Soal</a>

      <!-- Tabel Soal -->
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style="width: 50px;">No</th>
            <th>Pertanyaan</th>
            <th style="width: 200px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($soal)) : ?>
            <?php $no = 1; foreach ($soal as $s): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $s->pertanyaan ?></td>
                <td>
                  <a href="<?= site_url('soalkuesioner/edit_soal/' . $s->id_soal) ?>" class="btn btn-warning btn-sm">Edit</a>
                  <a href="<?= site_url('soalkuesioner/hapus_soal/' . $s->id_soal) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus soal ini?')">Hapus</a>
                  <a href="<?= site_url('soalkuesioner/opsi/' . $s->id_soal) ?>" class="btn btn-info btn-sm">Kelola Opsi</a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="3" class="text-center">Belum ada soal.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>

    </div>
  </section>
</div>
<!-- Akhir Konten Utama -->

<?php $this->load->view('template/footer'); ?>
