<?php
// URL Default
$protocol = 'https://'; //keamanan website
$host = ($_SERVER["HTTP_HOST"]); //get url
$path = '/private/index'; //filebpatch

define('BASEURL', $protocol . $host);
define('USERURL', $protocol . $host . $path . '/public');

// Opsi
// jaringan local
// HTTP_HOST
// jaringan internet
// HTTP_REFERER

// Method dan Index Default
$method = 'Index'; //method
$index = 'index'; //index

define('Home', $method);
define('index', $index);

// Database
$hostdb = '';
$userdb = '';
$passdb = '';
$namedb = '';

define('DB_HOST', $hostdb);
define('DB_USER', $userdb);
define('DB_PASS', $passdb);
define('DB_NAME', $namedb);