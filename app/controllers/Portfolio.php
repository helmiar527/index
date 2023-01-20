<?php

class Portfolio extends Controller {
  public function index() {
    $data['title'] = 'Welcome To HELMIAR527';
    $this->view('headcenterbody/head', $data);
    $this->view('headcenterbody/utility/js/portfolio/home/js-1');
    $this->view('headcenterbody/utility/cdn/portfolio/home/cdn');
    $this->view('headcenterbody/utility/css/portfolio/home/css');
    $this->view('headcenterbody/center');
    $this->view('headcenterbody/utility/fakebody/portfolio/home/bodyopen');
    $this->view('portfolio/home/navfood/nav');
    $this->view('portfolio/home/index/index');
    $this->view('portfolio/home/navfood/footer');
    $this->view('headcenterbody/utility/js/portfolio/home/js');
    $this->view('headcenterbody/utility/fakebody/portfolio/home/bodyclose');
    $this->view('headcenterbody/body');
  }
  public function index1() {
//$this->view('index/home/index1/head');
//$this->view('index/home/index1/link');
//$this->view('index/home/index1/center');
//$this->view('index/home/index1/nav');
//$this->view('index/home/index1/content');
//$this->view('index/home/index1/footer');
//$this->view('index/home/index1/script');
//$this->view('index/home/index1/body');
    $this->view('index/home/index1/index');
  }
}