<?php

class Index extends Controller {
  public function index() {
    $data['title'] = 'Welcome To HELMIAR527';
    $data['years1'] = '2022';
    $data['years'] = date('Y');
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
    $this->view('index/home/navfood/footer', $data);
    $this->view('headcenterbody/utility/cdn/js/index/home/cdn');
    $this->view('headcenterbody/utility/js/index/home/js');
    $this->view('headcenterbody/utility/fakebody/index/home/bodyclose');
    $this->view('headcenterbody/body');
  }

  public function incontact() {
    if ($this->model('ContactModel')->insertContact($_POST) > 0) {
      Flasher::setFlash('success', 'Terima kasih ', 'Pesan berhasil terkirim!', 'Semoga harimu menyenangkan.');
      header('Location: ' . BASEURL . '/#contact');
      exit;
    } else {
      Flasher::setFlash('danger', 'Mohon maaf ', 'Pesan gagal terkirim!', 'Semoga harimu menyenangkan.');
      header('Location: ' . BASEURL . '/#contact');
      exit;
    }
  }
}