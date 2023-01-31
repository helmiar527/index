<?php

class Register extends Controller {
  public function __construct() {
    if (!isset($_SESSION['status']) || $_SESSION['status'] !== "logged") {
    } else {
      header('Location: '. BASEURL . '/dashboard');
      exit;
    }
  }

  public function index() {
    $data['title'] = 'Register';
    $this->view('headcenterbody/head', $data);
    $this->view('headcenterbody/utility/css/index/login/css');
    $this->view('headcenterbody/center');
    $this->view('index/home/login/register');
    $this->view('index/home/navfood/footer');
    $this->view('headcenterbody/utility/js/index/login/js');
    $this->view('headcenterbody/body');
  }

  public function register() {
    if ($_POST['pass'] == $_POST['repass']) {
      $row = $this->model('AccModel')->cekAcc($_POST);
      if ($row == false) {
        if ($this->model('AccModel')->addAccUser($_POST) > 0) {
          Flasher::setFlash('success', 'Akun ', 'Berhasil didaftarkan! ', 'Silahkan login.');
          http_response_code(200);
          header('Location: '. BASEURL . '/register');
          exit;
        } else {
          Flasher::setFlash('danger', 'Akun ', 'Gagal didaftarkan! ', 'Silahkan coba lagi nanti.');
          http_response_code(400);
          header('Location: '. BASEURL . '/register');
          exit;
        }
      } else {
        if ($row['unameUser'] == $_POST['uname']) {
          Flasher::setFlash('danger', 'Akun ', 'Gagal didaftarkan! ', 'Username yang anda masukkan tidak tersedia/pernah digunakan.');
          header('Location: '. BASEURL . '/register');
          exit;
        } else {
          if ($row['emailUser'] == $_POST['email']) {
            Flasher::setFlash('danger', 'Akun ', 'Gagal didaftarkan! ', 'Email yang anda masukkan tidak tersedia/pernah digunakan.');
            header('Location: '. BASEURL . '/register');
            exit;
          }
        }
      }
    } else {
      Flasher::setFlash('warning', 'Retype password ', 'Tidak sama! ', 'Silahkan coba lagi.');
      header('location: '. BASEURL . '/register');
      exit;
    }
  }
}