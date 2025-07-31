<?php 

    include('koneksi.php');
    
$id_ruangan= $_POST['id_ruangan'];
$kamar     = $_POST['kamar'];
$tarif     = $_POST['tarif'];
$kelas     = $_POST['kelas'];
$no_bed     = $_POST['no_bed'];
$kuota     = $_POST['kuota'];
        
    $insert = mysqli_query($conn, "insert into ruangan set id_ruangan='$id_ruangan', kamar='$kamar', no_bed='$no_bed', tarif='$tarif', kelas='$kelas', kuota='$kuota'");
    
?>
    