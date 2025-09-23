<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<!-- Mulai Konten Utama -->
<div class="content-wrapper">
  <section class="content-header">
    <h1><?= $title ?></h1>
  </section>

  <section class="content">
    <div class="container-fluid">
      <!-- Tombol untuk menambah mahasiswa -->
      <!-- <a href="<?= site_url('datamahasiswa/tambah_mahasiswa'); ?>" class="btn btn-success mb-3">
        <i class="fa fa-plus"></i> Tambah Mahasiswa
      </a> -->

      <!-- Cek jika data users ada -->
      <?php if (!empty($users)) : ?>
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead class="thead-dark">
              <tr>
                <th style="width: 50px;">No</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Fakultas</th>
                <th style="width: 150px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $index => $user) : ?>
              <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($user->npm) ?></td>
                <td><?= htmlspecialchars($user->nama) ?></td>
                <td><?= htmlspecialchars($user->email) ?></td>
                <td><?= htmlspecialchars($user->jurusan) ?></td>
                <td><?= htmlspecialchars($user->fakultas) ?></td>
                <td>
                  <!-- Link untuk Edit dan Delete -->
                  <a href="<?= site_url('datamahasiswa/edit_mahasiswa/' . $user->id) ?>" class="btn btn-warning btn-sm">
                    <i class="fa fa-edit"></i> Edit
                  </a>
                  <a href="<?= site_url('datamahasiswa/delete_mahasiswa/' . $user->id) ?>" 
                     class="btn btn-danger btn-sm" 
                     onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                    <i class="fa fa-trash"></i> Delete
                  </a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else : ?>
        <div class="alert alert-info">Belum ada data mahasiswa yang tersedia.</div>
      <?php endif; ?>
    </div>
  </section>
</div>
<!-- Akhir Konten Utama -->

<?php $this->load->view('template/footer'); ?>
