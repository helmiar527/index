<?php
// URL DEFAULT
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
  $protocol = 'https://';
} else {
  $protocol = 'http://';
}

// ENV
$rawPath = $_SERVER['SCRIPT_FILENAME'];
$pathEnv = str_replace("/index.php", "", $rawPath);
$envFilePath = $pathEnv . '/.env';
$ENV = parse_ini_file($envFilePath);
