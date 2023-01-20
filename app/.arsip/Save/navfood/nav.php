<nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
            <a class="navbar-brand" href="<?= ROOTURL; ?>">
                  <img src="<?= USERURL; ?>/img/logo/profile.png" alt="Logo" width="30" height="30" class="d-inline-block ">
            HelmiAR527</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon justify-content-end"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                  <ul class="navbar-nav">
                        <li class="nav-item">
                              <a class="nav-link active m-lg-1" aria-current="page" href="<?= BASEURL; ?>#home">Home</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link m-lg-1" href="<?= BASEURL; ?>/index/about">About</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link m-lg-1" href="<?= BASEURL; ?>/index/feature">Features</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link m-lg-1 d-none" href="<?= BASEURL; ?>/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item btn-group dropstart">
                              <a class="nav-link m-lg-1" href="<?= BASEURL; ?>/signin">Sign in</a>
                              <a class="nav-link m-lg-2 dropdown-toggle dropdown-toggle-split" href="" data-bs-toggle="dropdown" aria-expanded="false">
                              </a>
                              <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?= BASEURL; ?>/signin">Sign in</a></li>
                                    <li><a class="dropdown-item" href="<?= BASEURL; ?>/login">Login</a></li>
                              </ul>
                        </li>
                  </ul>
            </div>
      </div>
</nav>