<?php 
	session_start();
	include "../koneksi.php";


	$no_daftar = @mysqli_real_escape_string($conn, $_POST['no_daftar']);
$nama_pas = @mysqli_real_escape_string($conn, $_POST['nama_pas']);
		$nomor_rm = @mysqli_real_escape_string($conn, $_POST['nomor_rm']);
	$asuransi_pas = @mysqli_real_escape_string($conn, $_POST['asuransi_pas']);
	$no_bpjs = @mysqli_real_escape_string($conn, $_POST['no_bpjs']);
	$diagnosa_awal = @mysqli_real_escape_string($conn, $_POST['diagnosa_awal']);
	$jk_pas = @mysqli_real_escape_string($conn, $_POST['jk_pas']);
	$tgl_lahir = @mysqli_real_escape_string($conn, $_POST['tgl_lahir']);
	$tpt_lahir = @mysqli_real_escape_string($conn, $_POST['tpt_lahir']);
	$kamar = @mysqli_real_escape_string($conn, $_POST['kamar']);
	$no_bed = @mysqli_real_escape_string($conn, $_POST['no_bed']);
$tarif = @mysqli_real_escape_string($conn, $_POST['tarif']);
	$dokter = @mysqli_real_escape_string($conn, $_POST['dokter']);
	$kamar_asal = @mysqli_real_escape_string($conn, $_POST['kamar_asal']);

$no_bed_asal = @mysqli_real_escape_string($conn, $_POST['no_bed_asal']);
$kuota_asal = @mysqli_real_escape_string($conn, $_POST['kuota_asal']);
$ket = @mysqli_real_escape_string($conn, $_POST['ket']);

	$query = "UPDATE tbl_daftarpasienranap SET nama_pas='$nama_pas', nomor_rm='$nomor_rm', jk_pas='$jk_pas', lhr_pas='$tgl_lahir', tpt_lahir='$tpt_lahir', asuransi_pas='$asuransi_pas', no_bpjs='$no_bpjs', keluhan='$diagnosa_awal', kamar='$kamar', no_bed='$no_bed',   tarif ='$tarif', kamar_asal ='$kamar_asal', no_bed_asal ='$no_bed_asal',kuota_asal ='$kuota_asal', dokter='$dokter', ket='$ket' WHERE no_daftar = '$no_daftar'";
	$sql = mysqli_query($conn, $query) or die ($conn->error);
	if($sql) {
		echo "berhasil";
	} else {
		echo "gagal";
	}

$query_stok = "SELECT kuota, kuota_asal FROM tbl_daftarpasienranap WHERE no_daftar = '$no_daftar'";
		$sql_stok = mysqli_query($conn, $query_stok) or die ($conn->error);
		$data_stok = mysqli_fetch_array($sql_stok);
		$stok = $data_stok['kuota']-1;
		$stoku = $data_stok['kuota_asal'];



$query_estok = "UPDATE ruangan SET kuota='$stok' WHERE kamar ='$kamar'  ";
		mysqli_query($conn, $query_estok) or die ($conn->error);

$query_estoku = "UPDATE ruangan SET kuota='$stoku' WHERE kamar ='$kamar_asal'  ";
		mysqli_query($conn, $query_estoku) or die ($conn->error);

/*$query_stoki = "SELECT kuota_asal FROM tbl_daftarpasienranap WHERE no_daftar = '$no_daftar'";
		$sql_stoki = mysqli_query($conn, $query_stoki) or die ($conn->error);
		$data_stoki = mysqli_fetch_array($sql_stoki);
		$stoki = $data_stoki['kuota_asal']+1;

$query_estoki = "UPDATE ruangan SET kuota='$stoki' WHERE kamar ='$kamar'  ";
		mysqli_query($conn, $query_estoki) or die ($conn->error);
*/


?>
