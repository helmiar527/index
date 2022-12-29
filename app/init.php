<?php
// Auto Load semua class yang ada
spl_autoload_register(function($class){
  require_once 'core/' . $class . '.php';
});

// Load config
require_once 'config/config.php';