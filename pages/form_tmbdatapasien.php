<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a href="?page=datapasien"><i class="fas fa-briefcase-medical"></i> Data Pasien</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-align-left"></i> Form Tambah Data Pasien</li>
  </ol>
</nav>

<div class="page-content">
	<div class="row">
		<div class="col-6"><h4>Form Pasien Baru</h4></div>
		<div class="col-6 text-right">
			<a href="?page=datapasien">
				<button class="btn btn-sm btn-info">Daftar Data Pasien</button>
			</a>
		</div>
	</div>

<?php


                     $carikode = mysqli_query($conn, "SELECT MAX(id_pas) as kodeTerbesar FROM tbl_pasien ") ;
                    $datakode = mysqli_fetch_array($carikode);
 					$id_pas = $datakode['kodeTerbesar'];
 					$urutan = (int) substr($id_pas, 2, 4);
 					$urutan =$urutan+1;
 					$huruf = "";
$id_pas = $huruf . sprintf("%06s", $urutan);

?>

	<div class="form-container">
		<div class="row">
			<div class="col-md-10 offset-md-1 offset-form">
				<h6><i class="fas fa-list-alt"></i> Lengkapi form ini untuk menambah data pasien baru</h6>
				<form action="javascrip:void(0);"  autocomplete="off">
				  <div class="form-group row pt-3">
				    <label for="nama_pas" class="col-sm-3 col-form-label">Nama Pasien</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control form-control-sm" id="nama_pas" onkeyup="this.value = this.value.toUpperCase()" placeholder="masukkan nama pasien" autofocus="">
				    </div>
				  </div>
				  	  <div class="form-group row pt-3">
				    <label for="nomor_rm" class="col-sm-3 col-form-label">Nomor RM</label>
				    <div class="col-sm-9">

				      <input type="text" class="form-control form-control-sm" id="nomor_rm" value="<?php echo $id_pas; ?>" placeholder="masukkan nomor RM"  autofocus="">
				    </div>
				  </div>

				  				  	  <div class="form-group row pt-3">
				    <label for="nik" class="col-sm-3 col-form-label">NIK</label>
				    <div class="col-sm-9">

				      <input type="number" class="form-control form-control-sm" id="nik" value="" placeholder="masukkan NIK"  autofocus="">
				    </div>
				  </div>
				  <div class="form-group row pt-3">
				    <label for="jk_pas" class="col-sm-3 col-form-label">Jenis Kelamin</label>
				    <div class="col-sm-9">
				      <!-- <input type="text" class="form-control form-control-sm" id="jk_peg" placeholder="masukkan nama obat"> -->
				      <div class="form-check">
				      	<label class="form-check-label" style="font-weight: normal;">
				      		<input name="jk_pas" id="jk_pas1" type="radio" class="form-check-input" value="Laki-laki" checked=""> 
				      		Laki-laki
				      	</label>
				      </div>
                      <div class="form-check">
                    	<label class="form-check-label" style="font-weight: normal;">
                    		<input name="jk_pas" id="jk_pas2" type="radio" class="form-check-input" value="Perempuan">
                    		Perempuan
                    	</label>
                	  </div>
				    </div>
				  </div>

