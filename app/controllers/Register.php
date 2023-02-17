<?php

class Register extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['status']) || $_SESSION['status'] !== "logged") {
    } else {
      header('Location: ' . BASEURL . '/dashboard');
      exit;
    }
  }

  public function index()
  {
    $data = $this->process('IndexProcess')->register();
    $this->view('hcb/head', $data);
    $this->view('hcb/index/login/utility/css/css');
    $this->view('hcb/center');
    $this->view('index/login/register');
    $this->view('index/index/navfood/footer', $data);
    $this->view('hcb/index/login/utility/js/js');
    $this->view('index/all/coming');
    $this->view('hcb/body');
  }

  public function register()
  {
    if ($_POST['pass'] == $_POST['repass']) {
      $row = $this->model('AccModel')->cekAcc($_POST);
      if ($row == false) {
        $_POST['file'] = '';
        $_POST['role'] = 'User';
        $_POST['isChange'] = '0';
        if ($this->model('AccModel')->addAccUser($_POST) > 0) {
          Flasher::setFlash('success', 'Akun ', 'Berhasil didaftarkan! ', 'Silahkan <a href="' . BASEURL . '/login">login</a>.');
          header('Location: ' . BASEURL . '/register');
          exit;
        } else {
          Flasher::setFlash('danger', 'Akun ', 'Gagal didaftarkan! ', 'Silahkan coba lagi nanti.');
          header('Location: ' . BASEURL . '/register');
          exit;
        }
      } else {
        if ($row['unameUser'] == $_POST['uname']) {
          Flasher::setFlash('danger', 'Akun ', 'Gagal didaftarkan! ', 'Username yang anda masukkan tidak tersedia/pernah digunakan.');
          header('Location: ' . BASEURL . '/register');
          exit;
        } else {
          if ($row['emailUser'] == $_POST['email']) {
            Flasher::setFlash('danger', 'Akun ', 'Gagal didaftarkan! ', 'Email yang anda masukkan tidak tersedia/pernah digunakan.');
            header('Location: ' . BASEURL . '/register');
            exit;
          }
        }
      }
    } else {
      Flasher::setFlash('warning', 'Retype password ', 'Tidak sama! ', 'Silahkan coba lagi.');
      header('location: ' . BASEURL . '/register');
      exit;
    }
  }
}
