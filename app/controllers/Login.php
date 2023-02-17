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
    $data = $this->process('IndexProcess')->login();
    $this->view('hcb/head', $data);
    $this->view('hcb/index/login/utility/css/css');
    $this->view('hcb/center');
    $this->view('index/login/login');
    $this->view('index/index/navfood/footer', $data);
    $this->view('hcb/index/login/utility/js/js');
    $this->view('index/all/coming');
    $this->view('hcb/body');
  }

  public function login()
  {
    $text = $_POST['username'];
    preg_match("/\b(@)\b/i", $text, $matches);
    if ($matches == NULL) {
      $_POST['uname1'] = $_POST['username'];
      $_POST['uname2'] = '';
    } else {
      if ($matches[0] == '@') {
        $_POST['uname2'] = $_POST['username'];
        $_POST['uname1'] = '';
      }
    }
    $row = $this->model('AccModel')->cekAccLog($_POST);
    if ($row == false) {
      Flasher::setFlash('danger', 'Akun ', 'Tidak dapat ditemukan! ', 'Silahkan <a href="' . BASEURL . '/register">daftar</a> terlebih dahulu.');
      header('Location: ' . BASEURL . '/login');
      exit;
    } else {
      $passcheck = $_POST['password'];
      $passhash = $row['passUser'];
      $remember = isset($_POST["remember"]) ? true : false;
      // var_dump($remember);
      $_POST['nameuser'] = $row['unameUser'];
      $row1 = $this->model('CookieModel')->cekCookie($_POST);
      if (password_verify($passcheck . SALTPASS, $passhash)) {
        // if ($row1 == NULL) {if ($this->model('CookieModel')->addCookie($_POST) > 0) {}}
        // $_SESSION['nameUser'] = $row['nameUser'];
        $_SESSION['unameUser'] = $row['unameUser'];
        $_SESSION['emailUser'] = $row['emailUser'];
        $_SESSION['status'] = 'logged';
        // $_SESSION['profile'] = $row['fileName'];
        // if ($remember == true) {
        // $cookie = md5(SALT);
        // setcookie("login", $cookie, time() + (86400 * 7));
        //   // $set1 = setcookie("nama", "nilai_cookie");
        //   // var_dump($set);
        //   // var_dump($set1);
        //   // echo($_COOKIE['nama']);
        //   // echo($_COOKIE['login']);
        // }
        header('Location: ' . BASEURL . '/dashboard');
      } else {
        Flasher::setFlash('danger', 'Password akun ', 'Salah! ', 'Silahkan masukkan dengan benar.');
        header('Location: ' . BASEURL . '/login');
        exit;
      }
    }
  }
}