<div class="form-group row pt-3">
				    <label for="asuransi_pas" class="col-sm-3 col-form-label">Pendidikan</label>
				    <div class="col-sm-9">
				      <select name="pendidikan" id="pendidikan" class="form-control form-control-sm">
				      	<option value="SD">SD</option>
				      	<option value="SMP">SMP</option>
				      	<option value="SMU">SMU</option>
				      	<option value="Diploma">Diploma</option>
				      	<option value="Sarjana">Sarjana</option>
				      	<option value="Lainnya">Lainnya</option>
				      </select>
				    </div>
				  </div>



				  <div class="form-group row pt-3">
				    <label for="asuransi_pas" class="col-sm-3 col-form-label">Pekerjaan</label>
				    <div class="col-sm-9">
				      <select name="pekerjaan" id="pekerjaan" class="form-control form-control-sm">
				      	<option value="ASN">ASN</option>
				      	<option value="Karyawan">Karyawan</option>
				      	<option value="TNI/POLRI">TNI/POLRI</option>
				      	<option value="Wiraswasta">Wiraswasta</option>
				      	<option value="IRT">IRT</option>
				      	<option value="Pelajar">Pelajar</option>
				      	<option value="Lain-lain">Lain-lain</option>
				      </select>
				    </div>
				  </div>

				  <div class="form-group row pt-3">
				    <label for="goldarah" class="col-sm-3 col-form-label">Golongan Darah</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control form-control-sm" id="goldarah" placeholder="masukkan Golongan">

				    </div>
				  </div>



				  <div class="form-group row pt-3">
				    <label for="tlahir_pas" class="col-sm-3 col-form-label">Tempat Lahir</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control form-control-sm" id="tpt_lahir" placeholder="masukkan Tempat lahir">

				    </div>
				  </div>


				  <div class="form-group row pt-3">
				    <label for="tlahir_pas" class="col-sm-3 col-form-label">Tanggal Lahir</label>
				    <div class="col-sm-9">
				      <input type="date" class="form-control form-control-sm" id="tlahir_pas" placeholder="masukkan tanggal lahir pasien">
				      <small class="form-text text-muted" style="text-align: right;">bulan/tanggal/tahun</small>
				    </div>
				  </div>

				  <div class="form-group row pt-3">
				    <label for="asuransi_pas" class="col-sm-3 col-form-label">Agama</label>
				    <div class="col-sm-9">
				      <select name="agama" id="agama" class="form-control form-control-sm">
				      	<option value="Islam">Islam</option>
				      	<option value="Protestan">Protestan</option>
				      	<option value="Katolik">Katolik</option>
				      	<option value="Hindu">Hindu</option>
				      	<option value="Budha">Budha</option>
				      </select>
				    </div>
				  </div>

<div class="form-group row pt-3">
				    <label for="asuransi_pas" class="col-sm-3 col-form-label">Status Pernikahan</label>
				    <div class="col-sm-9">
				      <select name="status_nikah" id="status_nikah" class="form-control form-control-sm">
				      	<option value="Belum Menikah">Belum Menikah</option>
				      	<option value="Menikah">Menikah</option>
				      	<option value="Duda">Duda</option>
				      	<option value="Janda">Janda</option>

				      </select>
				    </div>
				  </div>

<div class="form-group row pt-3">
				    <label for="asuransi_pas" class="col-sm-3 col-form-label">Status Pernikahan</label>
				    <div class="col-sm-9">
				      <select name="negara" id="negara" class="form-control form-control-sm">
				      	<option value="WNI">WNI</option>
				      	<option value="WNA">WNA</option>
				      </select>
				    </div>
				  </div>


				  <div class="form-group row pt-3">
				    <label for="asuransi_pas" class="col-sm-3 col-form-label">Asuransi</label>
				    <div class="col-sm-9">
				      <select name="asuransi_pas" id="asuransi_pas" class="form-control form-control-sm">
				      	<option value="0">pilih Asuransi</option>
				      	<option value="BPJS Kesehatan">BPJS Kesehatan</option>
				      	<option value="Pribadi">Pribadi</option>
				      </select>
				    </div>
				  </div>

				  <div class="form-group row pt-3">
				    <label for="no_hp" class="col-sm-3 col-form-label">No BPJS</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control form-control-sm" value ="" id="no_bpjs" placeholder="masukkan nomor BPJS" autofocus="">
				    </div>
				  </div>


				  <div class="form-group row pt-3">
				    <label for="no_hp" class="col-sm-3 col-form-label">No HP</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control form-control-sm" value ="" id="no_hp" placeholder="masukkan nomor hp pasien" autofocus="">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="alm_pas" class="col-sm-3 col-form-label">Alamat </label>
				    <div class="col-sm-9">
				      <textarea name="alm_pas" id="alm_pas" rows="2" class="form-control" placeholder="masukkan alamat pasien" style="font-size: 14px;"></textarea>
				    </div>
				  </div>

				  <div class="form-group row">
				    <label for="desa" class="col-sm-3 col-form-label">Desa</label>
				    <div class="col-sm-9">

                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="desa" name="desa">
                                <input type="hidden" class="form-control form-control-sm" id="kode_id" name="kode_id">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal_datawilayah" id="lihat_data_pasien"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>

                        </div>


				  <div class="form-group row">
				    <label for="kec" class="col-sm-3 col-form-label">Kecamatan</label>
				    <div class="col-sm-9">
				      <input type="textarea" class="form-control form-control-sm" id="ke" placeholder="masukkan Kecamatan" autofocus="">
				    </div>
				  </div>

				  <div class="form-group row">
				    <label for="kab_kota" class="col-sm-3 col-form-label">Kabupaten/Kota</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control form-control-sm" id="kab_kota" placeholder="masukkan Kabupaten" autofocus="">
				    </div>
				  </div>



				  <div class="form-group row">
				    <label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
				    <div class="col-sm-9">
				    	                            <div class="input-group">
				      <input type="text" class="form-control form-control-sm" id="provinsi" placeholder="masukkan Kabupaten" autofocus="">
                      <input type="text" class="form-control form-control-sm" id="poscode" name="poscode">
				    </div>
				  </div>
