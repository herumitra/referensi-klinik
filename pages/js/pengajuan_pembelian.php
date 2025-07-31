<?php 
    $no_permintaan = @$_GET['id'];
    
 ?>

 <script src="js/jquery.tabledit.min.js"></script>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-align-left"></i> Form Perawatan</li>
     <li class="breadcrumb-item"><a href="?page=tabelracikan"><i class="fas fa-medkit"></i> Tabel Racikan</a></li>
  </ol>
</nav>

     <div class="row" style="padding: 0 16px;">
            <div class="col-md-12 vertical-form">
 <h5> Pesanan Obat Masuk ke Gudang Farmasi </h5>
        <table  id="editable_table" class="table table-striped display tabel-data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Permintaan</th>
                    <th>Nama Obat</th>
                    <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Subtotal</th>
                                  </tr>
            </thead>
            <?php 

                $nomor = 1;
                     $query_pjlobat = "SELECT tbl_dataobat.nm_obat, tbl_pengajuandetail.no_permintaan,tbl_pengajuandetail.hrg_beli, tbl_pengajuandetail.jml_beli, tbl_pengajuandetail.sat_beli, tbl_pengajuandetail.subtotal, tbl_pengajuandetail.no_idx FROM tbl_pengajuandetail INNER JOIN tbl_dataobat ON tbl_pengajuandetail.kd_obat = tbl_dataobat.kd_obat WHERE tbl_pengajuandetail.no_permintaan = '$no_permintaan'";
          
              $dewan1 = mysqli_query($conn, $query_pjlobat) or die ($conn->error);
          
            while($row = mysqli_fetch_array($dewan1)) {

/* $dewan1 = $conn->prepare($query_pjlobat);
         $dewan1->execute();
              $res1 = $dewan1->get_result();
              while ($row = $res1->fetch_assoc()) {
*/
        $kode=$row['no_permintaan'];       
        $no_idx=$row['no_idx'];       
                echo '
                <tr>
                 <td>'.$row["no_idx"].'</td>
                 <td>'.$row["no_permintaan"].'</td>
                 <td>'.$row["nm_obat"].'</td>
                  <td>'.$row["jml_beli"].'</td>
                  <td>'.$row["hrg_beli"].'</td>
                  <td>'.$row["subtotal"].'</td>

                </tr>
                ';
             }
            ?>
            </tbody>
        </table>

                             <tbody>
        <?php 
   $query_tampil = "SELECT tbl_dataobat.nm_obat, tbl_pengajuandetail.no_permintaan,tbl_pengajuandetail.hrg_beli, tbl_pengajuandetail.jml_beli, tbl_pengajuandetail.sat_beli, tbl_pengajuandetail.subtotal FROM tbl_pengajuandetail INNER JOIN tbl_dataobat ON tbl_pengajuandetail.kd_obat = tbl_dataobat.kd_obat WHERE tbl_pengajuandetail.no_permintaan = '$no_permintaan'";

/*   "SELECT * from tbl_nama_racikandetail where kd_racik='$kd_racik'";           */
$sql_tampil = mysqli_query($conn, $query_tampil) or die ($conn->error);
            while($data = mysqli_fetch_array($sql_tampil)) {
                $kode =$data['no_permintaan'];
/*                $nopen =$data['no_permintaan'];*/
         ?>
           <?php } ?>
                            <button class="btn-transition btn btn-primary" title="edit" id="tombol_simpanan" name="tombol_simpanan"  data-id="<?php echo $kode; ?>"



                                >
<!--                                 <i class="fas fa-medkit">APPROVAL</i> -->
                                <i class="fas fa-medki">APPROVAL</i>
</button>
       <input type="button" class="btn btn-sm btn-info" value="Go Back" onclick="history.back(-1)" />
<!-- <a  href="pesan.php"><span data-placement='top' data-toggle='tooltip' title='Setujui'><button   class="btn btn-success">Setujui</button></span></a> -->
<!--                    <a class="btn btn-success" href="pesan.php" >Minta Barang</a> -->
    </div>
</div>   

<br>
<br>
     <div class="row" style="padding: 0 16px;">
            <div class="col-md-12 vertical-form">
 <h5>  Konfirmasi Obat ke Depo  </h5>
        <table  id="editable_table" class="table table-striped display tabel-data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Subtotal</th>
                  <th>Status</th>                                  </tr>
            </thead>
            <?php 

                $nomor = 1;
