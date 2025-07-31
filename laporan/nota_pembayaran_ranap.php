<?php 
        include 'koneksi.php';
$no_daftar =$_GET['no_daftar'];
    error_reporting(0);// taruh disini ya  bagian atas sekali


session_start();
ob_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../config/database.php";
// panggil fungsi untuk format tanggal
include "../config/fungsi_indotgl.php";
// panggil fungsi untuk format rupiah

?>
<link type="text/css" href="./isi/style_css/covid.css" rel="stylesheet">

<page backtop="15px">
    <page_header class="page_header">
        (Lampiran Tagihan)
    </page_header>
    <page_footer>
    </page_footer>
    <div class="page-content">
        <div class="data-apotek">
<img src='../images/zt.png' width='640'> 

        </div>
        <div class="judul-surat">
            <span class="judul" ><u>RINCIAN BIAYA RAWAT INAP </u></span>

        </div>

        <div class="data-transaksi" style="line-height: 1.0; margin-bottom: 4px;">

            <?php 
$tgl_sekarang = date('Y-m-d');

    $query = "Select * from tbl_daftarpasienranap  where no_daftar='$no_daftar'";
                $sql = mysqli_query($conn, $query) or die ($conn->error);
                $data = mysqli_fetch_array($sql);

             ?>
            <table class="data-nota">
                <tr>
                    <td>Nama </td>
                    <td>: <?php echo $data['nama_pas']; ?></td>
                     <td width="20px">&nbsp;&nbsp;&nbsp; </td>
                    <td width="20px">&nbsp;&nbsp;&nbsp;</td>
                    <td width='50%'>Nomor MR </td>
                    <td>: <?php echo $data['nomor_rm']; ?></td>
                </tr>
                <tr>
                    <td>Tempat/ Tgl Lahir</td>
                    <td>: <?php echo $data['tpt_lahir']; ?>/<?php echo tgl_indo($data['lhr_pas']); ?></td>

                    <td width="20px"> </td>
                    <td width="20px"></td>
                    <td width='50%'>Tgl Masuk</td>
                    <td>: <?php echo tgl_indo($data['tgl_daftar']); ?></td>

                </tr>
                <tr>
                    <td>Jenis Kelamin </td>
                    <td>: <?php echo $data['jk_pas']; ?></td>

                    <td width="20px" > </td>
                    <td width="20px"></td>
                    <td width='50%'>Tgl Keluar</td>
                    <td>: <?php echo tgl_indo($data['tgl_pulang']); ?></td>

                </tr>

                <tr>
                    <td>Alamat </td>
                    <td>: <?php echo $data['alm_pas']; ?></td>
<td width="20px" > </td>
                    <td width="20px"></td>
                    <td width='50%'>Status Pasien</td>
                    <td>: <?php echo $data['asuransi_pas']; ?></td>


                </tr>
                <tr>
                    <td>No NIK </td>
                    <td>: <?php echo $data['nik']; ?></td>

                    <td width="20px" > </td>
                    <td width="20px"></td>
                    <td width='50%'>Diagnosa</td>

  <?php 

    $query_ku = "Select * from tbl_diagnosa  where no_daftar='$no_daftar'";
                $sql_ku = mysqli_query($conn, $query_ku) or die ($conn->error);
                $data_ku = mysqli_fetch_array($sql_ku);

             ?>

                    <td>: <?php echo $data_ku['diagnosa']; ?></td>
                </tr>
             </table>

<div>
</div>



        <table class="data-item data-item-pembelian" border="1">
            <tr>
               <th class="col_no">No</th>
                    <th align="left" class="col_pan">No Registrasi</th>
                    <th class="col_jml">Volume</th>
                    <th class="col_jml">Harga</th>
                  <th class="col_jml">Subtotal </th>
                </tr>
    <?php 
$hariBay = 0; 
                $tgl_sekarang = date('Y-m-d');
                $nomor = 1;
                    $query_hari = "SELECT * FROM tbl_daftarpasienranap 


