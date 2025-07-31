<script type="text/javascript" src="jquery-1.4.2.min.js"></script>
<?php 
    $no_daftar = @$_GET['id'];
 ?>
 <nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a href="?page=datapasien"><i class="fas fa-briefcase-medical"></i> Data Pasien</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-edit"></i> Form Edit Data Pasien</li>
  </ol>
</nav>

 <style type="text/css">
        .autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
        .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
        .autocomplete-selected { background: #F0F0F0; }
        .autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
        .autocomplete-group { padding: 2px 5px; }
        .autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
    </style>




<div class="page-content">
    <div class="row">
        <div class="col-6"><h4>Form Edit Pasien Ranap</h4></div>
        <div class="col-6 text-right">
            <a href="?page=datapasien">
                <button class="btn btn-sm btn-info">Daftar Data Pasien Ranap</button>
            </a>
        </div>
    </div>
    <div class="form-container">
        <div class="row">
            <div class="col-md-10 offset-md-1 offset-form">
                <h6><i class="fas fa-list-alt"></i> Lengkapi form ini untuk mengisi data Pasien</h6>
                <form action="javascrip:void(0);"  autocomplete="off">


                <form method="post" id="form_penjualan" autocomplete="off">
                    <div class="position-relative row form-group">
                        <!-- <label for="no_penjualan" class="col-sm-2 col-form-label">Nomor Penjualan</label> -->

                                                    <div class="col-sm-3">
                            <input name="no_daftar" id="no_daftar" placeholder="nomor daftar" type="hidden" class="form-control form-control-sm" value="<?php echo $no_daftar; ?>">
                        </div>

               <?php 
                    $query_tampil = "SELECT * FROM tbl_daftarpasienranap WHERE no_daftar='$no_daftar'";
                    $sql_tampil = mysqli_query($conn, $query_tampil) or die ($conn->error);
                    $data = mysqli_fetch_array($sql_tampil);
                   ?>

</div>


 <div class="form-group row">
                    <label for="nama_pas" class="col-sm-2 col-form-label">Nama Pasien</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control form-control-sm" id="nama_pas" placeholder="masukkan nama pasien" autofocus="" value="<?php echo $data['nama_pas']; ?>">

                    </div>
                    <label for="nomor_rm" class="col-sm-2 col-form-label" style="text-align: right;">Nomor RM</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" id="nomor_rm" placeholder="masukkan nama pasien" autofocus="" value="<?php echo $data['nomor_rm']; ?>">
                    </div>
                  </div>

 <div class="form-group row">
                    <label for="nama_pas" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control form-control-sm" id="tpt_lahir" placeholder="masukkan nama pasien" autofocus="" value="<?php echo $data['tpt_lahir']; ?>">

                    </div>
                    <label for="nomor_rm" class="col-sm-2 col-form-label" style="text-align: right;">Tgl Lahir</label>
                    <div class="col-sm-4">
                      <input type="date" class="form-control form-control-sm" id="tlahir_pas" value="<?php echo $data['lhr_pas'] ?>">
                      <small class="form-text text-muted" style="text-align: right;">bulan/tanggal/tahun</small>
                    </div>
                  </div>

 <div class="form-group row">
                    <label for="nama_pas" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control form-control-sm" id="nik" placeholder="masukkan NIK" autofocus="" value="<?php echo $data['nik']; ?>">

                    </div>
                    <label for="jk_pas" class="col-sm-2 col-form-label" style="text-align: right;">Jenis Kelamin</label>
                    <div class="col-sm-4">
                      <select name="jk_pas" id="jk_pas" class="form-control form-control-sm" <?php echo $data['jk_pas']; ?>>
                        <option value="0">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" <?php if($data['jk_pas'] == "Laki-laki") {echo "selected";} ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if($data['jk_pas'] == "Perempuan") {echo "selected";} ?>>Perempuan</option>

                      </select>

                    </div>
                  </div>


 <div class="form-group row">
                    <label for="nama_pas" class="col-sm-2 col-form-label">Asuransi</label>
                    <div class="col-sm-4">
                      <select name="asuransi_pas" id="asuransi_pas" class="form-control form-control-sm" <?php echo $data['asuransi_pas']; ?>>
                        <option value="0">pilih Asuransi Pasien</option>
                        <option value="BPJS Kesehatan" <?php if($data['asuransi_pas'] == "BPJS Kesehatan") {echo "selected";} ?>>BPJS Kesehatan</option>
                        <option value="Pribadi" <?php if($data['asuransi_pas'] == "Pribadi") {echo "selected";} ?>>Pribadi</option>

                      </select>

                    </div>
                    <label for="no_bpjs" class="col-sm-2 col-form-label" style="text-align: right;">No BPJS</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control form-control-sm" name="no_bpjs" id="no_bpjs" placeholder="masukkan nomor BPJS" autofocus="" value="<?php echo $data['no_bpjs']; ?>">
                    </div>
                  </div>


 <div class="form-group row">
                    <label for="nama_pas" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-4">
                      <textarea name="alm_pas" id="alm_pas" rows="2" class="form-control" placeholder="masukkan alamat pasien" style="font-size: 14px;"><?php echo $data['alm_pas']; ?></textarea>

                    </div>
                    <label for="nomor_rm" class="col-sm-2 col-form-label" style="text-align: right;">Kelurahan/Desa</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control form-control-sm" name="desa" id="desa" value="<?php echo $data['desa'] ?>">
                      <input type="hidden" class="form-control form-control-sm" name="kec" id="kec" value="<?php echo $data['kec'] ?>">
                      <input type="hidden" class="form-control form-control-sm" name="kab_kota" id="kab_kota" value="<?php echo $data['kab_kota'] ?>">
                      <input type="hidden" class="form-control form-control-sm" name="provinsi" id="provinsi" value="<?php echo $data['provinsi'] ?>">

                    </div>
                  </div>

 <div class="form-group row">
                    <label for="nama_pas" class="col-sm-2 col-form-label">Keluhan Awal</label>
                    <div class="col-sm-4">
                      <textarea name="diagnosa_awal" id="diagnosa_awal" rows="2" class="form-control" placeholder="tulis diagnosa pasien" style="font-size: 14px;"><?php echo $data['keluhan']; ?></textarea>

                    </div>

                    <label for="nomor_rm" class="col-sm-2 col-form-label" style="text-align: right;">Dokter DPJP</label>
                    <div class="col-sm-4">
  <select name="dokter" id="dokter" class="form-control form-control-sm" >
              <option value="<?php echo $data['dokter']; ?>"><?php echo $data['dokter']; ?></option>
                <?php
                //query menampilkan nama unit kerja ke dalam combobox
                $query    =mysqli_query($conn, "SELECT * FROM dokter");
                while ($dataku = mysqli_fetch_array($query)) {
                ?>
                <option value="<?=$dataku['nm_dokter'];?>"><?php echo $dataku['nm_dokter'];?></option>
                <?php } ?>
            </select>

                    </div>
                  </div>

 <div class="form-group row">
                    <label for="kamar" class="col-sm-2 col-form-label">Ruangan</label>
                    <div class="col-sm-4">
<input type="text" onkeyup="isi_otomatis()" id="kamar" name="kamar" value ="<?php echo $data['kamar']; ?>" class="form-control" >
</div> 


                    <label for="no_bed" class="col-sm-2 col-form-label" style="text-align: right;">Nomor BED</label>
                    <div class="col-sm-4">

<input type="text" id="no_bed" name="no_bed" value ="<?php echo $data['no_bed']; ?>"  class="form-control">

<!--               <input type="text" class="form-control form-control-sm" name="tarif" id="tarif" value ="<?php echo $data['tarif']; ?>"placeholder="masukkan tarif" > -->
 </div>
</div>




 <div class="form-group row">
            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-4">
              <input type="text" class="form-control form-control-sm" name="kelas" id="kelas" value ="<?php echo $data['kelas']; ?>" placeholder="masukkan Deposit" >
          </div>
          


          <label for="tarif" class="col-sm-2 col-form-label" style="text-align: right;"> TARIF </label>

            <div class="col-sm-4">
              <input type="text" class="form-control form-control-sm" name="tarif" id="tarif" value ="<?php echo $data['tarif']; ?>" placeholder="masukkan Deposit" >
          </div>

                    <label for="nomor_rm" class="col-sm-2 col-form-label" style="text-align: left;">Keterangan Pulang</label>
                    <div class="col-sm-4">
  <select name="ket" id="ket" class="form-control form-control-sm" >
              <option value="<?php echo $data['ket']; ?>"><?php echo $data['ket']; ?></option>
              <option value="open">open</option>

            </select>

                    </div>
                  </div>


     <input type="hidden" class="form-control form-control-sm" name="kuota_asal" id="kuota_asal" value="1" placeholder="" >




                  <div class="form-group row">
<button class="btn btn-info btn-sm" id="btn_simpanedit">Simpan </button>        

                    </div>
                  </div>

<div class="modal fade" id="modal_databed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Kamar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="tabel_dataobat" class="table table-striped display">
            <thead>
                <tr>
          <th>Kode</th>
                    <th>Kamar</th>
                    <th>No Bed</th>
                    <th>Kelas</th>
                    <th>Tarif</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
        <?php 
        require_once "koneksi.php";
         $query_tampil = "SELECT * FROM ruangan where kuota = '1' ORDER BY kamar ASC";
      
            $sql_tampil = mysqli_query($conn, $query_tampil) or die ($conn->error);
            while($data = mysqli_fetch_array($sql_tampil)) {
         ?>
                <tr>
                    <td><?php echo $data['id_ruangan']; ?></td>
                    <td><?php echo $data['kamar']; ?></td>
                    <td><?php echo $data['no_bed']; ?></td>
                    <td><?php echo $data['kelas']; ?></td>
                    <td><?php echo $data['tarif']; ?></td>
                    <td class="td-opsi">
                        <button class="btn-transition btn btn-outline-dark btn-sm" title="pilih" id="tombol_pilihbed" name="tombol_pilihbed" data-dismiss="modal"
                            data-kode="<?php echo $data['id_ruangan']; ?>"
                            data-nama="<?php echo $data['kamar']; ?>"
                            data-no_bed="<?php echo $data['no_bed']; ?>"
                            data-kelas="<?php echo $data['kelas']; ?>"
                            data-tarif="<?php echo $data['tarif']; ?>"

                        > pilih
                        </button>
                    </td>
                </tr>
         <?php 
            } 
         ?>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





<script>

    $("button[name='tombol_pilihbed']").click(function() {
        var kode = $(this).data('kode');
        var nama = $(this).data('nama');
        var no_bed = $(this).data('no_bed');
        var kelas = $(this).data('kelas');
        var tarif = $(this).data('tarif');

        $("#id_ruangan").val(kode);
        $("#kamar").val(nama);
        $("#no_bed").val(no_bed);
        $("#kelas").val(kelas);
        $("#tarif").val(tarif);

    });
</script>


     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){
                var kamar = $("#kamar").val();
                $.ajax({
                    url: 'ajax/form_ajax.php',
                    data:"kamar="+kamar ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);

                    $('#no_bed').val(obj.no_bed);
                    $('#tarif').val(obj.tarif);
                });
            }
        </script>
    


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.11/jquery.autocomplete.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $( "#kamar" ).autocomplete({
      serviceUrl: "ajax/get_data.php",   
      dataType: "JSON",          
      onSelect: function (suggestion) {
          $( "#kamar" ).val(suggestion.kamar);
      }
  });
})
</script>



