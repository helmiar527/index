<?php

class Register extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION['status']) || $_SESSION['status'] !== "logged") {
      if (isset($_COOKIE['user-login'])) {
        header('Location: ' . BASEURL . '/Login');
        exit;
      }
    } else {
      header('Location: ' . BASEURL . '/Dashboard');
      exit;
    }
  }

  public function index()
  {
    $data = $this->process('RegisterProcess')->index();
    $this->view('hcb/head', $data);
    $this->view('hcb/index/login/utility/css/css');
    $this->view('hcb/center');
    $this->view('index/login/register');
    $this->view('index/index/navfood/footer', $data);
    $this->view('hcb/index/login/utility/js/js-register');
    $this->view('index/all/coming');
    $this->view('hcb/body');
  }

  public function register()
  {
    if ($_POST == !NULL) {
      if (empty($_POST['name']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
        Flasher::setFlash('warning', 'Data yang dikirimkan ', 'Tidak lengkap/terjadi kesalahan di user! ', 'silahkan isi data dengan benar.');
        http_response_code(400);
        echo (Flasher::flash());
      } else {
        $row = $this->model('AccModel')->cekAcc($_POST);
        if ($row == false) {
          $_POST['file'] = '';
          $_POST['role'] = 'User';
          $_POST['isChange'] = '0';
          if ($this->model('AccModel')->addAccUser($_POST) > 0) {
            Flasher::setFlash('success', 'Akun ', 'berhasil didaftarkan! ', 'silahkan <a href="' . BASEURL . '/Login">login</a>.');
            http_response_code(200);
            echo (Flasher::flash());
          } else {
            Flasher::setFlash('danger', 'Akun ', 'gagal didaftarkan! ', 'silahkan coba lagi nanti.');
            http_response_code(503);
            echo (Flasher::flash());
          }
        } else {
          if ($row['username'] == $_POST['username'] || $row['email'] == $_POST['email']) {
            Flasher::setFlash('warning', 'Username/Email ', 'Tidak tersedia/pernah digunakan! ', 'gunakan Username/Email yang lain.');
            http_response_code(402);
            echo (Flasher::flash());
          }
        }
      }
    } else {
      http_response_code(400);
      $this->api(json_encode(array('You not access this api'), JSON_PRETTY_PRINT));
    }
  }

  public function alertPass()
  {
    Flasher::setFlash('warning', 'Password dan RetypePassword ', 'Tidak sama! ', 'silahkan cek dengan benar.');
    echo (Flasher::flash());
  }
}
