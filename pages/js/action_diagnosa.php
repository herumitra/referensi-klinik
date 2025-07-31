<?php  
include 'koneksi.php';

$input = filter_input_array(INPUT_POST);

$subjective = mysqli_real_escape_string($conn, $input["subjective"]);
$objective = mysqli_real_escape_string($conn, $input["objective"]);
$assesment = mysqli_real_escape_string($conn, $input["assesment"]);
$plan = mysqli_real_escape_string($conn, $input["plan"]);
$no_diagnosa = mysqli_real_escape_string($conn, $input["no_diagnosa"]);
$diagnosa = mysqli_real_escape_string($conn, $input["diagnosa"]);
$deskripsi = mysqli_real_escape_string($conn, $input["deskripsi"]);

if($input["action"] === 'edit'){
	$query = "UPDATE tbl_diagnosa SET diagnosa=?, deskripsi=? WHERE no_diagnosa=?";
	$dewan1 = $conn->prepare($query);
	$dewan1->bind_param('sss', $diagnosa, $deskripsi,   $no_diagnosa);
	$dewan1->execute();
}

if($input["action"] === 'delete'){
	$query = "DELETE FROM tbl_diagnosa WHERE no_diagnosa=?";
	$dewan1 = $conn->prepare($query);
	$dewan1->bind_param('s', $no_diagnosa);
	$dewan1->execute();
}

echo json_encode($input);
?>