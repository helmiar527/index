<?php

class ForgotPassword extends controller
{
  public function index()
  {
    $data['title'] = 'Forgot Password';
    $data['years1'] = '2022';
    $data['years'] = date('Y');
    $this->view('headcenterbody/head', $data);
    $this->view('headcenterbody/utility/css/index/login/css');
    $this->view('headcenterbody/center');
    $this->view('index/home/login/forgotPass');
    $this->view('index/home/navfood/footer', $data);
    $this->view('headcenterbody/utility/js/index/login/js');
    $this->view('headcenterbody/body');
  }

  public function sendcode()
  {
    $data['title'] = 'Send Code';
    $data['years1'] = '2022';
    $data['years'] = date('Y');
    $data['email'] = 'helmi';
    $this->view('headcenterbody/head', $data);
    $this->view('headcenterbody/utility/css/index/login/css');
    $this->view('headcenterbody/center');
    $this->view('index/home/login/sendCode', $data);
    $this->view('index/home/navfood/footer', $data);
    $this->view('headcenterbody/utility/js/index/login/js');
    $this->view('headcenterbody/body');
  }

  public function forgot()
  {
    $row = $this->model('ForgotPassModel')->cekStatus($_POST);
    if ($row == NULL) {
      // echo('tidak ada data');
      // var_dump($row);
      $rand = mt_rand(000001, 999999);
      $_POST['date'] = date('Y-m-d');
      $_POST['day'] = date('d');
      $_POST['code'] = $rand;
      $_POST['status'] = 'unconfirm';
      //var_dump($_POST['date']);
      if ($this->model('ForgotPassModel')->addCode($_POST) > 0) {
        $row1 = $this->model('ForgotPassModel')->cekStatus($_POST);
        $to = $row1['email'];
        $subject = "this code";
        $message = $row1['code'];
        $headers = "From: admin@helmiar527.my.id";
        if (mail($to, $subject, $message, $headers)) {
          echo "Email sent successfully!";
        } else {
          echo "gagal";
        }
        $_POST['day1'] = $row1['day'];
        $_POST['code1'] = $row1['code'];
        $_POST['email1'] = $row1['email'];
        $_POST['status1'] = $row1['status'];
        $_POST['tryOne'] = '1';
        echo ('berhasil tambah code');
        if ($this->model('ForgotPassModel')->addTry($_POST) > 0) {
          echo ('berhasil tambah try');
        }
        echo ('berhasil');
      } else {
        echo ('gagal');
      }
    } else {
      echo ('ada data');
      //var_dump($row);
    }
  }
}
