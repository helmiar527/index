<?php

class Index extends Controller
{

  public function index()
  {
    $data['title'] = 'Welcome To HELMIAR527';
    $data['years1'] = '2022';
    $data['years'] = date('Y');
    if (!isset($_SESSION['status']) || $_SESSION['status'] !== "logged") {
      $data['navlog'] = '<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="hover" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sign Up</a><div class="dropdown-menu" aria-labelledby="navbarDropdown"><a class="dropdown-item" href="' . BASEURL . '/register">Register</a><a class="dropdown-item" href="' . BASEURL . '/login">Login</a></div></li>';
    } else {
      $data['navlog'] = '<li class="nav-item"><a class="nav-link" href="' . BASEURL . '/dashboard">Dashboard</a></li>';
    }
    $this->view('headcenterbody/head', $data);
    $this->view('headcenterbody/utility/cdn/css/index/home/cdn');
    $this->view('headcenterbody/utility/css/index/home/css');
    $this->view('headcenterbody/center');
    $this->view('headcenterbody/utility/fakebody/index/home/bodyopen');
    $this->view('index/home/navfood/nav', $data);
    $this->view('index/home/index/index');
    $this->view('index/home/index/about');
    $this->view('index/home/index/service');
    $this->view('index/home/index/portfolio');
    $this->view('index/home/index/index1');
    $this->view('index/home/index/contact');
    $this->view('index/home/navfood/footer', $data);
    $this->view('headcenterbody/utility/cdn/js/index/home/cdn');
    $this->view('headcenterbody/utility/js/index/home/js');
    $this->view('headcenterbody/utility/fakebody/index/home/bodyclose');
    $this->view('index/all/coming');
    $this->view('headcenterbody/body');
  }

  public function TermsAndConditions()
  {
    $data['title'] = 'Welcome To HELMIAR527';
    $data['years1'] = '2022';
    $data['years'] = date('Y');
    $this->view('headcenterbody/head', $data);
    $this->view('headcenterbody/utility/css/css');
    $this->view('headcenterbody/center');
    $this->view('index/home/navfood/termsNav');
    $this->view('headcenterbody/utility/js/js');
    $this->view('headcenterbody/body');
  }

  public function incontact()
  {
    if ($this->model('ContactModel')->insertContact($_POST) > 0) {
      Flasher::setFlash('success', 'Terima kasih ', 'Pesan berhasil terkirim!', 'Semoga harimu menyenangkan.');
      header('Location: ' . BASEURL . '/#contact');
      exit;
    } else {
      Flasher::setFlash('danger', 'Mohon maaf ', 'Pesan gagal terkirim!', 'Semoga harimu menyenangkan.');
      header('Location: ' . BASEURL . '/#contact');
      exit;
    }
  }
}
