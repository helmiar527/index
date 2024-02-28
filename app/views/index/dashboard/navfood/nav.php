<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-start fixed-top">
    <a class="sidebar-brand brand-logo" href="<?= BASEURL; ?>/Dashboard">
      <span class="text-light">HELMIAR527</span>
    </a>
    <a class="sidebar-brand brand-logo-mini" href="<?= BASEURL; ?>/Dashboard">
      <img src="<?= ICON; ?>" alt="logo">
    </a>
  </div>
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle " src="<?= $data['profile']; ?>" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal"><?= $data['nama']; ?></h5>
            <span>Ranks <b class="fw-bold"><?= $data['rank']; ?></b></span>
          </div>
        </div>
        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
          <a href="<?= BASEURL; ?>/Dashboard/profileSetting" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-settings text-primary"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-onepassword text-info"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-calendar-today text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
            </div>
          </a>
        </div>
      </div>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="<?= BASEURL; ?>/Dashboard">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#comingModal">
        <span class="menu-icon">
          <i class="mdi mdi-calculator"></i>
        </span>
        <span class="menu-title">Calculator</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
          <i class="mdi mdi-book"></i>
        </span>
        <span class="menu-title">Catatan Keuangan</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="<?= BASEURL; ?>/Dashboard/catatanPemasukkan">Pemasukkan</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= BASEURL; ?>/Dashboard/catatanPengeluaran">Pengeluaran</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= BASEURL; ?>/Dashboard/catatanTabungan">Tabungan</a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>