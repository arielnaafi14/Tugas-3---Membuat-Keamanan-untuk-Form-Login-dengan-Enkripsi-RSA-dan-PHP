<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "db_login";

$koneksi = mysqli_connect($host, $user, $password, $dbname);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
