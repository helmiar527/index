<?php
class Test extends controller
{
  public function index()
  {
    // var_dump($HTTP_RAW_POST_DATA);
    // var_dump($GLOBALS['HTTP_X_FORWARDED_FOR']);
    // var_dump($_SERVER);
    // setcookie("nama_cookie", "nilai_cookie", time() + 3600);
    // setcookie("asdasd", "sgsdaf", time() + 3600, "/");
    $_POST['nameCookie'] = 'user';
    $cookieuser = 'aswd';
    // setcookie('nama_cookie', 'nilai_cookie', time() + (7 * 24 * 60 * 60), '/');
    // header('Set-Cookie: ' . $_POST['nameCookie'] . '=' . $cookieuser . '; expires=' . gmdate('D, d M Y H:i:s \G\M\T', time() + 7 * 24 * 3600) . '; path=/');
    header('Set-Cookie: ' . $_POST['nameCookie'] . '=; expires=' . gmdate('D, d M Y H:i:s \G\M\T', time() - (7 * 24 * 60 * 60)) . '; path=/');
    // var_dump($_SERVER['HTTP_USER_AGENT']);
  }
}
