<?php

class RegisterProcess
{
  public function index()
  {
    $data['title'] = 'Register';
    $data['years1'] = '2022';
    $data['years'] = date('Y');
    return $data;
  }
}