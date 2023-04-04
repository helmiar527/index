<?php

class Logout extends Controller
{
  public function index()
  {
    if (isset($_COOKIE['user-login'])) {
      $_POST['username'] = $_SESSION['username'];
      if ($this->model('CookieModel')->delCookie($_POST)) {
        header('Set-Cookie: user-login=; expires=' . gmdate('D, d M Y H:i:s \G\M\T', time() - (7 * 24 * 60 * 60)) . '; path=/');
        session_destroy();
        $_SESSION['status'] = null;
        header('Location: ' . BASEURL . '/login');
      }
    } else {
      session_destroy();
      $_SESSION['status'] = null;
      header('Location: ' . BASEURL . '/login');
    }
  }
}