</div>
<!-- 				    <div class="col-sm-9">
				      <input type="hidden" class="form-control form-control-sm" id="poscode" placeholder="masukkan Kabupaten" autofocus="">
				    </div>
 -->
	<!-- 			  <div class="form-group row">
				    <label for="kab_kota" class="col-sm-3 col-form-label">Poliklinik</label>
				    <div class="col-sm-9"> -->


<!-- <select name="poli" id="propinsi" class="form-control">
<option>--Pilih Poli--</option>
<?php
//mengambil nama-nama propinsi yang ada di database
$propinsi = mysqli_query($conn,"SELECT * FROM prov ORDER BY nama_prov");
while($p=mysqli_fetch_array($propinsi)){
echo "<option value=\"$p[id_prov]\">$p[nama_prov]</option>\n";
}
?>
</select>

				    </div>
				  </div>
 
				  <div class="form-group row">
				    <label for="provinsi" class="col-sm-3 col-form-label">Dokter</label>
				    <div class="col-sm-9">
<select name="dokte" id="kota" class="form-control">
<option>--Pilih Dokter--</option>
<?php
//mengambil nama-nama propinsi yang ada di database
$kota = mysqli_query($conn, "SELECT * FROM kabkot ORDER BY nama_kabkot");
while($p=mysqli_fetch_array($propinsi)){
echo "<option value=\"$p[id_kabkot]\">$p[nama_kabkot]</option>\n";
}
?>
</select>
 </div>
</div> -->

<!-- <div class="form-group row">
<label for="provinsi" class="col-sm-3 col-form-label">Kecamatan</label>
<div class="col-sm-9">
<select name="kec" id="kec" class="form-control">
<option>--Pilih Kecamatan--</option>
</select>
</div>
</div>
 -->




				  <div class="form-group row">
				    <div class="col-sm-12 text-right">
				      <button class="btn btn-danger btn-sm" id="btn_reset">Reset</button>
				      <button class="btn btn-info btn-sm" id="btn_simpan">Simpan</button>
				    </div>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modal_datawilayah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Wilayah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <div class="row" style="padding: 0 16px;">
            <div class="col-md-12 vertical-form">


                    <div class="row data-pengobatan">
                        <div class="position-relative form-group col-md-3">
                            <label for="kode_id" class="">Cari Nama Desa, Kecamatan (tekan Enter) </label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-sm" id="search"   >

                              </div>
                            </div>
                          </div>

                        <div class="position-relative form-group col-md-12">
                                <ul id="result"></ul>
                                
                            </div>
   
                        </div>



                </form>
      </div>
    </div>
  </div>
</div>

     <script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
//apabila terjadi event onchange terhadap object <select id=propinsi>
$("#propinsi").change(function(){
var propinsi = $("#propinsi").val();
$.ajax({
url: "wilayah/ambilkota.php",
data: "propinsi="+propinsi,
cache: false,
success: function(msg){
//jika data sukses diambil dari server kita tampilkan
//di <select id=kota>
$("#kota").html(msg);
}
});
});
$("#kota").change(function(){
var kota = $("#kota").val();
$.ajax({
url: "wilayah/ambilkecamatan.php",
data: "kota="+kota,
cache: false,
success: function(msg){
$("#kec").html(msg);
}
});
});
});
 
