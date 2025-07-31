<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-users"></i> Data Pasien</li>
  </ol>
</nav>

<div class="page-content">
	<div class="row">
		<div class="col-6" id="judul"><h4>Data Riwayat Pasien Rajal</h4></div>
		<div class="col-6 text-right">
			<a href="?page=bankdata">
				<button class="btn btn-sm btn-info">Pendaftaran Pasien</button>
			</a>

			            <a href="?page=laporpasien">
                <button class="btn btn-sm btn-warning">Export</button>
            


            </a>
       <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-primary">
                  Export excel</button>

		</div>

	</div>
	<div class="table-container">
		<table id="example" class="table table-striped display tabel-data">
			<thead>
		        <tr>
		            <th>No Reg</th>
		            <th>Nama</th>
		            <th>No RM</th>
		            <th>Jenis Kelamin</th>
		            <th>Alamat</th>
		            <th>Tanggal Lahir</th>
		            <th>No HP</th>
		            <th>Tgl Daftar</th>
		            <th>Surat</th>
		            <th>Opsi</th>
		 		        </tr>
		    </thead>
		    <tbody>
		<?php 
			$query_tampil = "SELECT * FROM tbl_daftarpasien  ORDER BY tgl_daftar asC"  ;
			$sql_tampil = mysqli_query($conn, $query_tampil) or die ($conn->error);
			while($data = mysqli_fetch_array($sql_tampil)) {
		 ?>
		 		<tr>
		 			<td><?php echo $data['no_daftar']; ?></td>
		 			<td width="15%"><?php echo $data['nama_pas']; ?></td>
		 			<td><?php echo $data['nomor_rm']; ?></td>
		 			<td width="13%"><?php echo $data['jk_pas']; ?></td>
		 			<td width="20%"><?php echo $data['alm_pas']; ?></td>
		 			<td><?php echo $data['lhr_pas']; ?></td>
		 			<td><?php echo $data['no_hp']; ?></td>
		 			<td><?php echo $data['tgl_daftar']; ?></td>

<td><div class="btn-group">
								<a class="btn-transition btn btn-outline-primary btn-sm" href="#"><i class="icon-wrench icon-white"></i> Surat</a>
								<a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li> 
<a href="laporan/skruangan.php?no_daftar=<?php echo $data['no_daftar']; ?>" target="_blank">
                              <button class="btn-transition btn btn-outline-dark btn-sm" title="cetak Surat Sehat" id="tombol_cetak" name="tombol_cetak">
                                  <i class="fas fa-print"></i> Surat Sehat</a> </li>

									<li> 
<a href="laporan/skruangan_sakit.php?no_daftar=<?php echo $data['no_daftar']; ?>" target="_blank">
                              <button class="btn-transition btn btn-outline-danger btn-sm" title="cetak Surat Sakit" id="tombol_cetak" name="tombol_cetak">
                                  <i class="fas fa-print"></i> Surat Sakit </a> </li>

					
								</ul>
							</div></td>


		 			<td width="10%" class="td-opsi">



	                         

		 				<button class="btn-transition btn btn-outline-success btn-sm" title="detail pasien" id="tombol_detail" name="tombol_detail" data-toggle="modal" data-target="#detail_pasien"
		 				data-kode="<?php echo $data['no_daftar']; ?>"
		 				data-nama="<?php echo $data['nama_pas']; ?>"
		 				data-tgl="<?php echo $data['tgl_daftar']; ?>"
		 				data-keluhan="<?php echo $data['keluhan']; ?>"
		 				data-tb="<?php echo $data['tinggi_badan']; ?>"
		 				data-bb="<?php echo $data['berat_badan']; ?>"
		 				data-temp="<?php echo $data['temp']; ?>"
		 				data-diagnosa="<?php echo $data['diagnosa']; ?>"
		 				data-asuransi="<?php echo $data['asuransi_pas']; ?>">
                            <i class="fas fa-info-circle"></i>
                        </button>
	                        <button class="btn-transition btn btn-outline-primary btn-sm" title="Rekam Medis" id="tombol_rekammedis" name="tombol_rekammedis" data-id="<?php echo $data['no_daftar']; ?>">
	                            <i class="fas fa-plus-circle"></i>
	                        </button>



                    </td>
                    <?php } ?>
		 		</tr>
		 
		    </tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="detail_pasien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Info Detail Pasien</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <table class="tabel-detail-obat" style="font-size: 14px;">
        <tr>
          <th>Registrasi</th>
          <td id="det_kode"></td>
        </tr>
        <tr>
          <th>Tgl Daftar</th>
          <td id="det_tgl"></td>
        </tr>
        <tr>
          <th>Nama</th>
          <td id="det_nama"></td>
        </tr>
        <tr>
          <th>Keluhan</th>
          <td id="det_keluhan"></td>
        </tr>
        <tr>
          <th>Tinggi</th>
          <td id="det_tb"></td>
        </tr>
        <tr>
          <th>Berat Badan</th>
          <td id="det_bb"></td>
        </tr>
        <tr>
          <th>Temperatur</th>
          <td id="det_temp"></td>
        </tr>
        <tr>
          <th>Diagnosa</th>
          <td id="det_diagnosa"></td>
        </tr>

        <tr>
          <th>Asuransi</th>
          <td id="det_asuransi"></td>
        </tr>

      </table>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">tutup</button>
    </div>
  </div>
