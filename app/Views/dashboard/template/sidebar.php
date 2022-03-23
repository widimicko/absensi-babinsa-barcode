<nav id="sidebarMenu" class="mt-4 col-md-3 col-lg-2 d-md-block shadow sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column gap-3">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="bi bi-grid-fill"></i> Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/dashboard/members') ?>">
          <i class="bi bi-people"></i> Anggota
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/dashboard/absences') ?>">
          <i class="bi bi-alarm"></i> Absensi
        </a>
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Sistem</span>
    </h6>

    <ul class="nav flex-column gap-3">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/dashboard/users') ?>">
          <i class="bi bi-people"></i> Pengguna
        </a>
      </li>
    </ul>
  </div>
</nav>