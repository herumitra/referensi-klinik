<?php 
	include '../koneksi.php';

	if(@$_GET['page']=='penjualan') {
		$no_pjl = @mysqli_real_escape_string($conn, $_GET['no_pjl']);
		$query_lihat = "SELECT tbl_dataobat.nm_obat, tbl_penjualandetail.hrg_jual, tbl_penjualandetail.jml_jual, tbl_penjualandetail.sat_jual, tbl_penjualandetail.subtotal FROM tbl_penjualandetail INNER JOIN tbl_dataobat ON tbl_penjualandetail.kd_obat = tbl_dataobat.kd_obat WHERE tbl_penjualandetail.no_penjualan = '$no_pjl'";
		$sql_lihat = mysqli_query($conn, $query_lihat) or die ($conn->error);
		$data = array();

		while($detail=mysqli_fetch_array($sql_lihat)) {
			$data[] = $detail;
		}
		echo json_encode($data);
	} 
	else if(@$_GET['page']=='pembelian') {
		$no_faktur = @mysqli_real_escape_string($conn, $_GET['no_faktur']);
		$query_lihat = "SELECT tbl_dataobat.nm_obat, tbl_pembeliandetail.hrg_beli, tbl_pembeliandetail.jml_beli, tbl_pembeliandetail.sat_beli, tbl_pembeliandetail.subtotal FROM tbl_pembeliandetail INNER JOIN tbl_dataobat ON tbl_pembeliandetail.kd_obat = tbl_dataobat.kd_obat WHERE tbl_pembeliandetail.no_faktur = '$no_faktur'";
		$sql_lihat = mysqli_query($conn, $query_lihat) or die ($conn->error);
		$data = array();

		while($detail=mysqli_fetch_array($sql_lihat)) {
			$data[] = $detail;
		}
		echo json_encode($data);
	}

	else if(@$_GET['page']=='pengajuan') {
		$no_faktur = @mysqli_real_escape_string($conn, $_GET['no_faktur']);
		$query_liha = "SELECT tbl_dataobat.nm_obat, tbl_pengajuandetail_pembelian.hrg_beli, tbl_pengajuandetail_pembelian.jml_beli, tbl_pengajuandetail_pembelian.sat_beli, tbl_pengajuandetail_pembelian.subtotal FROM tbl_pengajuandetail_pembelian INNER JOIN tbl_dataobat ON tbl_pengajuandetail_pembelian.kd_obat = tbl_dataobat.kd_obat WHERE tbl_pengajuandetail_pembelian.no_faktur = '$no_faktur'";
		$sql_liha = mysqli_query($conn, $query_liha) or die ($conn->error);
		$data = array();

		while($detail=mysqli_fetch_array($sql_liha)) {
			$data[] = $detail;
		}
		echo json_encode($data);
	}


	else if(@$_GET['page']=='pintaku') {
		$no_permintaan = @mysqli_real_escape_string($conn, $_GET['no_permintaan']);

		$query_pinta = "SELECT tbl_dataobat.nm_obat, tbl_pengajuandetail.hrg_beli, tbl_pengajuandetail.jml_beli, tbl_pengajuandetail.sat_beli, tbl_pengajuandetail.subtotal FROM tbl_pengajuandetail INNER JOIN tbl_dataobat ON tbl_pengajuandetail.kd_obat = tbl_dataobat.kd_obat WHERE tbl_pengajuandetail.no_permintaan = '$no_permintaan'";
		$sql_pinta = mysqli_query($conn, $query_pinta) or die ($conn->error);
		$data = array();

		while($detail=mysqli_fetch_array($sql_pinta)) {
			$data[] = $detail;
		}
		echo json_encode($data);
	}

/*
		$query_lihat = "SELECT * FROM tbl_nama_racikandetail INNER JOIN  tbl_nama_racikandetail ON tbl_nama_racikan.kd_racik = tbl_nama_racikandetail.kd_racik INNER JOIN  tbl_dataobat ON tbl_nama_racikandetail.kd_obat = tbl_dataobat.kd_obat WHERE tbl_nama_racikan.kd_racik = '$kd_racik' ";*/
