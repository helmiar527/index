<?php

class Login extends Controller {
	public function index() {
		$data['title'] = 'Login';
		$this->view('HeadCenterBody/head', $data);
		$this->view('HeadCenterBody/Utility/Custom/custom');
		$this->view('HeadCenterBody/Utility/Css/css');
		$this->view('HeadCenterBody/center');
		$this->view('Index/home/navfood/nav');
		$this->view('Index/home/login/login', $data);
		$this->view('HeadCenterBody/Utility/Js/js');
		$this->view('HeadCenterBody/body');
	}
}
