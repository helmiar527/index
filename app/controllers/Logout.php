<?php

class Logout
{
  public function index()
  {
    session_destroy();
    $_SESSION['status'] = null;
    header('Location: ' . BASEURL . '/login');
  }
}
