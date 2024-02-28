<?php

class Error404 extends Controller
{
  public function index()
  {
    header('HTTP/1.1 404');
    $data = $this->process('ErrProcess')->index404();
    $this->view('hcb/head', $data);
    $this->view('hcb/index/dashboard/utility/css/csserr');
    $this->view('hcb/center');
    $this->view('err/404', $data);
    $this->view('hcb/index/dashboard/utility/js/jserr');
    $this->view('hcb/body');
  }
}