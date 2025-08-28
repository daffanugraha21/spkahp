<?php $this->load->view('template-mahasiswa/header'); ?>
<?php $this->load->view('template-mahasiswa/sidebar'); ?>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

<!-- Mulai Konten Utama -->
<div class="content-wrapper">
  <section class="content-header mb-3">
    <h1 class="judul-halaman">Hasil Kuesioner untuk <?= htmlspecialchars($user_name) ?></h1> <!-- Menampilkan nama user -->
  </section>

  <section class="content">
    <div class="container-fluid">

      <!-- FLASH MESSAGE -->
      <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= htmlspecialchars($this->session->flashdata('success')) ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php elseif ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?= htmlspecialchars($this->session->flashdata('error')) ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <!-- TABEL JAWABAN USER -->
      <?php if (!empty($jawaban)) : ?>
        <div class="table-responsive mb-5">
          <table class="table table-bordered table-striped table-hover align-middle">
            <thead class="table-dark">
              <tr>
                <th scope="col" style="width: 50px;">No</th>
                <th scope="col">Pertanyaan</th>
                <th scope="col">Jawaban</th>
                <th scope="col" style="width: 80px;" class="text-center">Nilai</th>
                <th scope="col" style="width: 180px;">Tanggal</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($jawaban as $index => $j) : ?>
                <tr>
                  <td><?= $index + 1 ?></td>
                  <td><?= htmlspecialchars($j->pertanyaan ?? '-') ?></td>
                  <td><?= htmlspecialchars($j->jawaban_text ?? '-') ?></td>
                  <td class="text-center"><?= htmlspecialchars($j->nilai ?? '-') ?></td>
                  <td>
                    <?= !empty($j->created_at) ? htmlspecialchars(date('d M Y H:i', strtotime($j->created_at))) : '-' ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else : ?>
        <div class="alert alert-warning">Belum ada hasil jawaban yang ditemukan.</div>
      <?php endif; ?>

      <!-- REKOMENDASI KURSUS -->
      <?php if (!empty($rekomendasi)) : ?>
        <div class="card mt-4 shadow-sm">
          <div class="card-header bg-primary text-white">
            <strong>Rekomendasi Kursus Terbaik Untuk <?= htmlspecialchars($user_name) ?></strong>
          </div>
          <div class="card-body">
            <ul class="list-group">
              <?php foreach ($rekomendasi as $r) : ?>
                <li class="list-group-item">
                  <h5 class="mb-1">
                    <?= htmlspecialchars($r['nama_kursus']) ?>
                    <small class="text-muted">(Skor: <?= htmlspecialchars($r['skor']) ?>)</small>
                  </h5>
                  <?php if (!empty($r['deskripsi'])) : ?>
                    <p class="mb-1"><strong>Deskripsi:</strong> <?= htmlspecialchars($r['deskripsi']) ?></p>
                  <?php endif; ?>
                  <?php if (!empty($r['tujuan'])) : ?>
                    <p class="mb-0"><strong>Tujuan:</strong> <?= htmlspecialchars($r['tujuan']) ?></p>
                  <?php endif; ?>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      <?php else : ?>
        <div class="alert alert-danger mt-4">Belum ada rekomendasi yang dapat ditampilkan.</div>
      <?php endif; ?>

    </div>
  </section>
</div>
<!-- Akhir Konten Utama -->

<?php $this->load->view('template-mahasiswa/footer'); ?>
