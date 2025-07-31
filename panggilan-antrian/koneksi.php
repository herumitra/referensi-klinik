<?php
// deklarasi parameter koneksi database
$host     = "localhost";              // server database, default “localhost” atau “127.0.0.1”
$username = "uussutar_klinik";                   // username database, default “root”
$password = "2009091120us";                       // password database, default kosong
$database = "uussutar_klinik";             // memilih database yang akan digunakan

// buat koneksi database
$mysqli = mysqli_connect($host, $username, $password, $database);

// cek koneksi
// jika koneksi gagal 
if (!$mysqli) {
  // tampilkan pesan gagal koneksi
  die('Koneksi Database Gagal : ' . mysqli_connect_error());
}
