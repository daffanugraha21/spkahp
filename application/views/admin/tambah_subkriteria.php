<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Tambah Sub Kriteria</h1>
  </section>

  <section class="content">
    <div class="container-fluid">
      <form action="<?= site_url('subkriteria/store'); ?>" method="post">
        <div class="form-group">
          <label>Nama Subkriteria</label>
          <input type="text" name="nama_subkriteria" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Kriteria</label>
          <select name="id_kriteria" class="form-control" required>
            <option value="">-- Pilih Kriteria --</option>
            <?php foreach ($kriteria as $k): ?>
              <option value="<?= $k->id_kriteria; ?>"><?= $k->nama_kriteria; ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label>Tipe</label>
          <select name="tipe" class="form-control" required>
            <option value="nilai">Nilai</option>
            <option value="teks">Teks</option>
          </select>
        </div>

        <div class="form-group">
          <label>Nilai Minimum</label>
          <input type="number" step="0.01" name="nilai_minimum" class="form-control">
        </div>

        <div class="form-group">
          <label>Nilai Maksimum</label>
          <input type="number" step="0.01" name="nilai_maksimum" class="form-control">
        </div>

        <div class="form-group">
          <label>Operator Minimum</label>
          <input type="text" name="op_min" class="form-control" placeholder="Contoh: >, >=">
        </div>

        <div class="form-group">
          <label>Operator Maksimum</label>
          <input type="text" name="op_max" class="form-control" placeholder="Contoh: <, <=">
        </div>

        <div class="form-group">
          <label>ID Nilai</label>
          <input type="number" name="id_nilai" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('subkriteria'); ?>" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </section>
</div>

<?php $this->load->view('template/footer'); ?>
