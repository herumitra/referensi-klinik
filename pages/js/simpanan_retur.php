<?php 
error_reporting(0);
	include "koneksi.php";
    $no_pengobatan = @$_GET['id'];
    $kd_obat = @$_GET['kd_obat'];
/* $no = @$_POST['no_pengobatan'];*/
		$id_pegawai =  $_SESSION['id_peg'];

$query =mysqli_query($conn,"INSERT INTO 
    tbl_pengobatan_retur (no, no_pengobatan, kd_obat, hrg_jual, jml_jual, sat_jual, subtotal, akai, jml_retur, no_depo, expired, id_peg, status) 
SELECT
no, no_pengobatan, kd_obat, hrg_jual, jml_jual, sat_jual, subtotal, akai, jml_retur, no_depo, expired,  '$id_pegawai', 'Approval'


FROM
    tbl_pengobatandetail WHERE no_pengobatan='$no_pengobatan'");


$query_pjlobat = "SELECT * FROM tbl_pengobatan_retur 

INNER JOIN tbl_farmasi ON tbl_pengobatan_retur.no_depo = tbl_farmasi.no_depo 

WHERE no_pengobatan='$no_pengobatan'
";

          
              $query2 = mysqli_query($conn, $query_pjlobat) or die ($conn->error);

while($dataku = mysqli_fetch_array($query2)){;
$jml_obat =$dataku['jml_jual'];
$hrg_beli =$dataku['hrg_jual'];
$nama_pet =$dataku['nama_pet'];

$Codec =$dataku['kd_obat'];

		$query_stok =mysqli_query($conn, "SELECT stk_obat, hrgbeli_obat FROM tbl_dataobat WHERE kd_obat = '$Codec'");

		$data_stok = mysqli_fetch_array($query_stok);
		$stok_lama = $data_stok['stk_obat'];
		$stok_baru = $stok_lama + $jml_obat;
		$harga = $data_stok['hrgbeli_obat'];
/*		if($stok_lama >= 0) {
			$harga = (($stok_lama*$harga)+($jml_obat*$hrg_beli))/($stok_lama+$jml_obat);
		}
		$harga_jual = $harga*1.20;*/

/*$query3 = mysqli_query($conn, "UPDATE tbl_dataobat SET stk_obat=stk_obat-".$dataku['jml_beli']."  WHERE  kd_obat='$Codec'");*/

$query8 = mysqli_query($conn, "UPDATE ".$nama_pet." SET stk_obat=stk_obat+".$dataku['jml_retur']."  WHERE  kd_obat='$Codec'");

	if($query) {


echo '<script language="javascript" type="text/javascript">
alert("data berhasil di Approval!"); window.history.back(-3);</script>';




	} else {
/*$query4 = mysqli_query($conn, "UPDATE tbl_dataobat SET stk_obat=stk_obat+".$dataku['jml_beli']." WHERE  kd_obat='".$dataku['kd_obat']."'");*/

$query7 = mysqli_query($conn, "UPDATE ".$nama_pet." SET stk_obat=stk_obat-".$dataku['jml_retur']." WHERE  kd_obat='".$dataku['kd_obat']."'");


 echo "<script>alert('Sudah di Approval');
  window.history.back();
 </script>";

}
	}

/*

		$query_stok = "SELECT stk_obat, hrgbeli_obat FROM tbl_dataobat WHERE kd_obat = '$kd_obat'";
		$sql_stok = mysqli_query($conn, $query_stok) or die ($conn->error);
		$data_stok = mysqli_fetch_array($sql_stok);
		$stok_lama = $data_stok['stk_obat'];
		$stok_baru = $stok_lama + $jml_obat;
		$harga = $data_stok['hrgbeli_obat'];
		if($stok_lama >= 0) {
			$harga = (($stok_lama*$harga)+($jml_obat*$hrg_beli))/($stok_lama+$jml_obat);
		}
		$harga_jual = $harga*1.20;
		$query_estok = "UPDATE tbl_dataobat SET stk_obat='$stok_baru', hrgbeli_obat = '$harga', hrg_obat = '$harga_jual' WHERE kd_obat='$kd_obat'";
		mysqli_query($conn, $query_estok) or die ($conn->error);

		$query_exp = "SELECT stok FROM tbl_stokexpobat WHERE kd_obat = '$kd_obat' AND tgl_exp = '$exp_obat'";
		$sql_exp = mysqli_query($conn, $query_exp) or die ($conn->error);
		$rows_exp = mysqli_num_rows($sql_exp);
		if($rows_exp > 0) {
			$data_exp = mysqli_fetch_array($sql_exp);
			$stok_lamaexp = $data_exp['stok'];
			$stok_baruexp = $stok_lamaexp + $jml_obat;
			$query_updstokexp = "UPDATE tbl_stokexpobat SET stok='$stok_baruexp' WHERE kd_obat='$kd_obat' AND tgl_exp = '$exp_obat'";
			mysqli_query($conn, $query_updstokexp) or die ($conn->error);
		} else {
			$query_stokexp = "INSERT INTO tbl_stokexpobat (kd_obat, tgl_exp, stok) VALUES ('$kd_obat', '$exp_obat', '$jml_obat')";
			mysqli_query($conn, $query_stokexp) or die ($conn->error);
		}
	*/



 ?>

