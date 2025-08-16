<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<!-- Mulai Konten Utama -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>Kursus</h1>
  </section>

  <section class="content">
    <div class="container-fluid">

      <a href="<?= site_url('kursus/tambah_form') ?>" class="btn btn-primary mb-3">Tambah Kursus</a>

      <?php if (!empty($kursus)) : ?>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Kursus</th>
            <th>Deskripsi</th>
            <th>Tujuan</th>
            <th>Metode</th>
            <th>Kontak</th>
            <th>Jumlah Pemilih</th>
            <th>Skor AHP</th>
            <th>Peringkat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($kursus as $k): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($k->nama_kursus) ?></td>
            <td><?= nl2br(htmlspecialchars($k->deskripsi)) ?></td>
            <td><?= nl2br(htmlspecialchars($k->tujuan)) ?></td>
            <td><?= nl2br(htmlspecialchars($k->metode)) ?></td>
            <td><?= htmlspecialchars($k->kontak) ?></td>
            <td><?= (int)$k->jumlah_pemilih ?></td>
            <td><?= number_format($k->skor_ahp, 6) ?></td>
            <td><?= (int)$k->peringkat ?></td>
            <td>
              <a href="<?= site_url('kursus/edit/' . $k->id_kursus) ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="<?= site_url('kursus/hapus/' . $k->id_kursus) ?>" 
                onclick="return confirm('Yakin ingin menghapus kursus ini?');" 
                class="btn btn-danger btn-sm">Hapus</a>
            </td>
          </tr>

          <?php endforeach; ?>
        </tbody>
      </table>
      <?php else: ?>
        <p class="text-muted">Belum ada data kursus.</p>
      <?php endif; ?>

    </div>
  </section>
</div>
<!-- Akhir Konten Utama -->

<?php $this->load->view('template/footer'); ?>