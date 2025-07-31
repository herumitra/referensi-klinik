    <?php
equire('../fpdf17/fpdf.php');
include "../config/fungsi_indotgl.php";
date_default_timezone_set('Asia/Jakarta');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);



include("koneksi.php");
$no_daftar =$_GET['no_daftar'];

$thn = date("Y");

$result = mysqli_query($conn,"Select * from tbl_daftarpasienranap where no_daftar='$no_daftar'");

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
    	array_push($data, $row);
    }
     
    #setting judul laporan dan header tabel
    $judul = "LAPORAN DATA MAHASISWA";
    $header = array(
    		array("label"=>"NAMA", "length"=>30, "align"=>"L"),
    		array("label"=>"NOMOR", "length"=>50, "align"=>"L"),
    		array("label"=>"NIK", "length"=>80, "align"=>"L"),
    		array("label"=>"ASURANSI", "length"=>30, "align"=>"L")
    	);
     
    #sertakan library FPDF dan bentuk objek
     
    #tampilkan judul laporan
    $pdf->SetFont('Arial','B','16');
    $pdf->Cell(0,20, $judul, '0', 1, 'C');
     
    #buat header tabel
    $pdf->SetFont('Arial','','10');
    $pdf->SetFillColor(255,0,0);
    $pdf->SetTextColor(255);
    $pdf->SetDrawColor(128,0,0);
    foreach ($header as $kolom) {
    	$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
    }
    $pdf->Ln();
     
    #tampilkan data tabelnya
    $pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');

    	$pdf->Ln();
    
     
    #output file PDF
    $pdf->Output();
    ?>