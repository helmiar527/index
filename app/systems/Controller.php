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

  public function api($var, $exit = false)
  {
    echo '<pre>';
    if (is_array($var) || is_object($var)) {
      echo '<code>';
      print_r($var);
      echo '</code>';
    } else {
      echo (htmlspecialchars($var) . '<br>');
    }
    echo '</pre>';
    if ($exit) {
      exit();
    }
  }

  public function dd($var, $exit = false)
  {
    echo '<pre>';
    echo '<div style="border: 2px solid #ccc; background-color: #f3f3f3; padding: 10px; border-radius: 5px;">';
    echo '<strong style="color: #FF5733;">Debug Output:</strong><br><br>';
    if (is_array($var) || is_object($var)) {
      echo '<code>';
      print_r($var);
      echo '</code>';
    } else {
      if (gettype($var) == 'boolean') {
        if (htmlspecialchars($var) == true) {
          echo '<strong>Value:</strong> ' . htmlspecialchars($var) . ' / true' . '<br>';
        } else {
          echo '<strong>Value:</strong> 0 / false<br>';
        }
      } else {
        echo '<strong>Value:</strong> ' . htmlspecialchars($var) . '<br>';
      }
    }

    echo '<div style="margin-top: 10px;">';
    echo '<strong style="color: #FF5733;">Type:</strong> ' . gettype($var);

    if (is_object($var)) {
      echo ' | <strong style="color: #FF5733;">Class:</strong> ' . get_class($var);
    }

    if (is_array($var) || is_object($var)) {
      echo ' | <strong style="color: #FF5733;">Count:</strong> ' . count((array)$var);
    }

    echo '</div>';
    echo '</div>';
    echo '</pre>';

    if ($exit) {
      exit();
    }
  }
}
