<?php 
include 'koneksi.php';
$no_daftar =$_GET['no_daftar'];
    error_reporting(0);// taruh disini ya  bagian atas sekali


session_start();
ob_start();

// Panggil koneksi database.php untuk koneksi database

// panggil fungsi untuk format tanggal
include "../config/fungsi_indotgl.php";
// panggil fungsi untuk format rupiah

?>
<link type="text/css" href="./isi/style_css/narkoba.css" rel="stylesheet">

<page backtop="15px">
    <page_header class="page_header">
        (Lampiran Surat Bebas Narkoba)
    </page_header>
    <page_footer>
    </page_footer>
    <div class="page-content">
        <div class="data-apotek">
<img src='../images/zt.png' width='640'> 

        </div>


        <div class="judul-surat">
            <span class="judul" ><u>Surat Keterangan Bebas Narkoba</u></span>
                        <br ><small> Nomor : <?php echo $nomor; ?> </small><br>
        </div>

        <div class="data-transaksi" style="line-height: 1.2; margin-bottom: 8px;">
            <p>Yang bertanda tangan di bawah ini, menerangkan bahwa : </p>
            <?php 
    $query = "Select * from tbl_daftarpasienranap where no_daftar='$no_daftar'";
                $sql = mysqli_query($conn, $query) or die ($conn->error);
                $data = mysqli_fetch_array($sql);

             ?>
            <table class="data-nota">
                <tr>
                    <td>NAMA</td>
                    <td>: <?php echo $data['nama_pas']; ?></td>
                </tr>
                <tr>
                    <td>NIK </td>
                    <td>: <?php echo $data['nik']; ?></td>
                </tr>

                <tr>
                    <td>TEMPAT/ TGL LAHIR</td>
                    <td>: <?php echo $data['tpt_lahir']; ?>/<?php echo tgl_indo($data['lhr_pas']); ?></td>
                </tr>
                <tr>
                    <td>ALAMAT (KTP) </td>
                    <td >: <?php echo $data['alm_pas']; ?></td>
                </tr>

                <tr>
                    <td>NO HP </td>
                    <td>: <?php echo $data['no_hp']; ?></td>
                </tr>



            <?php 
    $query2 = "Select * from tbl_daftarpasienranap where no_daftar='$no_daftar'";
                $sql2 = mysqli_query($conn, $query2) or die ($conn->error);
                $dataku = mysqli_fetch_array($sql2);

             ?>
         </table>
            <table class="data-nota">
                <tr>
                    <td style="width:150px; text-align: right;">AGAMA </td>
                    <td >: 
<label><input type="radio" name='Laki-laki' value='Islam' <?php if($dataku['agama']=='Islam') echo 'checked="checked"'?>>ISLAM</label>


</td>
                    <td style="text-align: right;"> STATUS PERNIKAHAN </td>
                    <td>: 
      <label><input type="radio" name='Belum Menikah' value='Belum Menikah' <?php if($data['status_nikah']=='Belum Menikah') echo 'checked="checked"'?>>BELUM MENIKAH</label>

</td>
                </tr>


                <tr>
                    <td></td>
                    <td>&nbsp; 
<label><input type="radio" name='Protestan' value='Protestan' <?php if($dataku['agama']=='Protestan') echo 'checked="checked"'?>>PROTESTAN</label>


</td>
                    <td>  </td>
                    <td>&nbsp; 
      <label><input type="radio" name='Menikah' value='Menikah' <?php if($data['status_nikah']=='Menikah') echo 'checked="checked"'?>>MENIKAH</label>

</td>

                </tr>

                <tr>
                    <td></td>
                    <td>&nbsp; 
<label><input type="radio" name='Katolik' value='Katolik' <?php if($dataku['agama']=='Katolik') echo 'checked="checked"'?>>KATOLIK</label>


</td>
                    <td>  </td>
                    <td>&nbsp;  
      <label><input type="radio" name='Janda' value='Janda' <?php if($data['status_nikah']=='Janda') echo 'checked="checked"'?>>JANDA</label>

