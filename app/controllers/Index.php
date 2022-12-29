<?php

class Index extends Controller {
  public function index() {
    $data['title'] = 'Welcome';
    $this->view('HeadCenterBody/head', $data);
    $this->view('HeadCenterBody/Utility/Custom/custom');
    $this->view('HeadCenterBody/Utility/Css/css');
    $this->view('HeadCenterBody/center');
    $this->view('Index/home/index/sc1open');
    $this->view('Index/home/navfood/nav');
    $this->view('Index/home/index/sc1');
    $this->view('Index/home/index/sc1close');
    $this->view('Index/home/index/hr');
    $this->view('Index/home/index/sc2');
    $this->view('Index/home/index/hr1');
    $this->view('Index/home/navfood/footer');
    $this->view('HeadCenterBody/Utility/Js/js');
    $this->view('HeadCenterBody/body');
  }
  public function about() {
    $data['title'] = 'About';
    $this->view('HeadCenterBody/head', $data);
    $this->view('HeadCenterBody/Utility/Custom/custom');
    $this->view('HeadCenterBody/Utility/Css/css');
    $this->view('HeadCenterBody/center');
    $this->view('Index/home/bgopen');
    $this->view('Index/home/navfood/nav');
    $this->view('Index/home/bgclose');
    $this->view('Index/home/about');
    $this->view('Index/home/navfood/footer');
    $this->view('HeadCenterBody/Utility/Js/js');
    $this->view('HeadCenterBody/body');
  }
  public function feature() {
    $data['title'] = 'About';
    $this->view('HeadCenterBody/head', $data);
    $this->view('HeadCenterBody/Utility/Custom/custom');
    $this->view('HeadCenterBody/Utility/Css/css');
    $this->view('HeadCenterBody/center');
    $this->view('Index/home/bgopen');
    $this->view('Index/home/navfood/nav');
    $this->view('Index/home/bgclose');
    $this->view('Index/home/feature');
    $this->view('Index/home/navfood/footer');
    $this->view('HeadCenterBody/Utility/Js/js');
    $this->view('HeadCenterBody/body');
  }
  public function signin() {
    $data['title'] = 'About';
    $this->view('HeadCenterBody/head', $data);
    $this->view('HeadCenterBody/Utility/Custom/custom');
    $this->view('HeadCenterBody/Utility/Css/css');
    $this->view('HeadCenterBody/center');
    $this->view('Index/home/bgopen');
    $this->view('Index/home/navfood/nav');
    $this->view('Index/home/bgclose');
    $this->view('Index/home/login/signin');
    $this->view('Index/home/navfood/footer');
    $this->view('HeadCenterBody/Utility/Js/js');
    $this->view('HeadCenterBody/body');
  }
  public function login() {
    $data['title'] = 'About';
    $this->view('HeadCenterBody/head', $data);
    $this->view('HeadCenterBody/Utility/Custom/custom');
    $this->view('HeadCenterBody/Utility/Css/css');
    $this->view('HeadCenterBody/center');
    $this->view('Index/home/bgopen');
    $this->view('Index/home/navfood/nav');
    $this->view('Index/home/bgclose');
    $this->view('Index/home/login/login');
    $this->view('Index/home/navfood/footer');
    $this->view('HeadCenterBody/Utility/Js/js');
    $this->view('HeadCenterBody/body');
  }
}