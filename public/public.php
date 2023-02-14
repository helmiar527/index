<?php
// Memulai Session
if (!session_id()) session_start();
// Memanggil semua class
require_once 'app/init.php';
// Memanggil App baru
$app = new APP;
