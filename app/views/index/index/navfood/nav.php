<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
  <div class="container px-4 px-lg-5">
    <a class="navbar-brand main-nav-1" href="<?= BASEURL ?>">
      <img src="<?= ICON; ?>" alt="Icon" width="30" height="30">
      HELMIAR527
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto my-2 my-lg-0">
        <li class="nav-item main-nav-2"><a class="nav-link" href="#page-top">Home</a></li>
        <li class="nav-item main-nav-3"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item main-nav-4"><a class="nav-link" href="#services">Services</a></li>
        <li class="nav-item main-nav-5"><a class="nav-link" href="#portfolio">Project</a></li>
        <li class="nav-item main-nav-6"><a class="nav-link" href="#contact">Contact</a></li>
        <?= $data['navlog']; ?>
      </ul>
    </div>
  </div>
</nav>