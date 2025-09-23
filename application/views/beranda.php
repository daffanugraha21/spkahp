<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
    <title>Beranda</title>

    <style>
    .carousel-caption {
      position: absolute;
      top: 60%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      width: 65%;
    }

    .carousel-caption h1 {
      background: rgba(123, 44, 191, 0.5); /* ungu semi transparan */
      backdrop-filter: blur(4px);
      color: white;
      padding: 1rem 2rem;
      border-radius: 15px;
      text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.6);
      font-size: 2.5rem;
      font-weight: bold;
    }
    </style>
</head>
<body>
  <!-- Navbar section -->
  <nav class="navbar navbar-expand-lg">
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
            <a class="nav-link" aria-current="page" href="<?= site_url('pilihankursus') ?>">Pilihan Kursus</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= site_url('galeri') ?>">Galeri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= site_url('kontak') ?>">Kontak</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= site_url('auth/login') ?>">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= site_url('auth/register') ?>">Register</a>
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

  <!-- Start Welcome -->
   <div class="container-fluid">
    <div class="card custom1-card text-center">
      <div class="card-body">
        <h5 class="card-title">Selamat Datang Di Situs Pemilihan Materi Kursus VM Lepkom Berbasis Metode AHP</h5>
        <p class="card-text">Situs Pemilihan Kursus dengan metode AHP adalah sebuah website yang menampilkan Kursus yang paling sesuai dengan minat dan kemampuan mahasiswa</p>
      </div>
    </div>

    <div class="card custom2-card">
      <img src="<?= base_url('assets/images/front/study1.jpg') ?>" class="card-img-top" alt="study">
    </div>
   </div>
  <!-- End Welcome -->

  <!-- Start Footer -->
   <footer class="footer">
    <h5 class="text-footer">Universitas Gunadarma | Lepkom</h5>
   </footer>
  <!-- End Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
