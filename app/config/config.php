<?php

// URL Default
$protocol = 'https://'; // Keamanan website
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
$hostdb = '127.0.0.1';
$userdb = 'user';
$passdb = 'Foruser527*';
$namedb = 'index';

define('DB_HOST', $hostdb);
define('DB_USER', $userdb);
define('DB_PASS', $passdb);
define('DB_NAME', $namedb);

// Salt

$saltcookie = 'super|123456789009876543211029384756`-=[]\;.,/~!@#$%^&*()_+{}:">?<|encrypt';
$saltpass = 'superencryptpassword|qwertyuiopasdfghjklzxcvbnm|ASDFGHJKLZXCVBNMQWERTYUIOP|123456789009876543211029384756`-=[]\;.,/~!@#$%^&*()_+{}:">?<|encrypt';

define('SALT', $saltcookie);
define('SALTPASS', $saltpass);