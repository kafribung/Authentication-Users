<?php
// Inisialisai DB
$host = 'localhost';
$user = 'root';
$pass = '60900117001';
$db   = 'php_auth';

// Koneksi DB
$link = $link = mysqli_connect($host, $user, $pass, $db) or die("Koneksi DB error " . mysqli_connect_error());