/*INNER JOIN ruangan ON tbl_daftarpasienranap.kamar = ruangan.id_kamar
      INNER JOIN bed ON tbl_daftarpasienranap.no_bed = bed.id_bed
*/
      where ket = 'close' AND no_daftar='$no_daftar'";

                $sql_hari = mysqli_query($conn, $query_hari) or die ($conn->error);


             ?>
            <tbody>
            <?php  
                while($data_rawat = mysqli_fetch_array($sql_hari)) {
$tarif=$data_rawat['tarif'];
$tareg    =new DateTime($data_rawat['tgl_daftar']);
                        $today        =new DateTime();
                        $diff = $today->diff($tareg);

$total_hari = $data_rawat['tarif']*($diff->d+1);
            ?>
                <tr>
                   <td><?php echo $nomor++; ?></td>
                    <td align="left"><?php echo $data_rawat['no_daftar']; ?></td>
                         <td><?php 
$tareg    =new DateTime($data_rawat['tgl_daftar']);
                        $today        =new DateTime();
                        $diff = $today->diff($tareg);
                        echo $diff->d+1; echo " Hari";?> </td>

                    <td><?php echo $tarif; ?></td>
                    <td align="right"><?php echo number_format ($total_hari); ?></td>
                </tr>
            <?php } ?>
            </tbody>
<!-- 
            <tr>
    <td colspan="4" align="right"><strong>Total Tindakan (Rp) : </strong></td>
    <td colspan="1" align="right" bgcolor="#F5F5F5"><?php echo $tot_bayar; ?></td>
  </tr> -->
        </table>


        <table class="data-item data-item-pembelian" border="1">
            <tr>
                    <th class="col_no"></th>
                    <th align="left" class="col_pan">Nama Obat</th>
                    <th class="col_jml"> </th>
                    <th class="col_jml"> </th>
                  <th class="col_jml">  </th>

</tr>
    <?php 
$totalBayar = 0; 
                $tgl_sekarang = date('Y-m-d');
                $nomor = 1;
                $query_pjlobat = "SELECT tbl_pengobatandetail.*, tbl_pengobatandetail.kd_obat, tbl_pengobatan.no_daftar, tbl_dataobat.kd_obat, tbl_dataobat.nm_obat, tbl_dataobat.hrg_obat FROM tbl_pengobatandetail
                  LEFT JOIN tbl_pengobatan ON tbl_pengobatandetail.no_pengobatan=tbl_pengobatan.no_pengobatan
                  LEFT JOIN tbl_dataobat ON tbl_pengobatandetail.kd_obat=tbl_dataobat.kd_obat

                WHERE no_daftar ='$no_daftar' ";
                $sql_pjlobat = mysqli_query($conn, $query_pjlobat) or die ($conn->error);
             ?>
            <tbody>
            <?php  
                while($data_pjlobat = mysqli_fetch_array($sql_pjlobat)) {

                        $subtotal   = $data_pjlobat['jml_jual']* $data_pjlobat['hrg_jual'];
    $totalBayar = $totalBayar + $subtotal;
            ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td align="left"><?php echo $data_pjlobat['nm_obat']; ?></td>
                    <td><?php echo $data_pjlobat['jml_jual']; ?></td>
                    <td><?php echo $data_pjlobat['hrg_jual']; ?></td>
                    <td align="right"><?php echo number_format ($subtotal); ?></td>
                </tr>
            <?php } ?>
            </tbody>
<!--   <tr>
    <td colspan="4" align="right"><strong>Total Obat (Rp) : </strong></td>
    <td colspan="1" align="right" bgcolor="#F5F5F5"><?php echo $totalBayar; ?></td>
  </tr> -->

        </table>


        <table class="data-item data-item-pembelian" border="1">
            <tr>
               <th class="col_no"></th>
                    <th align="left" class="col_pan">Tindakan</th>
                    <th class="col_jml"> </th>
                    <th class="col_jml"> </th>
                  <th class="col_jml">  </th>
                </tr>
    <?php 
