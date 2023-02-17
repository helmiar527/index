<?php
// Auto load semua class yang ada di core
spl_autoload_register(function ($class) {
  require_once 'systems/' . $class . '.php';
});
// Load semua class yang ada di config
require_once 'config/config.php';
require_once 'config/content.php';
