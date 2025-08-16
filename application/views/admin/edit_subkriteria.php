<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Sub Kriteria</h1>
  </section>

  <section class="content">
    <div class="container-fluid">
      <form action="<?= site_url('subkriteria/update/' . $subkriteria->id_subkriteria); ?>" method="post">
        <div class="form-group">
          <label>Nama Subkriteria</label>
          <input type="text" name="nama_subkriteria" class="form-control" value="<?= $subkriteria->nama_subkriteria; ?>" required>
        </div>

        <div class="form-group">
          <label>Kriteria</label>
          <select name="id_kriteria" class="form-control" required>
            <?php foreach ($kriteria as $k): ?>
              <option value="<?= $k->id_kriteria; ?>" <?= $k->id_kriteria == $subkriteria->id_kriteria ? 'selected' : '' ?>>
                <?= $k->nama_kriteria; ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label>Tipe</label>
          <select name="tipe" class="form-control" required>
            <option value="nilai" <?= $subkriteria->tipe == 'nilai' ? 'selected' : '' ?>>Nilai</option>
            <option value="teks" <?= $subkriteria->tipe == 'teks' ? 'selected' : '' ?>>Teks</option>
          </select>
        </div>

        <div class="form-group">
          <label>Nilai Minimum</label>
          <input type="number" step="0.01" name="nilai_minimum" class="form-control" value="<?= $subkriteria->nilai_minimum; ?>">
        </div>

        <div class="form-group">
          <label>Nilai Maksimum</label>
          <input type="number" step="0.01" name="nilai_maksimum" class="form-control" value="<?= $subkriteria->nilai_maksimum; ?>">
        </div>

        <div class="form-group">
          <label>Operator Minimum</label>
          <input type="text" name="op_min" class="form-control" value="<?= $subkriteria->op_min; ?>">
        </div>

        <div class="form-group">
          <label>Operator Maksimum</label>
          <input type="text" name="op_max" class="form-control" value="<?= $subkriteria->op_max; ?>">
        </div>

        <div class="form-group">
          <label>ID Nilai</label>
          <input type="number" name="id_nilai" class="form-control" value="<?= $subkriteria->id_nilai; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= site_url('subkriteria'); ?>" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </section>
</div>

<?php $this->load->view('template/footer'); ?>
