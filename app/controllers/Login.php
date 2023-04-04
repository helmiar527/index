<?php

class Login extends Controller
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
    if (isset($_COOKIE['user-login'])) {
      $_POST['device'] = $_SERVER['HTTP_USER_AGENT'];
      $row = $this->model('CookieModel')->cekCookie($_POST);
      if (password_verify($row['cookie'], $_COOKIE['user-login'])) {
        $_POST['username'] = $row['username'];
        $row1 = $this->model('AccModel')->cekAccLog($_POST);
        $_SESSION['username'] = $row1['username'];
        $_SESSION['email'] = $row1['email'];
        $_SESSION['status'] = 'logged';
        header('Location: ' . BASEURL . '/dashboard');
        exit;
      }
    } else {
      $data = $this->process('IndexProcess')->login();
      $this->view('hcb/head', $data);
      $this->view('hcb/index/login/utility/css/css');
      $this->view('hcb/center');
      $this->view('index/login/login');
      $this->view('index/index/navfood/footer', $data);
      $this->view('hcb/index/login/utility/js/js-login');
      $this->view('index/all/coming');
      $this->view('hcb/body');
    }
  }

  public function cekAcc()
  {
    if ($_POST == !NULL) {
      if (empty($_POST['username'])) {
        Flasher::setFlash('warning', 'Data yang dikirimkan ', 'Tidak lengkap/terjadi kesalahan di user! ', 'silahkan isi data dengan benar.');
        http_response_code(400);
        echo (Flasher::flash());
      } else {
        $row = $this->model('AccModel')->cekAccLog($_POST);
        if ($row == false) {
          Flasher::setFlash('danger', 'Akun ', 'Tidak dapat ditemukan! ', 'Silahkan <a href="' . BASEURL . '/register">daftar</a> terlebih dahulu.');
          http_response_code(400);
          echo (Flasher::flash());
        } else {
          http_response_code(200);
        }
      }
    } else {
      Flasher::setFlash('warning', 'Data yang dikirimkan ', 'Tidak lengkap/terjadi kesalahan di user! ', 'silahkan isi data dengan benar.');
      http_response_code(400);
      echo (Flasher::flash());
    }
  }

  public function login()
  {
    if ($_POST == !NULL) {
      if (empty($_POST['username']) || empty($_POST['password'])) {
        Flasher::setFlash('warning', 'Data yang dikirimkan ', 'Tidak lengkap/terjadi kesalahan di user! ', 'silahkan isi data dengan benar.');
        http_response_code(400);
        echo (Flasher::flash());
      } else {
        $row = $this->model('AccModel')->cekAccLog($_POST);
        $passcheck = $_POST['password'];
        $passhash = $row['password'];
        if (password_verify($passcheck . SALTPASS, $passhash)) {
          $_SESSION['username'] = $row['username'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['status'] = 'logged';
          if (isset($_POST['remember'])) {
            $random_chars = str_split(SALTCOOKIE);
            shuffle($random_chars);
            $random_string = "";
            for ($i = 0; $i < strlen($_POST['username']); $i++) {
              $random_string .= $random_chars[$i];
            }
            $_POST['nameCookie'] = 'user-login';
            $_POST['cookie'] = $random_string . SALTCOOKIE;
            $_POST['device'] = $_SERVER['HTTP_USER_AGENT'];
            $cookieuser = password_hash($random_string . SALTCOOKIE, PASSWORD_DEFAULT);
            if ($this->model('CookieModel')->addCookie($_POST)) {
              header('Set-Cookie: ' . $_POST['nameCookie'] . '=' . $cookieuser . '; expires=' . gmdate('D, d M Y H:i:s \G\M\T', time() + 7 * 24 * 3600) . '; path=/');
            }
          }
        } else {
          Flasher::setFlash('warning', 'Password akun ', 'Salah! ', 'Silahkan masukkan dengan benar.');
          http_response_code(400);
          echo (Flasher::flash());
        }
      }
    } else {
      Flasher::setFlash('warning', 'Data yang dikirimkan ', 'Tidak lengkap/terjadi kesalahan di user! ', 'silahkan isi data dengan benar.');
      http_response_code(400);
      echo (Flasher::flash());
    }
  }

  public function cekCookie()
  {
    if ($_POST == !NULL) {
      if (empty($_POST['username'])) {
        Flasher::setFlash('warning', 'Data yang dikirimkan ', 'Tidak lengkap/terjadi kesalahan di user! ', 'silahkan isi data dengan benar.');
        http_response_code(400);
        echo (Flasher::flash());
      } else {
        if (isset($_COOKIE['user-login'])) {
          http_response_code(200);
        } else {
          if ($this->model('CookieModel')->delCookie($_POST)) {
            http_response_code(200);
          } else {
            Flasher::setFlash('warning', 'Verifikasi cookie ', 'gagal dihapus! ', 'mungkin sudah di hapus sebelumnya.');
            http_response_code(200);
            echo (Flasher::flash());
          }
        }
      }
    } else {
      Flasher::setFlash('warning', 'Data yang dikirimkan ', 'Tidak lengkap/terjadi kesalahan di user! ', 'silahkan isi data dengan benar.');
      http_response_code(400);
      echo (Flasher::flash());
    }
  }
}
