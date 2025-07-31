<?php 
	session_start();
	include "../koneksi.php";

	$id_poli = @mysqli_real_escape_string($conn, $_POST['id_poli']);
	$nama_poli = @mysqli_real_escape_string($conn, $_POST['nama_poli']);

	$query = "UPDATE tbl_poliklinik SET nama_poli='$nama_poli' WHERE id_poli = '$id_poli'";
	$sql = mysqli_query($conn, $query) or die ($conn->error);
	if($sql) {
		echo "berhasil";
	} else {
		echo "gagal";
	}
?>