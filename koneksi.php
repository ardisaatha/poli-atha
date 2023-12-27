<?php
$databaseHost = 'localhost';
$databaseName = 'poliklinik';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

//cek koneksi
if (!$mysqli) {
    die("koneksi gagal: " . mysqli_connect_error());
}

?>