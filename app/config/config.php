<?php

// URL Default
$protocol = 'http://'; // Keamanan website
$host = ($_SERVER["HTTP_HOST"]); // Get host url
$path = '/private/index'; // Filebpatch
$rootuser = '/public';

define('ROOTURL', $protocol . $host);
define('BASEURL', $protocol . $host . $path);
define('USERURL', $protocol . $host . $path . $rootuser);

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
