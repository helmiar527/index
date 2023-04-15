<?php
// Load semua define
require_once 'config/define.php';
// Auto load semua class yang ada di core
spl_autoload_register(function ($class) {
  require_once 'systems/' . $class . '.php';
});
// Load semua content
require_once 'config/content.php';
