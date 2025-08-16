<style>
  .logout-link {
    background-color: #dc3545; /* merah bootstrap */
    color: white !important;
    border-radius: 12px;
    transition: background-color 0.3s ease;
  }

  .logout-link:hover {
    background-color: #c82333; /* merah lebih gelap saat hover */
    color: white !important;
  }
</style>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?= site_url('admin/dashboard'); ?>" class="brand-link" style="text-decoration: none;">
    <span class="brand-text font-weight-light">Universitas Gunadarma</span>
  </a>
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
        <li class="nav-item">
          <a href="<?= site_url('admin/dashboard'); ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('datamahasiswa'); ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Data Mahasiswa</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('kriteria'); ?>" class="nav-link">
            <i class="nav-icon fas fa-clipboard-check"></i>
            <p>Kriteria AHP</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('subkriteria'); ?>" class="nav-link">
            <i class="nav-icon fas fa-clipboard-check"></i>
            <p>Sub Kriteria AHP</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('kursus'); ?>" class="nav-link">
            <i class="nav-icon fas fa-keyboard"></i>
            <p>Kursus</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('soalkuesioner'); ?>" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>Soal Kuesioner</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('hasilkuesioner'); ?>" class="nav-link">
            <i class="nav-icon fas fa-clipboard-check"></i>
            <p>Hasil</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('admin/logout'); ?>" class="nav-link logout-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
