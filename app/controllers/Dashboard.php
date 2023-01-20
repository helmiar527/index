<?php

class Dashboard extends controller {
    public function index() {
        $data['title'] = 'Dashboard';
        $this->view('headcenterbody/head', $data);
        $this->view('headcenterbody/utility/css/index/dashboard/css');
        $this->view('headcenterbody/center');
        $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyopen');
        $this->view('index/dashboard/navfood/nav');
        $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyopen1');
        $this->view('index/dashboard/navfood/nav1');
        $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyopen2');
        $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyopen3');
        $this->view('index/dashboard/index');
        $this->view('index/dashboard/navfood/footer');
        $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyclose3');
        $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyclose2');
        $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyclose1');
        $this->view('headcenterbody/utility/fakebody/index/dashboard/bodyclose');
        $this->view('headcenterbody/utility/js/index/dashboard/js');
        $this->view('headcenterbody/body');
    }
}