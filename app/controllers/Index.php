<?php

class Index extends Controller {
  public function index() {
    $data['title'] = 'Welcome';
    $this->view('HeadCenterBody/head', $data);
    $this->view('HeadCenterBody/Utility/Css/css', $data);
    $this->view('HeadCenterBody/center', $data);
    $this->view('Index/navfood/nav', $data);
    $this->view('Index/index', $data);
    $this->view('HeadCenterBody/Utility/Js/js', $data);
    $this->view('HeadCenterBody/body', $data);
  }
}