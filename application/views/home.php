<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
    <title>Home</title>
</head>
<body>
    <h2>Selamat datang, <?= $this->session->userdata('nama') ?>!</h2>
    <p>NPM: <?= $this->session->userdata('npm') ?></p>
    <p>Anda berhasil login ke sistem SPK pemilihan kursus.</p>
    <a href="<?= site_url('auth/logout') ?>">Logout</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
