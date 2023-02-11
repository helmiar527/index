<?php
// Auto Load semua class yang ada di core
spl_autoload_register(function ($class) {
  require_once 'core/' . $class . '.php';
});

// Load config
require_once 'config/' . 'config.php';

// Load content
require_once 'config/' . 'content.php';