</div>
</div>






      <div class="modal fade" id="modal-primary">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Cetak Periode Tanggal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
               
<form  action="laporan/laporan_medis.php" target="_blank"  method="post">
    
<div class="col-md-8">
            <div class="form-group">
                  <label>Tanggal Awal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tanggal Akhir</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    <input type="date" name="tgl1" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>

                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" name="tgl2" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  
               </div>
               </div>
                                           <label for="asuransi_pas" class="">Asuransi </label>
                  <div class="input-group">

                            <div class="input-group input-group-sm">
 <select name="asuransi" class="form-control form-control-sm">
                <option value="0">pilih Asuransi</option>
                <option value="BPJS Kesehatan">BPJS Kesehatan</option>
                <option value="Pribadi">Pribadi</option>
              </select>

                                </div>
      
        <input type="submit" name="proses" value="proses" class="btn btn-danger">

            </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

</form>












<script>
	$("button[name='tombol_detail']").click(function(){
		var kode = $(this).data('kode');
		var nama = $(this).data('nama');
		var tgl = $(this).data('tgl');
		var keluhan = $(this).data('keluhan');
		var tb = $(this).data('tb');
		var bb = $(this).data('bb');
		var temp = $(this).data('temp');
		var diagnosa = $(this).data('diagnosa');
		var asuransi = $(this).data('asuransi');


		$("#det_kode").html(kode);
		$("#det_nama").html(nama);
		$("#det_tgl").html(tgl);
		$("#det_keluhan").html(keluhan);
		$("#det_tb").html(tb);
		$("#det_bb").html(bb);
		$("#det_temp").html(temp);
		$("#det_diagnosa").html(diagnosa);
		$("#det_asuransi").html(asuransi);


	});




	$("button[name='tombol_hapus']").click(function() {
		var id = $(this).data('id');
		var nama = $(this).data('nama');
		// alert(id);
		if(id==id_session) {
			Swal.fire({
	          title: 'Error !',
	          text: 'Anda tidak bisa menghapus data anda sendiri, mintalah admin atau manajer untuk menghapusnya',
	          type: 'error',
	          confirmButtonColor: '#3085d6',
	          confirmButtonText: 'OK'
	        }).then((baik) => {
	          if (baik.value) {

	          }
	        })
		} else {
			Swal.fire({
	          title: 'Apakah Anda Yakin?',
	          text: 'anda akan menghapus data '+nama+', semua data transaksi yang berkaitan dengan pasien ini akan ikut terhapus',
	          type: 'warning',
	          showCancelButton: true,
	          confirmButtonColor: '#3085d6',
	          cancelButtonColor: '#d33',
	          confirmButtonText: 'Ya'
	        }).then((hapus) => {
	          if (hapus.value) {
	            $.ajax({
	              type: "POST",
	              url: "ajax/hapus.php?page=datapendaftaran",
	              data: "id="+id,
	              success: function(hasil) {
	                Swal.fire({
			          title: 'Berhasil',
			          text: 'Data Berhasil Dihapus',
			          type: 'success',
			          confirmButtonColor: '#3085d6',
			          confirmButtonText: 'OK'
			        }).then((ok) => {
			          if (ok.value) {
			            window.location='?page=datapendaftaran';
			          }
			        })
	              }
	            })  
	          }
	        })
	    }
	});

	$("button[name='tombol_rekammedis']").click(function() {
		var id = $(this).data('id');
		window.location='?page=rekammedis&id='+id;
	});

	$("button[name='tombol_obatracik']").click(function() {
		var id = $(this).data('id');
		window.location='?page=entry_obatracik&id='+id;
	});

		$("button[name='tombol_tindakan']").click(function() {
		var id = $(this).data('id');
		window.location='?page=entry_tindakanpasien&id='+id;
	});
</script>