/*
            $query_tampil = "SELECT * FROM tbl_nama_racikan INNER JOIN  tbl_nama_racikandetail ON tbl_nama_racikan.kd_racik = tbl_nama_racikandetail.kd_racik INNER JOIN  tbl_dataobat ON tbl_nama_racikandetail.kd_obat = tbl_dataobat.kd_obat WHERE tbl_nama_racikan.status = 'aktif' ORDER BY tbl_nama_racikan.nama_racikan ASC";*/
	else if(@$_GET['page']=='racikan') {
		$kd_racik = @mysqli_real_escape_string($conn, $_GET['kd_racik']);
		$query_lihat = "SELECT tbl_dataobat.nm_obat, tbl_nama_racikandetail.hrg_jual, tbl_nama_racikandetail.jumlah, tbl_nama_racikandetail.sat_jual, tbl_nama_racikandetail.subtotal FROM tbl_nama_racikandetail INNER JOIN tbl_dataobat ON tbl_nama_racikandetail.kd_obat = tbl_dataobat.kd_obat WHERE tbl_nama_racikandetail.kd_racik = '$kd_racik'";

		$sql_lihat = mysqli_query($conn, $query_lihat) or die ($conn->error);
		$data = array();

		while($detail=mysqli_fetch_array($sql_lihat)) {
			$data[] = $detail;
		}
		echo json_encode($data);
	}



	else if(@$_GET['page']=='pelunasan_pembelian') {
		$no_faktur = @mysqli_real_escape_string($conn, $_POST['no_faktur']);
		// $no_faktur = "tesss";
		$tgl_lunas = date('Y-m-d');
		$query_lunas = "UPDATE tbl_pembelian SET status_byr = 'Lunas', tgl_lunas = '$tgl_lunas' WHERE no_faktur = '$no_faktur'";
		mysqli_query($conn, $query_lunas) or die ($conn->error);
	}


	else if(@$_GET['page']=='pelunasan_pengajuan') {
		$no_faktur = @mysqli_real_escape_string($conn, $_POST['no_faktur']);
		// $no_faktur = "tesss";
		$tgl_lunas = date('Y-m-d');
		$query_lunas = "UPDATE tbl_pengajuan_pembelian SET status_byr = 'Disetujui', tgl_lunas = '$tgl_lunas' WHERE no_faktur = '$no_faktur'";
		mysqli_query($conn, $query_lunas) or die ($conn->error);
	}


	else if(@$_GET['page']=='request') {
		$no_permintaan = @mysqli_real_escape_string($conn, $_POST['no_permintaan']);
		// $no_faktur = "tesss";

		$query_luna = "UPDATE tbl_pengajuan SET status = 'Disetujui'  WHERE no_permintaan = '$no_permintaan'";
		mysqli_query($conn, $query_luna) or die ($conn->error);
	}

	else if(@$_GET['page']=='retur') {
		$no_pengobatan = @mysqli_real_escape_string($conn, $_POST['no_pengobatan']);
		// $no_faktur = "tesss";

		$query_luna = "UPDATE tbl_pengobatan SET status_obat = 'Retur'  WHERE no_pengobatan = '$no_pengobatan'";
		mysqli_query($conn, $query_luna) or die ($conn->error);
	}


	else if(@$_GET['page']=='rawat') {
		$no_daftar = @mysqli_real_escape_string($conn, $_POST['no_daftar']);

		$query_daftar = "UPDATE tbl_daftarpasien SET status = 'rawat' WHERE no_daftar = '$no_daftar'";
		mysqli_query($conn, $query_daftar) or die ($conn->error);
	}

	else if(@$_GET['page']=='rawat_igd') {
		$no_daftar = @mysqli_real_escape_string($conn, $_POST['no_daftar']);

		$query_daftar = "UPDATE tbl_daftarpasien_igd SET status = 'rawat' WHERE no_daftar = '$no_daftar'";
		mysqli_query($conn, $query_daftar) or die ($conn->error);
	}


	else if(@$_GET['page']=='rawatranap') {
		$no_daftar = @mysqli_real_escape_string($conn, $_POST['no_daftar']);
		// $no_faktur = "tesss";
		$tgl_daftar = date('Y-m-d');
		$query_daftar = "UPDATE tbl_daftarpasienranap SET status = 'rawat', tgl_daftar = '$tgl_daftar' WHERE no_daftar = '$no_daftar'";
		mysqli_query($conn, $query_daftar) or die ($conn->error);
	}


	else if(@$_GET['page']=='rawatpulang') {
		$no_daftar = @mysqli_real_escape_string($conn, $_POST['no_daftar']);
		// $no_faktur = "tesss";
		$tgl_pulang = date("Y-m-d H:i:s");
		$query_daftar = "UPDATE tbl_daftarpasienranap SET kuota= '0', ket = 'close', tgl_pulang = '$tgl_pulang' WHERE no_daftar = '$no_daftar'";
		mysqli_query($conn, $query_daftar) or die ($conn->error);

		$query_stok = "SELECT kuota, kamar FROM tbl_daftarpasienranap WHERE no_daftar = '$no_daftar'";
		$sql_stok = mysqli_query($conn, $query_stok) or die ($conn->error);
		$data_stok = mysqli_fetch_array($sql_stok);
		$stok = $data_stok['kuota']+1;
		$kamar = $data_stok['kamar'];


$query_estok = "UPDATE ruangan SET kuota='$stok' WHERE kamar ='$kamar'  ";
		mysqli_query($conn, $query_estok) or die ($conn->error);

	}


	else if(@$_GET['page']=='batal_daftar') {
		$no_daftar = @mysqli_real_escape_string($conn, $_POST['no_daftar']);
		// $no_faktur = "tesss";
		$tgl_pulang = date("Y-m-d H:i:s");
		$query_daftar = "UPDATE tbl_daftarpasienranap SET kuota= '0', ket = 'batal', tgl_pulang = '$tgl_pulang' WHERE no_daftar = '$no_daftar'";
		mysqli_query($conn, $query_daftar) or die ($conn->error);

		$query_stok = "SELECT kuota, kamar FROM tbl_daftarpasienranap WHERE no_daftar = '$no_daftar'";
		$sql_stok = mysqli_query($conn, $query_stok) or die ($conn->error);
		$data_stok = mysqli_fetch_array($sql_stok);
		$stok = $data_stok['kuota']+1;
		$kamar = $data_stok['kamar'];


$query_estok = "UPDATE ruangan SET kuota='$stok' WHERE kamar ='$kamar'  ";
		mysqli_query($conn, $query_estok) or die ($conn->error);

	}



	else if(@$_GET['page']=='racik') {
		$kd_racik = @mysqli_real_escape_string($conn, $_POST['kd_racik']);
		// $no_faktur = "tesss";
$tgl_daftar = date('Y-m-d');
		$query_racik = "UPDATE tbl_nama_racikan SET status = 'nonaktif' WHERE kd_racik = '$kd_racik'";
		mysqli_query($conn, $query_racik) or die ($conn->error);
	}

	else if(@$_GET['page']=='hematologi') {
		$kd_hematologi = @mysqli_real_escape_string($conn, $_POST['kd_hematologi']);
		// $no_faktur = "tesss";
$tgl_daftar = date('Y-m-d');
		$query_hematologi = "UPDATE tbl_nama_hematologi SET status = 'nonaktif' WHERE kd_hematologi = '$kd_hematologi'";
		mysqli_query($conn, $query_hematologi) or die ($conn->error);
	}


	else if(@$_GET['page']=='expstok_obat') {
		$kd_obat = @mysqli_real_escape_string($conn, $_GET['kd_obat']);
		$query_expstok = "SELECT * FROM tbl_stokexpobat WHERE kd_obat = '$kd_obat'";
		$sql_expstok = mysqli_query($conn, $query_expstok) or die ($conn->error);
		$data_expstok = array();

		while($data = mysqli_fetch_array($sql_expstok)) {
			$data_expstok[] = $data;
		}

		echo json_encode($data_expstok);
	}
 ?>