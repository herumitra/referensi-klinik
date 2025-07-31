<?php 
	session_start();
	include "../koneksi.php";

	$kode = @mysqli_real_escape_string($conn, $_POST['kode']);
	$nama = @mysqli_real_escape_string($conn, $_POST['nama']);
/*	$nama = strtoupper($nama);*/
	$ktg = @mysqli_real_escape_string($conn, $_POST['ktg']);
	$bentuk = @mysqli_real_escape_string($conn, $_POST['bentuk']);
	$satuan = @mysqli_real_escape_string($conn, $_POST['satuan']);
	$harga = @mysqli_real_escape_string($conn, $_POST['harga']);
	$min_stok = @mysqli_real_escape_string($conn, $_POST['min_stok']);
	$exp = @mysqli_real_escape_string($conn, $_POST['exp']);
	$stok = @mysqli_real_escape_string($conn, $_POST['stok']);
	$lokasi = @mysqli_real_escape_string($conn, $_POST['lokasi']);
	$status = @mysqli_real_escape_string($conn, $_POST['status']);
		$harga_jual = @mysqli_real_escape_string($conn, $_POST['jual']);

	$query = "INSERT INTO tbl_apotek (kd_obat, nm_obat, ktg_obat, bnt_obat, sat_obat, hrg_obat, hrgbeli_obat, stk_obat, minstk_obat, status, lokasi) VALUES('$kode', '$nama', '$ktg', '$bentuk', '$satuan', '$harga_jual', '$harga', '$stok', '$min_stok', '$status', '$lokasi')";
	$sql = mysqli_query($conn, $query) or die ($conn->error);


	if($sql ) {
		echo "tersimpan";
	} else {
		echo "gagal";
	}
 ?>