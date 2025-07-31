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


<div class="page-content">
	<div class="row">
		<div class="col-6"><h4>Form Edit Pasien Rajal</h4></div>
		<div class="col-6 text-right">
			<a href="?page=datapasien">
				<button class="btn btn-sm btn-info">Daftar Data Pasien Rajal</button>
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
                    $query_tampil = "SELECT * FROM tbl_daftarpasien WHERE no_daftar='$no_daftar'";
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
				      <input type="text" class="form-control form-control-sm" id="nik" name="nik" placeholder="masukkan NIK" autofocus="" value="<?php echo $data['nik']; ?>">

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
				    <label for="nama_pas" class="col-sm-2 col-form-label">Keluhan</label>
				    <div class="col-sm-4">
				      <textarea name="keluhan" id="keluhan" rows="2" class="form-control" placeholder="tulis keluhan pasien" style="font-size: 14px;"><?php echo $data['keluhan']; ?></textarea>

					</div>

					<label for="nomor_rm" class="col-sm-2 col-form-label" style="text-align: right;">Dokter </label>
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
				    <label for="temp" class="col-sm-2 col-form-label">Poli</label>
				    <div class="col-sm-4">


<select name="proses" id="proses" class="form-control form-control-sm" >
				      	<option value="<?php echo $data['proses']; ?>"><?php echo $data['proses']; ?></option>

                <?php
                //query menampilkan nama unit kerja ke dalam combobox
                $query    =mysqli_query($conn, "SELECT * FROM tbl_poliklinik");
                while ($data_pol = mysqli_fetch_array($query)) {
                ?>
                 <option value="<?=$data_pol['nama_poli'];?>"><?php echo $data_pol['nama_poli'];?></option>
                <?php } ?>
			      </select>

					</div>

					<label for="Status" class="col-sm-2 col-form-label" style="text-align: right;">Pekerjaan</label>
				    <div class="col-sm-4">

				      <input type="text" class="form-control form-control-sm" name="pekerjaan" id="pekerjaan" value="<?php echo $data['pekerjaan'] ?>" placeholder="pekerjaan" >



				      <input type="hidden" class="form-control form-control-sm" name="status" id="status" value ="daftar" placeholder="daftar" >


					</div>
				  </div>




				  <div class="form-group row">
<button class="btn btn-info btn-sm" id="btn_simpanedit">Simpan </button>		

				    </div>
				  </div>


<script>
	$("#btn_simpanedit").click(function() {
		var no_daftar = $("#no_daftar").val();
				var nama_pas = $("#nama_pas").val();
		var tgl_lahir = $("#tlahir_pas").val();
		var asuransi_pas = $("#asuransi_pas").val();
var dokter = $("#dokter").val();
		var no_bpjs = $("#no_bpjs").val();
		var nik = $("#nik").val();
		var diagnosa = $("#diagnosa").val();
		var proses = $("#proses").val();
		var nomor_rm = $("#nomor_rm").val();
		var goldarah = $("#goldarah").val();
		var jk_pas = $("#jk_pas").val();
		var tpt_lahir = $("#tpt_lahir").val();
		var pekerjaan = $("#pekerjaan").val();
		var istirahat = $("#istirahat").val();
		var tgl_istirahat = $("#tgl_istirahat").val();
		var keluhan = $("#keluhan").val();
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
		} else if (keluhan=="") {
			document.getElementById("keluhan").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong isi Keluhan Pasien',
			  'warning'
			)
		} else {
			Swal.fire({
	          title: 'Apakah Anda Yakin?',
	          text: 'anda Benar Mengedit Data Pasien ini',
	          type: 'warning',
	          showCancelButton: true,
	          confirmButtonColor: '#3085d6',
	          cancelButtonColor: '#d33',
	          confirmButtonText: 'Ya'
	        }).then((ya) => {
	          if (ya.value) {
	            $.ajax({
	              type: "POST",
	              url: "ajax/edit_pendaftaranpasien.php",
	              data: "nama_pas="+nama_pas+"&nik="+nik+"&jk_pas="+jk_pas+"&tgl_lahir="+tgl_lahir+"&tpt_lahir="+tpt_lahir+"&pekerjaan="+pekerjaan+"&asuransi_pas="+asuransi_pas+"&no_bpjs="+no_bpjs+"&keluhan="+keluhan+"&nomor_rm="+nomor_rm+"&dokter="+dokter+"&proses="+proses+"&goldarah="+goldarah+"&no_daftar="+no_daftar+"&istirahat="+istirahat+"&tgl_istirahat="+tgl_istirahat,
	              success: function(hasil) {
	              	if(hasil=="berhasil") {
						Swal.fire({
				          title: 'Berhasil',
				          text: 'Diagnosa Berhasil diinput ',
				          type: 'success',
				          confirmButtonColor: '#3085d6',
				          confirmButtonText: 'OK'
				        }).then((ok) => {
				          if (ok.value) {
				            window.location='?page=daftarpasien' ;
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