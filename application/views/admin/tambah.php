<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Tambah Kursus</h1>
  </section>

  <section class="content">
    <div class="container-fluid">
      <form action="<?= site_url('kursus/tambah') ?>" method="post">
        <div class="form-group">
          <label for="nama_kursus">Nama Kursus</label>
          <input type="text" id="nama_kursus" name="nama_kursus" class="form-control" placeholder="Masukkan nama kursus" required>
        </div>

        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Masukkan deskripsi kursus" rows="3" required></textarea>
        </div>

        <div class="form-group">
          <label for="tujuan">Tujuan</label>
          <textarea id="tujuan" name="tujuan" class="form-control" placeholder="Masukkan tujuan kursus" rows="3" required></textarea>
        </div>

        <div class="form-group">
          <label for="metode">Metode</label>
          <textarea id="metode" name="metode" class="form-control" placeholder="Masukkan metode pembelajaran" rows="3" required></textarea>
        </div>

        <div class="form-group">
          <label for="kontak">Kontak</label>
          <input type="text" id="kontak" name="kontak" class="form-control" placeholder="Masukkan kontak" required>
        </div>

        <div class="form-group">
          <label for="jumlah_pemilih">Jumlah Pemilih</label>
          <input type="number" id="jumlah_pemilih" name="jumlah_pemilih" class="form-control" value="0" min="0" required>
        </div>

        <div class="form-group">
          <label for="skor_ahp">Skor AHP</label>
          <input type="number" id="skor_ahp" step="0.000001" name="skor_ahp" class="form-control" value="0" min="0" required>
        </div>

        <div class="form-group">
          <label for="peringkat">Peringkat</label>
          <input type="number" id="peringkat" name="peringkat" class="form-control" min="0" placeholder="Opsional">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= site_url('kursus') ?>" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </section>
</div>

<?php $this->load->view('template/footer'); ?>