$query_pjlo = "SELECT tbl_dataobat.nm_obat, tbl_pengajuan_pesan.no_permintaan,tbl_pengajuan_pesan.hrg_beli, tbl_pengajuan_pesan.jml_beli, tbl_pengajuan_pesan.sat_beli, tbl_pengajuan_pesan.subtotal , tbl_pengajuan_pesan.status FROM tbl_pengajuan_pesan INNER JOIN tbl_dataobat ON tbl_pengajuan_pesan.kd_obat = tbl_dataobat.kd_obat WHERE tbl_pengajuan_pesan.no_permintaan = '$no_permintaan'";
          
              $dewan1 = mysqli_query($conn, $query_pjlo) or die ($conn->error);
          
            while($datak = mysqli_fetch_array($dewan1)) {


        $kode=$datak['no_permintaan'];       
                echo '
                <tr>
                 <td>'.$datak["no_permintaan"].'</td>
                 <td>'.$datak["nm_obat"].'</td>
                  <td>'.$datak["jml_beli"].'</td>
                  <td>'.$datak["sat_beli"].'</td>
                  <td>'.$datak["subtotal"].'</td>
                  <td ><span class="btn-transition btn btn-success btn-sm">'.$datak["status"].'</span></td>
                </tr>
                ';
             }
            ?>
            </tbody>
        </table>

                             <tbody>
        <?php 
   $query_tampil =  "SELECT tbl_dataobat.nm_obat, tbl_pengajuan_pesan.no_permintaan,tbl_pengajuan_pesan.hrg_beli, tbl_pengajuan_pesan.jml_beli, tbl_pengajuan_pesan.sat_beli, tbl_pengajuan_pesan.subtotal, tbl_pengajuan_pesan.kd_obat FROM tbl_pengajuan_pesan INNER JOIN tbl_dataobat ON tbl_pengajuan_pesan.kd_obat = tbl_dataobat.kd_obat WHERE tbl_pengajuan_pesan.no_permintaan = '$no_permintaan'";

/*   "SELECT * from tbl_nama_racikandetail where kd_racik='$kd_racik'";           */
$sql_tampil = mysqli_query($conn, $query_tampil) or die ($conn->error);
            while($data = mysqli_fetch_array($sql_tampil)) {
                $kode =$data['no_permintaan'];
                $kd_obat =$data['kd_obat'];
/*                $nopen =$data['no_permintaan'];*/
         ?>
           <?php } ?>
    
    </div>
</div>   