<script>
    $("#btn_simpanedit").click(function() {
        var no_daftar = $("#no_daftar").val();
        var nama_pas = $("#nama_pas").val();
        var nomor_rm = $("#nomor_rm").val();
        var tpt_lahir = $("#tpt_lahir").val();
        var tgl_lahir = $("#tlahir_pas").val();
        var nik = $("#nik").val();
        var jk_pas = $("#jk_pas").val();
        var asuransi_pas = $("#asuransi_pas").val();
        var no_bpjs = $("#no_bpjs").val();
var diagnosa_awal = $("#diagnosa_awal").val();
var dokter = $("#dokter").val();

        var kamar_asal = $("#kamar_asal").val();
        var no_bed_asal = $("#no_bed_asal").val();

        var kamar = $("#kamar").val();
        var no_bed = $("#no_bed").val();
        var tarif = $("#tarif").val();
        var kelas = $("#kelas").val();
        var kuota_asal = $("#kuota_asal").val();

        var ket = $("#ket").val();
        // alert(nama+"/"+posisi+"/"+jk+"/"+tgl_lahir+"/"+alamat+"/"+username+"/"+password);

    if(nama_pas=="") {
            document.getElementById("nama_pas").focus();
            Swal.fire(
              'Data Belum Lengkap',
              'maaf, tolong isi nama pasien',
              'warning'
            )
        } else if (asuransi_pas=="") {
            document.getElementById("asuransi_pas").focus();
            Swal.fire(
              'Data Belum Lengkap',
              'maaf, tolong isi nama petugas pasien',
              'warning'
            )

        } else if (nomor_rm=="") {
            document.getElementById("nomor_rm").focus();
            Swal.fire(
              'Data Belum Lengkap',
              'maaf, tolong isi nomor RM',
              'warning'
            )
        } else {
            Swal.fire({
              title: 'Apakah Anda Yakin?',
              text: 'anda Ingin Memindahkan Pasien ini',
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya'
            }).then((ya) => {
              if (ya.value) {
                $.ajax({
                  type: "POST",
                  url: "ajax/edit_histori_pasienku.php",
                  data: "nama_pas="+nama_pas+"&nomor_rm="+nomor_rm+"&jk_pas="+jk_pas+"&tgl_lahir="+tgl_lahir+"&tpt_lahir="+tpt_lahir+"&asuransi_pas="+asuransi_pas+"&no_bpjs="+no_bpjs+"&diagnosa_awal="+diagnosa_awal+"&dokter="+dokter+"&kamar="+kamar+"&no_bed="+no_bed+"&tarif="+tarif+"&kamar_asal="+kamar_asal+"&no_bed_asal="+no_bed_asal+"&kuota_asal="+kuota_asal+"&ket="+ket+"&no_daftar="+no_daftar,
                  success: function(hasil) {
                    if(hasil=="berhasil") {
                        Swal.fire({
                          title: 'Berhasil',
                          text: 'Pasien Berhasil dipindahkan ',
                          type: 'success',
                          confirmButtonColor: '#3085d6',
                          confirmButtonText: 'OK'
                        }).then((ok) => {
                          if (ok.value) {
                            window.location='?page=perawatan_ranap' ;
                          }
                        })
                    }else if(hasil=="gagal") {
                        Swal.fire(
                          'Gagal',
                          'Data Gagal Diubah',
                          'error'
                        )
                    }
                  }
                })  
              }
            })
        }
    });
</script>