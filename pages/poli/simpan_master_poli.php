<?php 

    include('koneksi.php');
    
    $id_poli       = $_POST['id_poli'];
    $nama_poli       = $_POST['nama_poli'];
    $tgl_input         = $_POST['tgl_input'];
        
    $insert = mysqli_query($conn, "insert into tbl_poliklinik set id_poli='$id_poli',nama_poli='$nama_poli', tgl_input='$tgl_input'");
    
?>
    