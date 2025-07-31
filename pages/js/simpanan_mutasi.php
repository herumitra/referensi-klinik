<?php 
	include "koneksi.php";
/*    $kd_obat = @$_GET['id'];*/
    $status = @$_GET['id'];
		$id_pegawai =  $_SESSION['id_peg'];
$tanggal = date("Y-m-d");
$no = 1;
$no++;
$query ="INSERT INTO 
    tbl_mutasi_obat (kd_obat, nm_obat, exp_obat, ktg_obat, bnt_obat, sat_obat, hrg_obat, hrgbeli_obat, stk_obat, minstk_obat, tgl_mutasi) 
SELECT
kd_obat, nm_obat, exp_obat, ktg_obat, bnt_obat, sat_obat, hrg_obat, hrgbeli_obat, stk_obat, minstk_obat, '$tanggal'
FROM
    tbl_dataobat WHERE status='$status'";

/*    $query = "INSERT INTO tbl_racikan_pesan SELECT * FROM tbl_nama_racikandetail  WHERE kd_racik='$kd_racik'";*/
	$sql = mysqli_query($conn, $query) or die ($conn->error);
	if($sql) {
		echo '<script language="javascript">window.history.back();</script>';
	} else {
		$query4 = mysqli_query($conn, "SELECT * FROM tbl_dataobat where tgl_mutasi ='$tangga' ");
	}


 ?>