$total = 0;
     $tot_bayar = 0;
                $tgl_sekarang = date('Y-m-d');
                $nomor = 1;
                $query_pjltindakan = "SELECT tbl_tindakandetail.*, tbl_tindakandetail.kd_tindakan,tbl_tindakandetail.kd_tindakan, tbl_tindakan.no_daftar,tbl_tindakan.nm_dokter, data_tindakan.kd_tindakan, data_tindakan.nama_tindakan FROM tbl_tindakandetail
                  LEFT JOIN tbl_tindakan ON tbl_tindakandetail.no_tindakan=tbl_tindakan.no_tindakan
                  LEFT JOIN data_tindakan ON tbl_tindakandetail.kd_tindakan=data_tindakan.kd_tindakan

                WHERE no_daftar ='$no_daftar' ";
                $sql_pjltindakan = mysqli_query($conn, $query_pjltindakan) or die ($conn->error);

             ?>
            <tbody>
            <?php  
                while($data_pjltindakan = mysqli_fetch_array($sql_pjltindakan)) {
            
   
$total = $data_pjltindakan['hrg_tindakan'];
      // total bayar adalah penjumlahan dari keseluruhan total
      $tot_bayar += $total;
$jum = 1;
            ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td align="left"><?php echo $data_pjltindakan['nama_tindakan']; ?></td>
                    <td><?php echo $jum; ?></td>
                    <td><?php echo $data_pjltindakan['hrg_tindakan']; ?></td>
                    <td align="right"><?php echo number_format ($data_pjltindakan['hrg_tindakan']); ?></td>
                </tr>
            <?php } ?>
            </tbody>

<!--             <tr>
    <td colspan="4" align="right"><strong>Total Tindakan (Rp) : </strong></td>
    <td colspan="1" align="right" bgcolor="#F5F5F5"><?php echo $tot_bayar; ?></td>
  </tr> -->
        </table>



        <table class="data-item data-item-pembelian" border="1">
            <tr>
<th class="col_no"></th>
                    <th class="col_pan" align="left">Laboratorium</th>
                    <th class="col_jml"> </th>
                    <th class="col_jml"> </th>
                  <th class="col_jml">  </th>
            </tr>
    <?php 

$total_lab = 0;
     $tot_bayar_lab = 0;
                $tgl_sekarang = date('Y-m-d');
                $nomor = 1;
               $query_labor = "SELECT tbl_hematologidetail.*, tbl_hematologidetail.kd_hematologi,tbl_hematologidetail.no_lab, tbl_hematologi.no_daftar,tbl_hematologi.nm_dokter, tbl_nama_hematologi.kd_hematologi, tbl_nama_hematologi.nama_hematologi FROM tbl_hematologidetail
                  LEFT JOIN tbl_hematologi ON tbl_hematologidetail.no_lab=tbl_hematologi.no_lab
                  LEFT JOIN tbl_nama_hematologi ON tbl_hematologidetail.kd_hematologi=tbl_nama_hematologi.kd_hematologi

                WHERE no_daftar ='$no_daftar' ";
                $sql_labor = mysqli_query($conn, $query_labor) or die ($conn->error);

             ?>
            <tbody>
            <?php  
                while($datalab = mysqli_fetch_array($sql_labor)) {
            
   
$total_lab = $datalab['hrg_labor'];
      // total bayar adalah penjumlahan dari keseluruhan total
      $tot_bayar_lab += $total_lab;

            ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td align="left"><?php echo $datalab['nama_hematologi']; ?></td>
                    <td><?php echo $jum; ?></td>
                    <td><?php echo $datalab['hrg_labor']; ?></td>
                    <td align="right"><?php echo number_format ($datalab['hrg_labor']); ?></td>
                </tr>
            <?php } ?>
            </tbody>

<!--             <tr>
    <td colspan="4" align="right"><strong>Total Labor (Rp) : </strong></td>
    <td colspan="1" align="right" bgcolor="#F5F5F5"><?php echo $tot_bayar_lab; ?></td>
  </tr> -->
        </table>

        <table class="data-item data-item-pembelian" border="1">
            <tr>
<th class="col_no"></th>
                    <th align="left" class="col_pan"> Radiologi</th>
                    <th class="col_jml"> </th>
                    <th class="col_jml"> </th>
                  <th class="col_jml">  </th>


            </tr>
    <?php 

