<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Tambah Soal</h1>
  </section>

  <section class="content">
    <div class="container-fluid">
      <?php echo form_open('soalkuesioner/tambah_soal'); ?>
        <div class="form-group">
          <label for="pertanyaan">Pertanyaan</label>
          <textarea name="pertanyaan" id="pertanyaan" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo site_url('soalkuesioner'); ?>" class="btn btn-secondary">Batal</a>
      <?php echo form_close(); ?>
    </div>
  </section>
</div>

<?php $this->load->view('template/footer'); ?>
