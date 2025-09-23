<?php $this->load->view('template-mahasiswa/header'); ?>
<?php $this->load->view('template-mahasiswa/sidebar'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1 class="judul-halaman">Kuesioner</h1>
    </section>

    <section class="content">
        <div class="container-fluid">
            <?php if (!empty($soal)) : ?>
                <form action="<?= base_url('index.php/kuesioner/submit') ?>" method="post">

                    <input type="hidden" name="current_page" value="<?= $offset ?>">

                    <?php
                        // Ambil jawaban yang sudah tersimpan di session (jika ada)
                        $jawaban_sess = $this->session->userdata('jawaban_kuesioner') ?? [];

                        foreach ($soal as $index => $s) :
                            $nomor = $offset + $index + 1;
                    ?>
                        <div class="mb-4 p-3 border rounded bg-light">
                            <label class="fw-bold d-block mb-2">
                                <?= $nomor . ". " . htmlspecialchars($s->pertanyaan); ?>
                            </label>

                            <?php if (!empty($s->opsi)) : ?>
                                <?php foreach ($s->opsi as $opsi) : ?>
                                    <?php
                                        // Cek apakah opsi ini sudah dipilih sebelumnya
                                        $checked = isset($jawaban_sess[$s->id_soal]) && $jawaban_sess[$s->id_soal] == $opsi->id_opsi ? 'checked' : '';
                                    ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" 
                                            name="jawaban[<?= $s->id_soal ?>]" 
                                            value="<?= $opsi->id_opsi ?>" 
                                            id="opsi_<?= $opsi->id_opsi ?>"
                                            required <?= $checked ?>>
                                        <label class="form-check-label" for="opsi_<?= $opsi->id_opsi ?>">
                                            <?= htmlspecialchars($opsi->teks_opsi) ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>

                    <div class="text-end mb-3">
                        <?php if ($is_last_page): ?>
                            <button type="submit" class="btn btn-success">Kirim Jawaban</button>
                        <?php else: ?>
                            <button type="submit" class="btn btn-primary">Lanjut</button>
                        <?php endif; ?>
                    </div>
                </form>

                <?php else : ?>
                <div class="alert alert-warning">Belum ada soal tersedia saat ini.</div>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php $this->load->view('template-mahasiswa/footer'); ?>