<script>
$(document).ready(function() {
    // $(".kotak-form-obat-terjual").slideTo('slow');
    var count = 0;
    var total_penjualan = 0;

    $('.datepicker').datepicker({
        format : "yyyy-mm-dd",
        orientation: "bottom left",
        todayBtn: "linked",
        autoclose: true,
        language: "id",
        todayHighlight: true
    });

    function reset() {
        $("#kode_obat").val("");
        $("#nm_obat").val("");
        $("#hrg_obat").val("");
        $("#jml_obat").val("");
        $("#span_satuan").text("satuan");
        $("#toth_obat").val("");
        $("#stok_obat").val("");
        $("#exp_obat").val("");
    }

    function jml_obat() {
        var jml = Number($("#jml_obat").val());
        var harga = Number ($("#hrg_obat").val());
        if (jml>=0) {
            var sub_total = jml*harga;
            $("#toth_obat").val(sub_total);
        } else {
            $("#toth_obat").val("");
        }
    }
    function hrg_obat() {
        var jml = Number($("#jml_obat").val());
        var harga = Number ($("#hrg_obat").val());
        if (harga>=0) {
            var sub_total = jml*harga;
            $("#toth_obat").val(sub_total);
        } else {
            $("#toth_obat").val("");
        }
    }

    $("button[name='tombol_pilihobat']").click(function() {
        var kode = $(this).data('kode');
        var nama = $(this).data('nama');
        var harga = $(this).data('harga');
        var satuan = $(this).data('satuan');
        var stok = $(this).data('stok');
        var exp = $(this).data('exp');

        $("#kode_obat").val(kode);
        $("#nm_obat").val(nama);
        $("#stok_obat").val(stok);
        $("#exp_obat").val(exp);
        $("#hrg_obat").val(harga);
        $("#span_satuan").text(satuan);
        $("#jml_obat").val(1);
        $("#toth_obat").val(harga);
    });

    // $("#kode_obat").click(functon() {
    //     $("#lihat_data_obat").click();
    // });

    $("#kode_obat").keypress(function (e) {
        var key = e.which;
        if(key == 13) {
            alert();
        }
    })

    $("#hrg_obat").keyup(function() { hrg_obat(); });
    $("#hrg_obat").change(function() { hrg_obat(); });
    $("#jml_obat").keyup(function() { jml_obat(); });
    $("#jml_obat").change(function() { jml_obat(); });

    $("#reset_obat").click(function() {
        reset();
    });

    $("#tambah_obat").click(function() {
        var kode = $("#kode_obat").val();
        var nama = $("#nm_obat").val();
        var stok = Number($("#stok_obat").val());
        var exp = $("#exp_obat").val();
                var akai = $("#akai").val();
        var harga = $("#hrg_obat").val();
        var jumlah = Number($("#jml_obat").val());
        var satuan = $("#span_satuan").text();
        var subtotal = Number($("#toth_obat").val());

        if(kode=="") {
            document.getElementById("lihat_data_obat").focus();
            Swal.fire(
              'Data Belum Lengkap',
              'maaf, tolong masukkan data obat terlebih dahulu',
              'warning'
            )
        } else if(harga=="" || harga<=0) {
            document.getElementById("hrg_obat").focus();
            Swal.fire(
              'Data Belum Lengkap',
              'maaf, tolong isi harga obat dengan benar',
              'warning'
            )
        } else if(jumlah=="" || jumlah<=0) {
            document.getElementById("jml_obat").focus();
            Swal.fire(
              'Data Belum Lengkap',
              'maaf, tolong isi jumlah obat dengan benar',
              'warning'
            )
        } else if(subtotal=="" || subtotal<=0 || subtotal<harga) {
            document.getElementById("toth_obat").focus();
            Swal.fire(
              'Data Belum Lengkap',
              'maaf, tolong isi total harga dengan benar',
              'warning'
            )
        } else if(jumlah>stok) {
            document.getElementById("toth_obat").focus();
            Swal.fire(
              'Stok tidak cukup',
              'maaf, jumlah '+jumlah+' stok tidak mencukupi. stok yang tersedia sebanyak '+stok+' '+satuan,
              'warning'
            )
        } else {
            // alert(kode+" / "+nama+" / "+harga+" / "+jumlah+" / "+satuan+" / "+subtotal);
            count = count+1;
            var output = "";
            output = '<tr id="row_'+count+'">';
            output += '<td>'+kode+' <input type="hidden" name="hidden_kdobat[]" id="td_kd_obat'+count+'" class="td_kd_obat" value="'+kode+'"></td>';
            output += '<td>'+nama+' <input type="hidden" name="hidden_nmobat[]" id="td_nmobat'+count+'" class="td_nmobat" value="'+nama+'"></td>';
            output += '<td>'+exp+' <input type="hidden" name="hidden_expobat[]" id="td_expobat'+count+'" class="td_expobat" value="'+exp+'"></td>';
            output += '<td class="text-right">'+harga+' <input type="hidden" name="hidden_hrgobat[]" id="td_hrgobat'+count+'" class="td_hrgobat" value="'+harga+'"></td>';
            output += '<td class="text-center">'+jumlah+' <input type="hidden" name="hidden_jmlobat[]" id="td_jmlobat'+count+'" class="td_jmlobat" value="'+jumlah+'"></td>';
            output += '<td class="text-center">'+satuan+' <input type="hidden" name="hidden_satobat[]" id="td_satobat'+count+'" class="td_satobat" value="'+satuan+'"></td>';
            output += '<td class="text-center">'+akai+' <input type="hidden" name="hidden_akai[]" id="td_akai'+count+'" class="td_akai" value="'+akai+'"></td>';
            output += '<td class="text-right">'+subtotal+' <input type="hidden" name="hidden_subtotal[]" id="td_subtotal'+count+'" class="td_subtotal" value="'+subtotal+'"></td>';
            output += '<td class="td-opsi"><button type="button" class="hapus_obat btn-transition btn btn-outline-danger btn-sm" name="hapus_obat" id="'+count+'" title="hapus obat ini">hapus</button></td>';
            output += '</tr>';
            $("#keranjang_obat").append(output);
            $("#baris_kosong").hide();
            total_penjualan = total_penjualan+subtotal;
            $("#total_penjualan").text(total_penjualan);
            $("#hidden_totalpenjualan").val(total_penjualan);
            $("#total_pembayaran").text(total_penjualan);
            $(".baris_total").show();
            reset();
        }
    });

    $(document).on("click", ".hapus_obat", function() {
        var row_id = $(this).attr("id");
        var subtotal = Number($("#td_subtotal"+row_id).val());

        total_penjualan = total_penjualan-subtotal;
        $("#total_penjualan").text(total_penjualan);
        $("#hidden_totalpenjualan").val(total_penjualan);
        $("#total_pembayaran").text(total_penjualan);
        $("#row_"+row_id).remove();
        if(total_penjualan==0)
        {
            $("#baris_kosong").show();
            $(".baris_total").hide();
            $("#tambah_obat_lagi").click();
        }
    });

    $("#hapus_semua_obat").click(function() {
        Swal.fire({
          title: 'Hapus Semua ?',
          text: 'apakah anda yakin menghapus semua daftar obat',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya'
        }).then((hapus) => {
          if (hapus.value) {
            $("#keranjang_obat > tr").remove();
            total_penjualan = 0;
            $("#hidden_totalpenjualan").val("0");
            $("#total_pembayaran").text(total_penjualan);
            $("#baris_kosong").show();
            $(".baris_total").hide();
            $("#tambah_obat_lagi").click();
          }
        })
    });

    $("#lanjut_pembayaran").click(function() {
        // alert();
        $(".kotak-form-obat-terjual").hide();
        $(".kotak-form-pembayaran").show();
        document.getElementById("jml_uang").focus();
        $("#tambah_obat_lagi").show();
        $("#lanjut_pembayaran").hide();
    });

    $("#tambah_obat_lagi").click(function() {
        // alert();
        $(".kotak-form-obat-terjual").show();
        $(".kotak-form-pembayaran").hide();
        $("#jml_uang").val("");
        $("#jml_kembali").val("");
        $("#tambah_obat_lagi").hide();
        $("#lanjut_pembayaran").show();
    });

   /* $("#jml_uang").keyup(function() {
        var nominal = $(this).val();
        var kembali;
        if(nominal>=total_penjualan){
            kembali = nominal - total_penjualan;
            $("#jml_kembali").val(kembali);
        } else {
            $("#jml_kembali").val("uang tidak cukup");
        }
    });*/


$("button[name='tombol_simpanan']").click(function() {
        var id = $(this).data('id');
        var no_permintaan = $(this).data('no_permintaan');
        var no_permintaan = $("#no_permintaan").val();
        var kd_obat = $("#kd_obat").val();

        $("#no_permintaan").val(id);
        $("#no_permintaan").val(no_permintaan);
        $("#kd_obat").val(kd_obat);

        window.location='?page=simpanan_ajuan&id='+id;
    });


    $("#form_racikan").on("submit", function(event){
        event.preventDefault();
        var kd_racik = $("#kd_racik").val();
        var tanggal_racik = $("#tanggal_racik").val();
        var nama_racikan = $("#nama_racikan").val();
                var stk_obat = $("#stk_obat").val();
                var akai = $("#akai").val();
        var nominal = $("#jml_uang").val();
        var kembali = $("#jml_kembali").val();
        var nama_pasien = $("#nama_pasien").val();
                var status = $("#status").val();

        if(kd_racik=="") {
            document.getElementById("kd_racik").focus();
            Swal.fire(
              'Data Belum Lengkap',
              'maaf, tolong isi nomor penjualan',
              'warning'
            )
        } else 
        if(tanggal_racik==""){
            document.getElementById("tanggal_racik").focus();
            Swal.fire(
              'Data Belum Lengkap',
              'maaf, tolong isi periode penjualan',
              'warning'
            )
        } else if(total_penjualan==0){
            document.getElementById("lihat_data_obat").focus();
            Swal.fire(
              'Data Belum Lengkap',
              'maaf, anda belum mengisi daftar obat',
              'warning'
            )
        } 
       /* else if(nominal<=0 || nominal==""){
            $("#lanjut_pembayaran").click();
            Swal.fire(
              'Data Belum Lengkap',
              'maaf, anda belum mengisi jumlah uang pembayaran',
              'warning'
            )
        } */
        else {
            Swal.fire({
              title: 'Simpan ?',
              text: 'apakah anda telah mengisi data penjualan dengan benar ',
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya'
            }).then((simpan) => {
              if (simpan.value) {
                var count_data = 0;
                $(".td_kd_obat").each(function(){
                    count_data = count_data + 1;
                });
                if(count_data > 0) {
                    var form_data = $(this).serialize();
                    $.ajax({
                        url: "ajax/simpan_edit_racik.php",
                        method: "POST",
                        data: form_data,
                        success:function(data) {
                            Swal.fire({
                              title: 'Berhasil',
                              text: 'Data Berhasil Disimpan',
                              type: 'success',
                              confirmButtonColor: '#3085d6',
                              confirmButtonText: 'OK'
                            }).then((ok) => {
                              if (ok.value) {
                                // window.location='?page=entry_datapenjualan';
                                window.location='?page=tabelracikan';
                                
                              }
                            })
                        }
                    })
                } else {
                    alert();
                }
              }
            })
        }
    });
});
</script>

 <script>  
    $(document).ready(function(){  
      $('#editable_table').Tabledit({
        url:'pages/js/actionobat_ajuan.php',
        columns:{
          identifier:[0, "no_idx"],
          editable:[[3, 'jml_beli'], [4, 'hrg_beli'], [5, 'subtotal']]
        },
        restoreButton:true,
        onSuccess:function(data, textStatus, jqXHR){
          if(data.action == 'delete'){
            $('#'+data.no_idx).remove();
          }
        } 
      });
    });
  </script>