</td>


                </tr>

                <tr>
                    <td></td>
                    <td>&nbsp; 
<label><input type="radio" name='Hindu' value='Hindu' <?php if($dataku['agama']=='Hindu') echo 'checked="checked"'?>>HINDU</label>


</td>
                    <td>  </td>
                    <td>&nbsp; 
      <label><input type="radio" name='Duda' value='Duda' <?php if($data['status_nikah']=='Duda') echo 'checked="checked"'?>>DUDA</label>

</td>


                </tr>

                <tr>
                    <td></td>
                    <td>&nbsp; 
<label><input type="radio" name='Budha' value='Budha' <?php if($dataku['agama']=='Budha') echo 'checked="checked"'?>>BUDHA</label>

</td>
                    <td style="text-align: right;"> KEWARGANEGARAAN</td>
                    <td>: 
      <label><input type="radio" name='WNI' value='WNI' <?php if($data['negara']=='WNI') echo 'checked="checked"'?>>WNI</label>

</td>
                </tr>
                <tr>
                    <td></td>
                    <td>&nbsp; 
<label><input type="radio" name='Lain' value='Lain' <?php if($dataku['agama']=='Lain') echo 'checked="checked"'?>>LAIN....</label>


</td>

                    <td> </td>
                    <td>&nbsp; 
      <label><input type="radio" name='WNA' value='WNA' <?php if($data['negara']=='WNA') echo 'checked="checked"'?>>WNA</label>

</td>


                </tr>

<tr>
                        <td style="width:150px; text-align: right;">JENIS KELAMIN </td>
                    <td>: 
<label><input type="radio" name='Laki-laki' value='Islam' <?php if($data['jk_pas']=='Laki-laki') echo 'checked="checked"'?>>LAKI-LAKI</label>

</td>

                </tr>


                <tr>
                    <td></td>
                    <td>&nbsp; 
 <label><input type="radio" name='Perempuan' value='Perempuan' <?php if($data['jk_pas']=='Perempuan') echo 'checked="checked"'?>>PEREMPUAN</label>

</td>

                    <td style="text-align: right;"> PEKERJAAN</td>
                    <td>: 
      <label><input type="radio" name='ASN' value='ASN' <?php if($data['pekerjaan']=='ASN') echo 'checked="checked"'?>>ASN</label>

</td>

                </tr>

<tr>
<td style="width:150px; text-align: right;">PENDIDIKAN</td>
                    <td>: 
<label><input type="radio" name='SD' value='SD' <?php if($data['pendidikan']=='SD') echo 'checked="checked"'?>>SD</label>

</td>

                    <td> </td>
                    <td>&nbsp; 
      <label><input type="radio" name='Karyawan' value='Karyawan' <?php if($data['pekerjaan']=='Karyawan') echo 'checked="checked"'?>>KARYAWAN</label>

</td>

                </tr>

<tr>
<td style="width:150px; text-align: right;"></td>
                    <td>&nbsp; 
<label><input type="radio" name='SMP' value='SMP' <?php if($data['pendidikan']=='SMP') echo 'checked="checked"'?>>SMP</label>

</td>


                    <td> </td>
                    <td>&nbsp; 
      <label><input type="radio" name='TNI/POLRI' value='TNI/POLRI' <?php if($data['pekerjaan']=='TNI/POLRI') echo 'checked="checked"'?>>TNI/POLRI</label>

</td>

                </tr>


<tr>
<td style="width:150px; text-align: right;"></td>
                    <td>&nbsp; 
<label><input type="radio" name='SMA' value='SMA' <?php if($data['pendidikan']=='SMA') echo 'checked="checked"'?>>SMA</label>

</td>

                    <td> </td>
                    <td>&nbsp; 
      <label><input type="radio" name='Wiraswasta' value='Wiraswasta' <?php if($data['pekerjaan']=='Wiraswasta') echo 'checked="checked"'?>>WIRASWASTA</label>

