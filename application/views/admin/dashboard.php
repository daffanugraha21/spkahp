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
<div class="content-wrapper">
  <div class="content-header">
    <h1 class="m-0 text-dark">Dashboard Admin</h1>
  </div>
  <div class="content">
    <p>Selamat datang, Admin!</p>
  </div>
</div>

<?php $this->load->view('template/footer'); ?>
