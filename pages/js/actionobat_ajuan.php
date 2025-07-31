<?php  
include 'koneksi.php';

$input = filter_input_array(INPUT_POST);

$jml_beli = mysqli_real_escape_string($conn, $input["jml_beli"]);
$hrg_beli = mysqli_real_escape_string($conn, $input["hrg_beli"]);
$subtotal = mysqli_real_escape_string($conn, $input["subtotal"]);

$no_idx = mysqli_real_escape_string($conn, $input["no_idx"]);

if($input["action"] === 'edit'){
	$query = "UPDATE tbl_pengajuandetail SET jml_beli=?, hrg_beli=?, subtotal=?  WHERE no_idx=?";
	$dewan1 = $conn->prepare($query);
	$dewan1->bind_param('iiii', $jml_beli, $hrg_beli, $subtotal,   $no_idx);
	$dewan1->execute();
}

if($input["action"] === 'delete'){
	$query = "DELETE FROM tbl_pengajuandetail WHERE no_idx=?";
	$dewan1 = $conn->prepare($query);
	$dewan1->bind_param('i', $no_idx);
	$dewan1->execute();
}

echo json_encode($input);
?>