</td>

                </tr>

<tr>
<td style="width:150px; text-align: right;"></td>
                    <td>&nbsp; 
<label><input type="radio" name='Diploma' value='Diploma' <?php if($data['pendidikan']=='Diploma') echo 'checked="checked"'?>>DIPLOMA</label>
</td>
                    <td> </td>
                    <td>&nbsp; 
      <label><input type="radio" name='IRT' value='IRT' <?php if($data['pekerjaan']=='IRT') echo 'checked="checked"'?>>IRT</label>

</td>

                </tr>

<tr>
<td style="width:150px; text-align: right;"></td>
                    <td>&nbsp; 
<label><input type="radio" name='Sarjana' value='Sarjana' <?php if($data['pendidikan']=='Sarjana') echo 'checked="checked"'?>>SARJANA</label>

</td>

                    <td> </td>
                    <td>&nbsp; 
      <label><input type="radio" name='Pelajar/Mahasiswa' value='Pelajar/Mahasiswa' <?php if($data['pekerjaan']=='Pelajar/Mahasiswa') echo 'checked="checked"'?>>PELAJAR/MAHASISWA</label>

</td>
                </tr>
<tr>
<td style="width:150px; text-align: right;"></td>
                    <td>&nbsp; 
<label><input type="radio" name='Lain' value='Lain' <?php if($data['pendidikan']=='Lain') echo 'checked="checked"'?>>LAIN.....</label>

</td>
                    <td> </td>
                    <td>&nbsp; 
      <label><input type="radio" name='Lain' value='Lain' <?php if($data['pekerjaan']=='Pelajar/Mahasiswa') echo 'checked="checked"'?>>LAIN.....</label>

</td>

                </tr>

             </table>

            <table class="data-nota">
                <tr>
                    <td>GOLONGAN DARAH</td>
                    <td>: <?php echo $data['goldarah']; ?></td>
                </tr>
                <tr>
                    <td>NAMA PENANGGUNG JAWAB</td>
                    <td>: <?php echo $data['penanggungjawab']; ?></td>
                </tr>

                <tr>
                    <td>ALAMAT (DOMISILI) & NO HP</td>
                    <td>: <?php echo $data['alamat_pj']; ?>/<?php echo tgl_indo($data['no_hp_pj']); ?></td>
                </tr>

</table>

            <table class="data-nota">
                <tr>
                    <td style="width:150px; text-align: right;">LAYANAN YANG DITUJU </td>
                    <td >: 
<label><input type="radio" name='Poli Umum' value='Poli Umum' <?php if($dataku['proses']=='Poli Umum') echo 'checked="checked"'?>>1. POLI UMUM</label>


</td>
                    <td style="text-align: right;"> JENIS KUNJUNGAN</td>
                    <td>: 
      <label><input type="radio" name='Baru' value='Baru' <?php if($data['kunjungan']=='Baru') echo 'checked="checked"'?>>BARU</label>

</td>
                </tr>


                <tr>
                    <td></td>
                    <td>&nbsp; 
<label><input type="radio" name='Poli Gigi & Mulut' value='Poli Gigi & Mulut' <?php if($dataku['proses']=='Poli Gigi & Mulut') echo 'checked="checked"'?>>POLI GIGI & MULUT</label>


</td>
                    <td>  </td>
                    <td>&nbsp; 
      <label><input type="radio" name='Lama' value='Lama' <?php if($data['kunjungan']=='Lama') echo 'checked="checked"'?>>LAMA</label>

</td>

                </tr>

                <tr>
                    <td></td>
                    <td>&nbsp; 
<label><input type="radio" name='Poli Penyakit Dalam' value='Poli Penyakit Dalam' <?php if($dataku['proses']=='Poli Penyakit Dalam') echo 'checked="checked"'?>>POLI PENYAKIT DALAM</label>


