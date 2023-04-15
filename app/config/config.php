<?php

require_once 'process-config.php';

// ROOT PATH
$rootdoc = $_SERVER['DOCUMENT_ROOT'];
$rawPathRoot = $_SERVER['SCRIPT_NAME'];
$path = str_replace("/index.php", "", $rawPathRoot);
$rootuser = '/public';

// URL Default
$host = ($_SERVER["HTTP_HOST"]);
