
<?php
// deklarasi parameter koneksi database
$server   = "localhost";
$username = "uussutar_klinik";
$password = "2009091120us";
$database = "uussutar_klinik";

// koneksi database
$mysqli = new mysqli($server, $username, $password, $database);

// cek koneksi
if ($mysqli->connect_error) {
    die('Koneksi Database Gagal : '.$mysqli->connect_error);
}
?>