</td>
                    <td style="text-align: right;"> CARA MASUK </td>
                    <td>:
      <label><input type="radio" name='Datang Sendiri' value='Datang Sendiri' <?php if($data['cara_masuk']=='Datang Sendiri') echo 'checked="checked"'?>>1. DATANG SENDIRI</label>

</td>


                </tr>

                <tr>
                    <td></td>
                    <td>&nbsp; 
<label><input type="radio" name='Poli Obgyn' value='Poli Obgyn' <?php if($dataku['proses']=='Poli Obgyn') echo 'checked="checked"'?>>POLI OBGYN</label>


</td>
                    <td>  </td>
                    <td>&nbsp; 
      <label><input type="radio" name='Rujukan' value='Rujukan' <?php if($data['cara_masuk']=='Rujukan') echo 'checked="checked"'?>>2. RUJUKAN</label>

</td>


                </tr>

                <tr>
                    <td></td>
                    <td>&nbsp; 
<label><input type="radio" name='Poli Anak' value='Poli Anak' <?php if($dataku['proses']=='Poli Anak') echo 'checked="checked"'?>>POLI ANAK</label>

</td>
                    <td style="text-align: right;"> CARA PEMBAYARAN</td>
                    <td>: 
      <label><input type="radio" name='Umum' value='Umum' <?php if($data['cara_bayar']=='Umum') echo 'checked="checked"'?>>1. UMUM</label>

</td>
                </tr>
                <tr>
                    <td></td>
                    <td>&nbsp; 
<label><input type="radio" name='Poli Bedah' value='Poli Bedah' <?php if($dataku['proses']=='Poli Bedah') echo 'checked="checked"'?>>POLI BEDAH</label>


</td>

                    <td> </td>
                    <td>&nbsp; 
      <label><input type="radio" name='Asuransi' value='Asuransi' <?php if($data['cara_bayar']=='Asuransi') echo 'checked="checked"'?>>2. ASURANSI</label>

</td>


                </tr>

<tr>
                        <td style="width:150px; text-align: right;"></td>
                    <td>&nbsp;  
<label><input type="radio" name='IGD/PONEK' value='IGD/PONEK' <?php if($data['proses']=='IGD/PONEK') echo 'checked="checked"'?>>IGD / PONEK</label>

</td>

                </tr>


                <tr>
                    <td>TANGGAL DAFTAR </td>
                <td>: <?php echo $data['tgl_daftar']; ?></td>

                    <td style="text-align: right;"> JAM DAFTAR</td>
         <td>: <?php echo $data['jam_daftar']; ?></td>
                </tr>



             </table>

<p>DENGAN INI SAYA MENYATAKAN SETUJU UNTUK DILAKUKAN PEMERIKSAAN DAN TINDAKAN YANG DIPERLUKAN 
DALAM UPAYA KESEMBUHAN/KESELAMATAN JIWA SAYA/PASIEN TERSEBUT DI ATAS </p>
        </div>
    
      
<br>
<br>
        <div class="paraf">
            <table class="tabel-paraf">
                <tr>
                    <td class="keterangan-paraf"></td>
                    <td class="keterangan-paraf kanan">Medan, 20 Maret 2022</td>
                </tr>
                <tr>
                    <td class="isi-paraf"></td>
                    <td class="isi-paraf kanan"></td>
                </tr>
                <tr>
                    <td class="nama-paraf"><?php echo $data['nm_dokter']; ?></td>
                    <td class="nama-paraf kanan"><?php echo $data['dokter']; ?></td>
                </tr>
            </table>
        </div>
    </div>
</page>















<!--     $html2pdf = new HTML2PDF('P','A8','en', false, 'ISO-8859-15',array(20, 10, 13, 15)); -->
<?php
$filename="Surat Daftar.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();

// panggil library html2pdf

require_once('../asset/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P','F4','en', false, 'ISO-8859-15',array(20, 0, 20, 10));
    $html2pdf->setDefaultFont('Times');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>