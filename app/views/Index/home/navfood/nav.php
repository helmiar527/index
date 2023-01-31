<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
  <div class="container px-4 px-lg-5">
    <a class="navbar-brand" href="<?= BASEURL ?>">
      <img src="<?= ICON ?>" alt="Bootstrap" width="30" height="24">
      HELMIAR527
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto my-2 my-lg-0">
        <li class="nav-item"><a class="nav-link" href="#page-top">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="hover" role="button"
          data-bs-toggle="dropdown" aria-expanded="false">Sign Up
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= BASEURL ?>/register">Register</a>
            <a class="dropdown-item" href="<?= BASEURL ?>/login">Login</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>