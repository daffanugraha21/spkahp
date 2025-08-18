<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Kelola Opsi - <?= $soal->pertanyaan ?></h1>
  </section>

  <section class="content">
    <div class="container-fluid">

      <!-- Flash message -->
      <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
          <?= $this->session->flashdata('success'); ?>
        </div>
      <?php endif; ?>

      <!-- Form Tambah Opsi -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tambah Opsi</h3>
        </div>
        <div class="card-body">
          <!-- Arahkan action ke controller Opsi -->
          <form action="<?= site_url('opsi/tambah/' . $soal->id_soal) ?>" method="post">
            <div class="form-group">
              <label for="teks_opsi">Teks Opsi</label>
              <input type="text" name="teks_opsi" id="teks_opsi" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="nilai">Nilai (1 - 5)</label>
              <input type="number" name="nilai" id="nilai" class="form-control" min="1" max="5" required>
            </div>
            <button type="submit" name="tambah_opsi" class="btn btn-success">Tambah Opsi</button>
            <a href="<?= site_url('soalkuesioner') ?>" class="btn btn-secondary">Kembali</a>
          </form>
        </div>
      </div>

      <hr>

      <!-- Daftar Opsi -->
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">Daftar Opsi</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th style="width: 60%">Teks Opsi</th>
                <th style="width: 20%">Nilai</th>
                <th style="width: 20%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($opsi)): ?>
                <?php foreach ($opsi as $o): ?>
                <tr>
                  <td><?= $o->teks_opsi ?></td>
                  <td class="text-center"><?= $o->nilai ?></td>
                  <td class="text-center">
                    <!-- Arahkan hapus ke controller Opsi -->
                    <a href="<?= site_url('opsi/hapus/' . $o->id_opsi . '/' . $soal->id_soal) ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin hapus opsi ini?')">
                      <i class="fa fa-trash"></i> Hapus
                    </a>
                  </td>
                </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="3" class="text-center">Belum ada opsi untuk soal ini.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </section>
</div>

<?php $this->load->view('template/footer'); ?>
