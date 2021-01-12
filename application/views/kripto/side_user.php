<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user') ?>">
              <span data-feather="layers"></span>
              Daftar Pasien
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/tpasien') ?>">
              <span data-feather="layers"></span>
              Tambah Pasien
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>User</span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="user"></span>
              <?= $this->session->userdata('name') ?>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout') ?>">
              <span data-feather="log-out"></span>
              Logout
            </a>
          </li>
        </ul>

      </div>
  </div>
  </nav>