</script>


        <script type="text/javascript">
            $(document).ready(function(){
                 
                 function search(){

                      var desa=$("#search").val();
                       var kec=$("#search").val();
                       var kab_kota=$("#search").val();
                       var provinsi=$("#search").val();
                       var poscode=$("#search").val();

                      if(desa!=""){
                        $("#result").html("<img src='img/ajax-loader.gif'/>");
                         $.ajax({
                            type:"post",
                            url:"ajax/searchwilayah.php",
                            data:"desa="+desa+"&kec="+kec+"&kab_kota="+kab_kota+"&provinsi="+provinsi+"&poscode="+poscode,
                            success:function(data){
                                $("#result").html(data);
                                $("#search").val("");
                             }
                          });
                      }
                      

                     
                 }

                  $("#button").click(function(){
                  	 search();
                  });

                  $('#search').keyup(function(e) {
                     if(e.keyCode == 13) {
                        search();
                      }
                  });
            });
        </script>






<script>
	function reset_form() {
		$("#nama_pas").val("");
		$("#asuransi_pas").val("");
		$("#no_hp").val("");
		$("#alm_pas").val("");
				$("#nomor_rm").val("");
	}

  


	$("#btn_reset").click(function() {
		reset_form();
		document.getElementById("nama_pas").focus();
	});

	$("#btn_simpan").click(function() {
		var nama_pas = $("#nama_pas").val();
		var tgl_lahir = $("#tlahir_pas").val();
		var tpt_lahir = $("#tpt_lahir").val();
		var asuransi_pas = $("#asuransi_pas").val();
		var no_bpjs = $("#no_bpjs").val();
		var no_hp = $("#no_hp").val();
		var alm_pas = $("#alm_pas").val();
		var nomor_rm = $("#nomor_rm").val();
		var nik = $("#nik").val();
		var desa= $("#desa").val();
		var kec = $("#kec").val();
		var kab_kota = $("#kab_kota").val();
		var provinsi = $("#provinsi").val();
		var poscode = $("#poscode").val();
		var pekerjaan = $("#pekerjaan").val();
		var goldarah = $("#goldarah").val();
		
		var pendidikan = $("#pendidikan").val();
		var status_nikah= $("#status_nikah").val();
		var negara= $("#negara").val();
		var agama= $("#agama").val();
		
		var jk = document.querySelector('input[name="jk_pas"]:checked').value;

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
			  'maaf, tolong isi nama asuransi',
			  'warning'
			)
/*		} else if (no_hp=="") {
			document.getElementById("no_hp").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong isi nomor hp pasien',
			  'warning'
			)*/
				} else if (tgl_lahir=="") {
			document.getElementById("tlahir_pas").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong isi tanggal lahir Pasien',
			  'warning'
			)

		} else if (nomor_rm=="") {
			document.getElementById("nomor_rm").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong isi nomor RM',
			  'warning'
			)
		} else if (alm_pas=="") {
			document.getElementById("alm_pas").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong isi alamat pasien',
			  'warning'
			)

		} else {
			$.ajax({
				type: "POST",
				url: "ajax/simpan_pasien.php",
				data: "nama_pas="+nama_pas+"&jk="+jk+"&tpt_lahir="+tpt_lahir+"&tgl_lahir="+tgl_lahir+"&agama="+agama+"&status_nikah="+status_nikah+"&pendidikan="+pendidikan+"&pekerjaan="+pekerjaan+"&negara="+negara+"&goldarah="+goldarah+"&asuransi_pas="+asuransi_pas+"&no_bpjs="+no_bpjs+"&no_hp="+no_hp+"&alm_pas="+alm_pas+"&nomor_rm="+nomor_rm+"&nik="+nik+"&desa="+desa+"&kec="+kec+"&kab_kota="+kab_kota+"&provinsi="+provinsi+"&poscode="+poscode,
				success: function(hasil) {
					if(hasil=="berhasil") {
						Swal.fire({
				          title: 'Berhasil',
				          text: 'Data Berhasil Disimpan',
				          type: 'success',
				          confirmButtonColor: '#3085d6',
				          confirmButtonText: 'OK'
				        }).then((ok) => {
				          if (ok.value) {
				            window.location='?page=datapasien' ;
				          }
				        })
					} else if(hasil=="gagal") {
						Swal.fire(
						  'Gagal',
						  'Data Gagal Disimpan',
						  'error'
						)
					}
				}
			});
		}
	});
</script>