<?php

class Out extends Controller
{
  public function index()
  {
    session_destroy();
    $_SESSION['status'] = null;
    header('Location: ' . BASEURL);
  }
}
