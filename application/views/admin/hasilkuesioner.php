<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<!-- Mulai Konten Utama -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>Hasil Kuesioner Per User</h1>
  </section>

  <section class="content">
    <div class="container-fluid">
      
      <!-- TABEL HASIL KUESIONER -->
      <div class="table-responsive mb-5">
        <table class="table table-bordered table-striped table-hover align-middle">
          <thead class="table-dark">
            <tr>
              <th>No</th>
              <th>Nama User</th>
              <th>Rekomendasi Kursus</th>
              <th>Skor</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($hasil)) : ?>
              <?php foreach ($hasil as $index => $item) : ?>
                <tr>
                  <td><?= $index + 1 ?></td>
                  <td><?= htmlspecialchars($item['users']->nama) ?></td>
                  <td>
                    <ul>
                      <?php foreach ($item['rekomendasi'] as $r) : ?>
                        <li><?= htmlspecialchars($r['nama_kursus']) ?> (Skor: <?= htmlspecialchars($r['skor']) ?>)</li>
                      <?php endforeach; ?>
                    </ul>
                  </td>
                  <td>
                    <a href="<?= site_url('admin/hasil_user/' . $item['users']->id) ?>" class="btn btn-primary">Lihat Detail</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td colspan="4" class="text-center">Belum ada hasil kuesioner yang ditemukan.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

    </div>
  </section>
</div>

<?php $this->load->view('template/footer'); ?>
