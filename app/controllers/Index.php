<?php

class Index extends Controller
{

  public function index()
  {
    $data = $this->process('IndexProcess')->index();
    $this->view('hcb/head', $data);
    $this->view('hcb/index/index/utility/cdn/css/cdn');
    $this->view('hcb/index/index/utility/css/css');
    $this->view('hcb/center');
    $this->view('hcb/index/index/body/bodyopen');
    $this->view('index/index/navfood/nav', $data);
    $this->view('index/index/index');
    $this->view('index/index/about');
    $this->view('index/index/service');
    $this->view('index/index/portfolio');
    $this->view('index/index/index1');
    $this->view('index/index/contact');
    $this->view('index/index/navfood/footer', $data);
    $this->view('hcb/index/index/body/bodyclose');
    $this->view('hcb/index/index/utility/cdn/js/cdn');
    $this->view('hcb/index/index/utility/js/js');
    $this->view('index/all/coming');
    $this->view('hcb/body');
  }

  public function TermsAndConditions()
  {
    $data = $this->process('IndexProcess')->TermsAndConditions();
    $this->view('headcenterbody/head', $data);
    $this->view('headcenterbody/utility/css/css');
    $this->view('headcenterbody/center');
    $this->view('index/home/navfood/termsNav');
    $this->view('headcenterbody/utility/js/js');
    $this->view('headcenterbody/body');
  }

  public function incontact()
  {
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
