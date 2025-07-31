<?php 
	$id_ruangan = @$_GET['id'];
 ?>
 <nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a href="?page=datasupplier"><i class="fas fa-briefcase-medical"></i> Data Ruangan</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-edit"></i> Form Edit Data Ruangan</li>
  </ol>
</nav>

<div class="page-content">
	<div class="row">
		<div class="col-6"><h4>Form Edit Data Ruangan</h4></div>
		<div class="col-6 text-right">
			<a href="?page=data_radiologi">
				<button class="btn btn-sm btn-info">Daftar Data Ruangan</button>
			</a>
		</div>
	</div>
	<div class="form-container">
		<div class="row">
			<div class="col-md-6 offset-md-3 offset-form">
				<h6><i class="fas fa-list-alt"></i> Lengkapi form ini untuk mengedit data ruangan</h6>
				<form action="javascrip:void(0);"  autocomplete="off">
				  <div class="form-group row pt-3">
				    <label for="id_ruangan" class="col-sm-3 col-form-label">Kode Ruangan</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control form-control-sm" id="id_ruangan" placeholder="masukkan id_ruangan" value="<?php echo $id_ruangan; ?>" disabled="">
				    </div>
				  </div>
				  <?php 
				  	$query_tampil = "SELECT * FROM ruangan WHERE id_ruangan='$id_ruangan'";
					$sql_tampil = mysqli_query($conn, $query_tampil) or die ($conn->error);
					$data = mysqli_fetch_array($sql_tampil);
				   ?>
				  <div class="form-group row pt-3">
				    <label for="kamar" class="col-sm-3 col-form-label">Ruangan</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control form-control-sm" id="kamar" placeholder="masukkan nama ruangan" autofocus="" value="<?php echo $data['kamar']; ?>">
				    </div>
				  </div>

				  <div class="form-group row pt-3">
				    <label for="kamar" class="col-sm-3 col-form-label">No BED</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control form-control-sm" id="no_bed" placeholder="masukkan nama no Bed" autofocus="" value="<?php echo $data['no_bed']; ?>">
				    </div>
				  </div>

  				  <div class="form-group row pt-3">
				    <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control form-control-sm" id="kelas" placeholder="masukkan Kelas" autofocus="" value="<?php echo $data['kelas']; ?>">
				    </div>
				  </div>
				  <div class="form-group row pt-3">
				    <label for="tarif" class="col-sm-3 col-form-label">Tarif</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control form-control-sm" id="tarif" placeholder="masukkan tarif" autofocus="" value="<?php echo $data['tarif']; ?>">
				    </div>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-12 text-right">
				      <button class="btn btn-info btn-sm" id="btn_simpan">Simpan Perubahan</button>
				    </div>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$("#btn_simpan").click(function() {
		var id_ruangan = $("#id_ruangan").val();
		var kamar = $("#kamar").val();
		var kelas = $("#kelas").val();
		var tarif = $("#tarif").val();
		var no_bed = $("#no_bed").val();
		// alert(nama+"/"+posisi+"/"+jk+"/"+tgl_lahir+"/"+alamat+"/"+username+"/"+password);

	 if (kamar=="") {
			document.getElementById("kamar").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong isi nama ruangan',
			  'warning'
			)
		} else if (tarif=="") {
			document.getElementById("tarif").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong isi tarif',
			  'warning'
			)
		} else {
			Swal.fire({
	          title: 'Apakah Anda Yakin?',
	          text: 'anda akan merubah data ruangan ini',
	          type: 'warning',
	          showCancelButton: true,
	          confirmButtonColor: '#3085d6',
	          cancelButtonColor: '#d33',
	          confirmButtonText: 'Ya'
	        }).then((ya) => {
	          if (ya.value) {
	            $.ajax({
	              type: "POST",
	              url: "ajax/edit_ruangan.php",
	              data: "kamar="+kamar+"&no_bed="+no_bed+"&tarif="+tarif+"&kelas="+kelas+"&id_ruangan="+id_ruangan,
	              success: function(hasil) {
	              	if(hasil=="berhasil") {
						Swal.fire({
				          title: 'Berhasil',
				          text: 'Data Berhasil Diubah',
				          type: 'success',
				          confirmButtonColor: '#3085d6',
				          confirmButtonText: 'OK'
				        }).then((ok) => {
				          if (ok.value) {
				            window.location='?page=data_ruangan' ;
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