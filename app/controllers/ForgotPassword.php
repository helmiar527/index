<?php

class ForgotPassword extends controller {
    public function index() {
        $data['title'] = 'Login';
        $this->view('headcenterbody/head', $data);
        $this->view('headcenterbody/utility/css/index/login/css');
        $this->view('headcenterbody/center');
        $this->view('index/home/login/forgotPass');
        $this->view('index/home/navfood/footer');
        $this->view('headcenterbody/utility/js/index/login/js');
        $this->view('headcenterbody/body');
    }
}