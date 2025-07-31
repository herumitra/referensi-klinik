<?php
error_reporting(0);// taruh disini ya  bagian atas sekali


session_start();
ob_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../config/database.php";
// panggil fungsi untuk format tanggal
include "../config/fungsi_tanggal.php";
// panggil fungsi untuk format rupiah
include "../config/fungsi_rupiah.php";


$hari_ini = date("d-m-Y");
  

    $no_daftar = @$_GET['no_daftar'];

 $query_dapat = mysqli_query($mysqli,"SELECT * from tbl_daftarpasien   WHERE no_daftar ='$no_daftar' ");

    while ($datuk = mysqli_fetch_assoc($query_dapat)) {

    $nama = $datuk['nama_pas'];
    $dokter = $datuk['dokter'];
    $poli = $datuk['proses'];
} 



   $query_daft = mysqli_query($mysqli,"SELECT tbl_pengobatandetail.*, tbl_pengobatandetail.kd_obat, tbl_pengobatan.no_daftar, tbl_dataobat.kd_obat, tbl_dataobat.nm_obat, tbl_dataobat.hrg_obat FROM tbl_pengobatandetail
                  LEFT JOIN tbl_pengobatan ON tbl_pengobatandetail.no_pengobatan=tbl_pengobatan.no_pengobatan
                  LEFT JOIN tbl_dataobat ON tbl_pengobatandetail.kd_obat=tbl_dataobat.kd_obat

                WHERE no_daftar ='$no_daftar'  ");
    while ($row = mysqli_fetch_array($query_daft)) {

    $noresep = $row['no_pengobatan'];
    $nm_obat =$row['nm_obat'];
        $akai =$row['akai'];
                $jml =$row['jml_jual'];
                $satuan =$row['sat_jual'];

/*$resdata=mysqli_query($conn,"SELECT * FROM d_resep where noresep = '$noresep' ");
$data = mysqli_fetch_assoc($resdata);
$dokter = $data[dokter];
$norek = $data[id_pasien];
$noreg = $data[noreg];
$depo= $data[depo];*/






    $disp = $disp . '
    <div style="width:100%; border: 0px solid black; float:left; display: inline-block; margin-left:1% ; background:; ">
    <table  id="tabeletiket" width="100%" style="font-size:8px;">
    <tr>
    <td colspan="2" align="center" style="font-weight:bold;">Pemerintah Provinsi Sumatera Utara<br>RUMAH SAKIT UMUM HAJI MEDAN<br>Bagian Farmasi<br>Jl. R.S. Haji Medan</td>
    </tr>
    <tr>
    <td colspan="2"><hr></td>
    </tr>
    <tr>
    <td style="font-weight:bold;">No. Resep</td>
    <td style="font-weight:bold;">: '.$noresep.'</td>
    </tr>
    <tr>
    <td style="font-weight:bold;">Dokter</td>
    <td style="font-weight:bold;">: '.$dokter.'</td>
    </tr>
    <tr>
    <td style="font-weight:bold;">Tanggal</td>
    <td style="font-weight:bold;">: '.$hari_ini.'</td>
    </tr>
    <tr>
    <td style="font-weight:bold;">Nama</td>
    <td style="font-weight:bold;">: '.ucwords(strtolower($nama[1])).' ('.$nama[2].')</td>
    </tr>
    <tr>
    <td style="font-weight:bold;">Poliklinik/Ruangan</td>
    <td style="font-weight:bold;">: '.$poli.'</td>
    </tr>
    <tr>
    <td style="font-weight:bold;">Nama Obat</td>
    <td style="font-weight:bold;">: '.$nm_obat.'</td>
    </tr>
    <tr>
    <td style="font-weight:bold;">Jumlah</td>
    <td style="font-weight:bold;">: '.$jml.' '.$satuan.'</td>
    </tr>
    <tr>
    <td colspan="2" style="text-align:center; font-weight:bold;">Aturan Pakai</td>
    </tr>
    <tr>
    <td colspan="2"  style="text-align:center; font-weight:bold;">'.$akai.'</td>
    </tr>
    </table>
    </div>
    ';
  }

  







?>


<?php
$filename="Etiket.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif " >'.($content).'</page>';
// panggil library html2pdf

require_once('../asset/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>