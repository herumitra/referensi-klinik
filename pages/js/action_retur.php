<?php  
include 'koneksi.php';

$input = filter_input_array(INPUT_POST);

$jml_jual = mysqli_real_escape_string($conn, $input["jml_jual"]);
$hrg_jual = mysqli_real_escape_string($conn, $input["hrg_jual"]);
$jml_retur = mysqli_real_escape_string($conn, $input["jml_retur"]);

$no = mysqli_real_escape_string($conn, $input["no"]);

if($input["action"] === 'edit'){
	$query = "UPDATE tbl_pengobatandetail SET jml_jual=?, hrg_jual=?, jml_retur=?  WHERE no=?";
	$dewan1 = $conn->prepare($query);
	$dewan1->bind_param('iiii', $jml_jual, $hrg_jual, $jml_retur,   $no);
	$dewan1->execute();
}

if($input["action"] === 'delete'){
	$query = "DELETE FROM tbl_pengobatandetail WHERE no=?";
	$dewan1 = $conn->prepare($query);
	$dewan1->bind_param('i', $no_idx);
	$dewan1->execute();
}

echo json_encode($input);
?>