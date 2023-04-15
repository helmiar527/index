<?php
require_once 'config.php';

// URL
define('ROOTURL', $protocol . $host);
define('BASEURL', $protocol . $host . $path);
define('USERURL', $protocol . $host . $path . $rootuser);

// Method dan Index Default
define('Home', $ENV['METHOD_URL']); //method
define('index', $ENV['INDEX_URL']); //index

// Database
define('DB_HOST', $ENV['DB_HOST']);
define('DB_USER', $ENV['DB_USER']);
define('DB_PASS', $ENV['DB_PASS']);
define('DB_NAME', $ENV['DB_NAME']);

// SALT
define('SALT_COOKIE', $ENV['SALT_COOKIE']);
define('SALT_PASS', $ENV['SALT_PASS']);
