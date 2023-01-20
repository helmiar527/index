<?php

class Index extends Controller {
  public function index() {
    $data['title'] = 'Welcome To HELMIAR527';
    $this->view('headcenterbody/head', $data);
    $this->view('headcenterbody/utility/cdn/css/index/home/cdn');
    $this->view('headcenterbody/utility/css/index/home/css');
    $this->view('headcenterbody/center');
    $this->view('headcenterbody/utility/fakebody/index/home/bodyopen');
    $this->view('index/home/navfood/nav');
    $this->view('index/home/index/index');
    $this->view('index/home/index/about');
    $this->view('index/home/index/service');
    $this->view('index/home/index/portfolio');
    $this->view('index/home/index/index1');
    $this->view('index/home/index/contact');
    $this->view('index/home/navfood/footer');
    $this->view('headcenterbody/utility/cdn/js/index/home/cdn');
    $this->view('headcenterbody/utility/js/index/home/js');
    $this->view('headcenterbody/utility/fakebody/index/home/bodyclose');
    $this->view('headcenterbody/body');
  }
  public function register() {
    $data['title'] = 'Register';
    $this->view('headcenterbody/head', $data);
    $this->view('headcenterbody/utility/css/index/login/css');
    $this->view('headcenterbody/center');
    $this->view('index/home/login/register');
    $this->view('index/home/navfood/footer');
    $this->view('headcenterbody/utility/js/index/login/js');
    $this->view('headcenterbody/body');
  }
  public function login() {
    $data['title'] = 'Login';
    $this->view('headcenterbody/head', $data);
    $this->view('headcenterbody/utility/css/index/login/css');
    $this->view('headcenterbody/center');
    $this->view('index/home/login/login');
    $this->view('index/home/navfood/footer');
    $this->view('headcenterbody/utility/js/index/login/js');
    $this->view('headcenterbody/body');
  }
}