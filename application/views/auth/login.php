<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
    <title>Login</title>
</head>
<body>
      <!-- Navbar section -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <!-- <a class="navbar-brand" href="#">Lepkom</a> -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= site_url('beranda') ?>">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= site_url('pilihankursus') ?>">Pilihan Kursus</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= site_url('galeri') ?>">Galeri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= site_url('kontak') ?>">Kontak</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= site_url('auth/login') ?>">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= site_url('auth/register') ?>">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Start Carousel -->
   <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="3000">
        <img src="<?= base_url('assets/images/header/b1.jpg') ?>" class="d-block w-100" alt="b1">
        <div class="carousel-caption d-none d-md-block">
          <h1>Lepkom Mandiri Berbasis Virtual</h1>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?= base_url('assets/images/header/b2.jpg') ?>" class="d-block w-100" alt="b2">
        <div class="carousel-caption d-none d-md-block">
          <h1>Lepkom Mandiri Berbasis Virtual</h1>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?= base_url('assets/images/header/b3.jpg') ?>" class="d-block w-100" alt="b3">
        <div class="carousel-caption d-none d-md-block">
          <h1>Lepkom Mandiri Berbasis Virtual</h1>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- End Carousel -->

  <!-- Start Card-login -->
   <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card custom-login-card">
      <div class="card-header text-center fw-bold fs-4">
        LOGIN
      </div>
      <div class="card-body">
        <?php if($this->session->flashdata('error')): ?>
          <p class="text-danger text-center"><?= $this->session->flashdata('error') ?></p>
        <?php endif; ?>
        
        <?= form_open('auth/login') ?>
          <div class="mb-3">
            <input type="text" name="npm" class="form-control" placeholder="NPM" required>
          </div>
          <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
    
  <!-- End Card-login -->
  <!-- Start Footer -->
    <footer class="footer">
      <h5 class="text-footer">Universitas Gunadarma | Lepkom</h5>
    </footer>
  <!-- End Footer -->
<!-- Base -->
    <!-- <h2>Login</h2>

    <?php if($this->session->flashdata('error')): ?>
        <p style="color:red"><?= $this->session->flashdata('error') ?></p>
    <?php endif; ?>

    <?= form_open('auth/login') ?>
        <input type="text" name="npm" placeholder="NPM" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    <?= form_close() ?>

    <p><a href="<?= site_url('beranda') ?>">Kembali ke Beranda</a></p> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
