<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<!-- Mulai Konten Utama -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Kursus</h1>
  </section>

  <section class="content">
    <div class="container-fluid">

      <form action="<?= site_url('kursus/update') ?>" method="post">
        <input type="hidden" name="id_kursus" value="<?= $kursus->id_kursus ?>">

        <div class="form-group">
          <label>Nama Kursus</label>
          <input type="text" name="nama_kursus" class="form-control" value="<?= htmlspecialchars($kursus->nama_kursus) ?>" required>
        </div>

        <div class="form-group">
          <label>Deskripsi</label>
          <textarea name="deskripsi" class="form-control" required><?= htmlspecialchars($kursus->deskripsi) ?></textarea>
        </div>

        <div class="form-group">
          <label>Tujuan</label>
          <textarea name="tujuan" class="form-control" required><?= htmlspecialchars($kursus->tujuan) ?></textarea>
        </div>

        <div class="form-group">
          <label>Metode</label>
          <textarea name="metode" class="form-control" required><?= htmlspecialchars($kursus->metode) ?></textarea>
        </div>

        <div class="form-group">
          <label>Kontak</label>
          <input type="text" name="kontak" class="form-control" value="<?= htmlspecialchars($kursus->kontak) ?>" required>
        </div>

        <div class="form-group">
          <label>Jumlah Pemilih</label>
          <input type="number" name="jumlah_pemilih" class="form-control" value="<?= $kursus->jumlah_pemilih ?>" required>
        </div>

        <div class="form-group">
          <label>Skor AHP</label>
          <input type="number" step="0.000001" name="skor_ahp" class="form-control" value="<?= $kursus->skor_ahp ?>" required>
        </div>

        <div class="form-group">
          <label>Peringkat</label>
          <input type="number" name="peringkat" class="form-control" value="<?= $kursus->peringkat ?>">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="<?= site_url('kursus') ?>" class="btn btn-secondary">Batal</a>
      </form>

    </div>
  </section>
</div>
<!-- Akhir Konten Utama -->

<?php $this->load->view('template/footer'); ?>
