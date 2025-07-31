<?php 
  session_start();
  include "koneksi.php";



  $id = @mysqli_real_escape_string($conn, $_GET['id']);
  $nama = @mysqli_real_escape_string($conn, $_GET['nama']);
  $kesan = @mysqli_real_escape_string($conn, $_GET['kesan']);
    $expired = @mysqli_real_escape_string($conn, $_GET['expired']);

  $query = "UPDATE tbl_hematologidetail SET  kesan='$kesan', expired='$expired' WHERE no = '$id'";
  $sql = mysqli_query($conn, $query) or die ($conn->error);
  if($sql) {
    echo "berhasil";
  } else {
    echo "gagal";
  }
?>