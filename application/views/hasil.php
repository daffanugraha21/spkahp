<?php $this->load->view('template-mahasiswa/header'); ?>
<?php $this->load->view('template-mahasiswa/sidebar'); ?>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

<!-- Mulai Konten Utama -->
<div class="content-wrapper">
  <section class="content-header">
    <h1 class="judul-halaman">Hasil Kuesioner</h1>
  </section>

  <section class="content">
    <div class="container-fluid">

      <!-- TABEL JAWABAN USER -->
      <?php if (!empty($jawaban)) : ?>
        <div class="table-responsive mb-5">
          <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
              <tr>
                <th scope="col" style="width: 50px;">No</th>
                <th scope="col">Pertanyaan</th>
                <th scope="col">Jawaban</th>
                <th scope="col" style="width: 80px;">Nilai</th>
                <th scope="col" style="width: 180px;">Tanggal</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($jawaban as $index => $j) : ?>
                <tr>
                  <td><?= $index + 1 ?></td>
                  <td><?= htmlentities($j->pertanyaan ?? $j->id_soal) ?></td>
                  <td><?= htmlentities($j->jawaban_text ?? $j->id_opsi) ?></td>
                  <td class="text-center"><?= htmlentities($j->nilai) ?></td>
                  <td><?= htmlentities(date('d M Y H:i', strtotime($j->created_at))) ?></td>
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
        <div class="card mt-4">
          <div class="card-header bg-primary text-white">Rekomendasi Kursus Terbaik</div>
          <div class="card-body">
            <ul class="list-group">
              <?php foreach ($rekomendasi as $r) : ?>
                <li class="list-group-item">
                  <h5><?= $r['nama_kursus'] ?> (Skor: <?= $r['skor'] ?>)</h5>
                  <p><strong>Deskripsi:</strong> <?= $r['deskripsi'] ?></p>
                  <p><strong>Tujuan:</strong> <?= $r['tujuan'] ?></p>
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
