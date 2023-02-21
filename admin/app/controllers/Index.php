<?php

class Index extends Controller
{
  public function index()
  {
    $data = $this->process('IndexProcess')->index();
    $this->view('hcb/head', $data);
    $this->view('hcb/admin/admin/utility/css/css');
    $this->view('hcb/center', $data);
    $this->view('hcb/admin/admin/body/bodyopen');
    $this->view('admin/etc/preload');
    $this->view('admin/navfood/nav');
    $this->view('admin/navfood/nav1', $data);
    $this->view('hcb/admin/admin/body/bodyopen1');
    $this->view('admin/etc/contentHeader', $data);
    $this->view('admin/dashboard');
    $this->view('hcb/admin/admin/body/bodyclose1');
    $this->view('hcb/admin/admin/body/bodyclose');
    $this->view('hcb/admin/admin/utility/js/js');
    $this->view('hcb/body');
  }

  public function newFitur()
  {
    $data = $this->process('IndexProcess')->newFitur();
    $this->view('hcb/head', $data);
    $this->view('hcb/admin/admin/utility/css/css');
    $this->view('hcb/center', $data);
    $this->view('hcb/admin/admin/body/bodyopen');
    $this->view('admin/etc/preload');
    $this->view('admin/navfood/nav');
    $this->view('admin/navfood/nav1', $data);
    $this->view('admin/newFitur');
    $this->view('hcb/admin/admin/body/bodyclose');
    $this->view('hcb/admin/admin/utility/js/js');
    $this->view('hcb/body');
  }
}
