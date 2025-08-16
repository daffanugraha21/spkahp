<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?= site_url('home'); ?>" class="brand-link" style="text-decoration: none;">
    <span class="brand-text font-weight-light">Universitas Gunadarma</span>
  </a>
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
        <li class="nav-item">
          <a href="<?= site_url('home'); ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('profile'); ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Profile</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('kuesioner'); ?>" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Kuesioner</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('hasil'); ?>" class="nav-link">
            <i class="nav-icon fas fa-clipboard-check"></i>
            <p>Hasil</p>
          </a>
        </li>
        <li class="nav-item logout-item">
          <a href="<?= site_url('beranda'); ?>" class="nav-link logout-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
