<?php 
	session_start();
	include "../koneksi.php";
$nama_pas = @mysqli_real_escape_string($conn, $_POST['nama_pas']);
	$asuransi_pas = @mysqli_real_escape_string($conn, $_POST['asuransi_pas']);
	$no_hp = @mysqli_real_escape_string($conn, $_POST['no_hp']);
	$nomor_rm = @mysqli_real_escape_string($conn, $_POST['nomor_rm']);
	$nik = @mysqli_real_escape_string($conn, $_POST['nik']);
	$alm_pas = @mysqli_real_escape_string($conn, $_POST['alm_pas']);
	$nik = @mysqli_real_escape_string($conn, $_POST['nik']);
	$jk = @mysqli_real_escape_string($conn, $_POST['jk']);
	$tgl_lahir = @mysqli_real_escape_string($conn, $_POST['tgl_lahir']);
	$tpt_lahir = @mysqli_real_escape_string($conn, $_POST['tpt_lahir']);

		$no_bpjs = @mysqli_real_escape_string($conn, $_POST['no_bpjs']);

	$desa = @mysqli_real_escape_string($conn, $_POST['desa']);
	$kec = @mysqli_real_escape_string($conn, $_POST['kec']);
	$kab_kota = @mysqli_real_escape_string($conn, $_POST['kab_kota']);
	$provinsi = @mysqli_real_escape_string($conn, $_POST['provinsi']);
	$no_daftar = @mysqli_real_escape_string($conn, $_POST['no_daftar']);
	$tgl_daftar = @mysqli_real_escape_string($conn, $_POST['tgl_daftar']);
	$id_pas = @mysqli_real_escape_string($conn, $_POST['id_pas']);
	$nomor_antri = @mysqli_real_escape_string($conn, $_POST['nomor_antri']);
	$status = @mysqli_real_escape_string($conn, $_POST['status']);
	$tinggi_badan = @mysqli_real_escape_string($conn, $_POST['tinggi_badan']);
	$berat_badan = @mysqli_real_escape_string($conn, $_POST['berat_badan']);
	$temp = @mysqli_real_escape_string($conn, $_POST['temp']);
	$keluhan = @mysqli_real_escape_string($conn, $_POST['keluhan']);
	$diagnosa = @mysqli_real_escape_string($conn, $_POST['diagnosa']);
$dokter = @mysqli_real_escape_string($conn, $_POST['dokter']);
$cara_masuk = @mysqli_real_escape_string($conn, $_POST['cara_masuk']);

$pekerjaan = @mysqli_real_escape_string($conn, $_POST['pekerjaan']);
$tekanan_darah = @mysqli_real_escape_string($conn, $_POST['tekanan_darah']);
$goldarah = @mysqli_real_escape_string($conn, $_POST['goldarah']);
$istirahat = @mysqli_real_escape_string($conn, $_POST['istirahat']);
				$tgl_istirahat = @mysqli_real_escape_string($conn, $_POST['tgl_istirahat']);

	$nama_pj = @mysqli_real_escape_string($conn, $_POST['nama_pj']);
	$hubungan_pj = @mysqli_real_escape_string($conn, $_POST['hubungan_pj']);
	$kontak_pj = @mysqli_real_escape_string($conn, $_POST['kontak_pj']);
$kunjungan = @mysqli_real_escape_string($conn, $_POST['kunjungan']);	
$agama = @mysqli_real_escape_string($conn, $_POST['agama']);	

		$proses = @mysqli_real_escape_string($conn, $_POST['proses']);
$jam_daftar = date("H:i:s");

$id_pegawai =  $_SESSION['id_peg'];
	$query = "INSERT INTO tbl_daftarpasien_igd VALUES('$no_daftar', '$tgl_daftar', '$nama_pas', '$nik', '$jk','$tpt_lahir','$tgl_lahir', '$agama','$pekerjaan','$asuransi_pas', '$no_bpjs', '$no_hp', '$alm_pas','$nomor_rm','$keluhan','$dokter','$diagnosa','$nama_pj','$kontak_pj','$hubungan_pj','$kunjungan','$goldarah','$nomor_antri','$status','$cara_masuk','$desa','$kec','$kab_kota','$provinsi', '$proses','$id_pas','$id_pegawai','$istirahat','$tgl_istirahat','$jam_daftar')";
	$sql = mysqli_query($conn, $query) or die ($conn->error);
	if($sql) {
		echo "berhasil";
	} else {
		echo "gagal";
	}

/*		$query_stok = "SELECT * FROM tbl_antrian WHERE no_antrian = '$nomor_antri'";
		$sql_stok = mysqli_query($conn, $query_stok) or die ($conn->error);
		$data = mysqli_fetch_array($sql_stok);
		$proses = $data['proses'];
		$nomor = $data['no_antrian'];*/



 ?>