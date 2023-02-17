<?php

class Controller
{
  public function process($process)
  {
    require_once 'app/process/' . $process . '.php';
    return new $process;
  }

  public function view($view, $data = [])
  {
    require_once 'app/views/' . $view . '.php';
  }

  public function model($model)
  {
    require_once 'app/models/' . $model . '.php';
    return new $model;
  }
}
