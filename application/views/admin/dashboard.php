<!-- <!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
</head>
<body>
    <h2>Selamat Datang di Dashboard Admin</h2>
    <a href="<?php echo site_url('admin/logout'); ?>">Logout</a>
</body>
</html> -->

<!-- V2 -->
<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/sidebar'); ?>

<!-- Content Wrapper -->
<!-- <div class="content-wrapper">
  <div class="content-header">
    <h1 class="m-0 text-dark">Dashboard Admin</h1>
  </div>
  <div class="content">
    <p>Selamat datang, Admin!</p>
  </div>
</div> -->
<!-- Start Style -->
<style>
.dashboard-cards {
  display: flex;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
  margin-top: 20px;
}

/* Soft card style */
.card-dashboard {
  width: 27rem;
  flex: 0 0 auto;
  background: linear-gradient(135deg, #d6d2e7, #dce8f9); /* ungu pastel ke biru pastel */
  color: #333;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Header dengan kuning lembut */
.card-dashboard .card-header {
  background-color: #fff6cc; /* kuning pastel */
  color: #444;
  font-weight: bold;
  border-bottom: 1px solid rgba(0, 0, 0, 0.05);
  padding: 10px 15px;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

/* Body content */
.card-dashboard .card-body {
  padding: 15px;
  font-size: 0.95rem;
  line-height: 1.4;
}

/* Hover effect yang smooth */
.card-dashboard:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
  cursor: pointer;
}

/* card-info */
/* Wrapper untuk menyusun card sejajar */
.info-cards {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 20px;
  margin-bottom: 30px;
}

/* Styling untuk card-info */
.card-info {
  width: 12rem;
  background: #eef2fb; /* Biru muda kalem */
  color: #333;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  text-align: center;
}

/* Konten dalam card */
.card-info .card-body {
  padding: 20px;
}

/* Judul angka besar */
.card-info h1 {
  font-size: 2.5rem;
  margin: 0;
  color: #5d5fef; /* Ungu-biru soft */
}

/* Deskripsi teks */
.card-info .card-text {
  margin-top: 10px;
  font-size: 1rem;
  color: #555;
}

/* Hover effect */
.card-info:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
  cursor: pointer;
}
</style>
<!-- End Style -->
<!-- V2 -->
<div class="content-wrapper p-4">
  <div class="container">
    <h1 class="text-center mb-4">Dashboard Admin</h1>
    <div class="info-cards">
  <!-- <div class="card card-info">
    <div class="card-body">
      <h1>100</h1>
      <p class="card-text">Jumlah Users</p>
    </div>
  </div> -->

  <div class="card card-info">
    <div class="card-body">
      <h1>5</h1>
      <p class="card-text">Jumlah Kriteria</p>
    </div>
  </div>

  <div class="card card-info">
    <div class="card-body">
      <h1>5</h1>
      <p class="card-text">Jumlah Kursus</p>
    </div>
  </div>

  <!-- <div class="card card-info">
    <div class="card-body">
      <h1>0</h1>
      <p class="card-text">Jumlah Pengunjung</p>
    </div>
  </div> -->
</div>


    <!-- Wrapper baru untuk menampung kedua card-dashboard -->
    <div class="dashboard-cards">
      <div class="card card-dashboard">
        <div class="card-header">
          Kata Sambutan
        </div>
        <div class="card-body">
          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere delectus velit fugiat non similique beatae qui cupiditate sint, natus molestias.</p>
        </div>
      </div>

      <div class="card card-dashboard">
        <div class="card-header">
          SPK Penentuan Pilihan Materi Kursus VM LEPKOM
        </div>
        <div class="card-body">
          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere delectus velit fugiat non similique beatae qui cupiditate sint, natus molestias.</p>
        </div>
      </div>
    </div>

  </div>
</div>
<?php $this->load->view('template/footer'); ?>