$total_rad = 0;
     $tot_bayar_rad = 0;
                $tgl_sekarang = date('Y-m-d');
                $nomor = 1;
                $query_radiologi = "SELECT tbl_radiologidetail.*, tbl_radiologidetail.kd_radiologi,tbl_radiologidetail.kd_radiologi, tbl_radiologi.no_daftar,tbl_radiologi.nm_dokter, data_radiologi.kd_radiologi, data_radiologi.nama_radiologi FROM tbl_radiologidetail
                  LEFT JOIN tbl_radiologi ON tbl_radiologidetail.no_radiologi=tbl_radiologi.no_radiologi
                  LEFT JOIN data_radiologi ON tbl_radiologidetail.kd_radiologi=data_radiologi.kd_radiologi

                WHERE no_daftar ='$no_daftar' ";
                $sql_radiologi = mysqli_query($conn, $query_radiologi) or die ($conn->error);

             ?>
            <tbody>
            <?php  
                while($datarad = mysqli_fetch_array($sql_radiologi)) {
            
   
$total_rad = $datarad['hrg_radiologi'];
      // total bayar adalah penjumlahan dari keseluruhan total
      $tot_bayar_rad += $total_rad;

            ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td align="left"><?php echo $datarad['nama_radiologi']; ?></td>
                    <td><?php echo $jum; ?></td>
                    <td><?php echo $datarad['hrg_radiologi']; ?></td>
                    <td align="right"><?php echo number_format ($datarad['hrg_radiologi']); ?></td>
                </tr>
            <?php } ?>
            </tbody>

<!--             <tr>
    <td colspan="4" align="right"><strong>Total Radiologi (Rp) : </strong></td>
    <td colspan="1" align="right" bgcolor="#F5F5F5"><?php echo $tot_bayar_rad; ?></td>
  </tr>
 -->



<tr>

    <td colspan="4" align="right"><strong>Total Billing (Rp) : </strong></td>
    <td colspan="8" align="right" bgcolor="#F5F5F5" ><strong><?php echo number_format ($tot_bayar+$totel_bayar+$totalBayar+$total_hari+$tot_bayar_lab+$tot_bayar_rad); ?></strong></td>
</tr>

  <?php


       $query_trans = mysqli_query($mysqli,"SELECT * from tbl_transaksi_ranap
                WHERE no_daftar ='$no_daftar' ");

$coun  = mysqli_num_rows($query_trans);
        while ($data = mysqli_fetch_assoc($query_trans)) {
$jml_kembali       = $data['jml_kembali'];
$admin = $data['administrasi'];
$jml_bayar = $data['jml_uang'];
}
?>

<tr>

    <td colspan="4" align="right"><strong>Biaya Administrasi (Rp) : </strong></td>
    <td colspan="8" align="right" bgcolor="#F5F5F5" ><strong><?php echo number_format ($admin); ?></strong></td>
</tr>

<tr>

    <td colspan="4" align="right"><strong>Total Bayar (Rp) : </strong></td>
    <td colspan="8" align="right" bgcolor="#F5F5F5" ><strong><?php echo number_format ($tot_bayar+$totel_bayar+$totalBayar+$total_hari+$tot_bayar_lab+$tot_bayar_rad+$admin); ?></strong></td>
</tr>

<tr>

    <td colspan="4" align="right"><strong>Pembayaran(Rp) : </strong></td>
    <td colspan="8" align="right" bgcolor="#F5F5F5" ><strong><?php echo number_format ($jml_bayar); ?></strong></td>
</tr>
<tr>

    <td colspan="4" align="right"><strong>Kembali (Rp) : </strong></td>
    <td colspan="8" align="right" bgcolor="#F5F5F5" ><strong><?php echo number_format ($jml_kembali); ?></strong></td>
</tr>


        </table>




<div>
</div>

        <div class="paraf">
            <table class="tabel-paraf">
                <tr>
                    <td class="keterangan-paraf"></td>
                    <td class="keterangan-paraf kanan">Sultra, <?php echo tgl_indo($tgl_sekarang); ?> </td>
                </tr>
                <tr>
                    <td class="isi-paraf"></td>
                    <td class="isi-paraf kanan">Kasir </td>
                </tr>
 
                 <tr>
                    <td class="nama-paraf"><?php echo $data['']; ?></td>
                    <td class="nama-paraf kanan"><?php echo $_SESSION['nama_peg']; ?></td>
                </tr>
            </table>

    </div>
</div>





</div>

</page>






<!--     $html2pdf = new HTML2PDF('P','A8','en', false, 'ISO-8859-15',array(20, 10, 13, 15)); -->
<?php
$filename="Billing Pasien Ranap.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();

// panggil library html2pdf

require_once('../asset/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(20, 5, 20, 10));
    $html2pdf->setDefaultFont('Times');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>