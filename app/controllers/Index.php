<?php

class Index extends Controller {
  public function index() {
    $data['title'] = 'Welcome';
    $this->view('HeadCenterBody/head', $data);
    $this->view('HeadCenterBody/Utility/Custom/custom');
    $this->view('HeadCenterBody/Utility/Css/css');
    $this->view('HeadCenterBody/center');
    $this->view('Index/navfood/nav');
    $this->view('Index/index', $data);
    $this->view('HeadCenterBody/Utility/Js/js');
    $this->view('HeadCenterBody/body');
  }
}