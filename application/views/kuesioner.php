<?php $this->load->view('template-mahasiswa/header'); ?>
<?php $this->load->view('template-mahasiswa/sidebar'); ?>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

<!-- Mulai Konten Utama -->
<div class="content-wrapper">
  <section class="content-header">
    <h1 class="judul-halaman">Kuesioner</h1>
  </section>

  <section class="content">
    <div class="container-fluid">
      <!-- Flash message sukses -->
      <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
      <!-- Flash message error -->
      <?php elseif ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
      <?php endif; ?>

      <p class="kuesioner">Silakan isi kuesioner di bawah ini:</p>

      <?php if (!empty($soal)) : ?>
        <form action="<?= base_url('index.php/kuesioner/submit') ?>" method="post">
          <?php foreach ($soal as $index => $s) : ?>
            <div class="mb-4 p-3 border rounded bg-light">
              <!-- Pertanyaan -->
              <label class="fw-bold"><?= ($index + 1) . ". " . htmlentities($s->pertanyaan); ?></label>
              
              <?php if (!empty($s->opsi)) : ?>
                <?php foreach ($s->opsi as $opsi) : ?>
                  <div class="form-check">
                    <input 
                      class="form-check-input" 
                      type="radio" 
                      name="jawaban[<?= $s->id_soal ?>]" 
                      value="<?= $opsi->id_opsi ?>" 
                      id="opsi_<?= $opsi->id_opsi ?>" 
                      required
                    >
                    <label class="form-check-label" for="opsi_<?= $opsi->id_opsi ?>">
                      <?= htmlentities($opsi->teks_opsi) ?>
                    </label>
                  </div>
                <?php endforeach; ?>
              <?php else : ?>
                <p><em>Tidak ada opsi tersedia untuk pertanyaan ini.</em></p>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>

          <div class="text-end">
            <button type="submit" class="btn btn-success">Kirim Jawaban</button>
          </div>
        </form>
      <?php else : ?>
        <div class="alert alert-warning">Belum ada soal tersedia saat ini.</div>
      <?php endif; ?>
    </div>
  </section>
</div>
<!-- Akhir Konten Utama -->

<?php $this->load->view('template-mahasiswa/footer'); ?>
