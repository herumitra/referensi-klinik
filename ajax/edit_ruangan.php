<?php 
	session_start();
	include "../koneksi.php";

	$id_ruangan = @mysqli_real_escape_string($conn, $_POST['id_ruangan']);
	$kamar = @mysqli_real_escape_string($conn, $_POST['kamar']);
	$no_bed = @mysqli_real_escape_string($conn, $_POST['no_bed']);
	$tarif = @mysqli_real_escape_string($conn, $_POST['tarif']);
	$kelas = @mysqli_real_escape_string($conn, $_POST['kelas']);

	$query = "UPDATE ruangan SET kamar='$kamar', no_bed='$no_bed', tarif='$tarif', kelas='$kelas' WHERE id_ruangan = '$id_ruangan'";
	$sql = mysqli_query($conn, $query) or die ($conn->error);
	if($sql) {
		echo "berhasil";
	} else {
		echo "gagal";
	}
?>