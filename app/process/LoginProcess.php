<?php

class LoginProcess
{
  public function index()
  {
    $data['title'] = 'Login';
    $data['years1'] = '2022';
    $data['years'] = date('Y');
    return $data;
  }
}