<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- <title>Dashboard Mahasiswa</title> -->
   <title><?php echo isset($title) ? $title : 'Default Title'; ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css') ?>">
   <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/mahasiswa/style.css'); ?>" />
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
