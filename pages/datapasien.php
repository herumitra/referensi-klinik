<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-users"></i> Data Pasien</li>
  </ol>
</nav>

<div class="page-content">
	<div class="row">
		<div class="col-6" id="judul"><h4>Data Pasien</h4></div>
		<div class="col-6 text-right">
			<a href="?page=tambah_datapasien">
				<button class="btn btn-sm btn-info">Tambah Data</button>
			</a>
		</div>

	</div>
	<div class="table-container">
		<table id="example" class="table table-striped display tabel-data">
			<thead>
		        <tr>
		            <th>ID</th>
		            <th>Nama</th>
		            <th>No RM</th>
		            <th>No RMA</th>
		            <th>Jenis Kelamin</th>
		            <th>Alamat</th>
		            <th>Tanggal Lahir</th>
		            <th>No HP</th>
		            <th>Opsi</th>
		 		        </tr>
		    </thead>
		    <tbody>
		<?php 
			$query_tampil = "SELECT * FROM tbl_pasien";
			$sql_tampil = mysqli_query($conn, $query_tampil) or die ($conn->error);
			while($data = mysqli_fetch_array($sql_tampil)) {
		 ?>
		 		<tr>
		 			<td><?php echo $data['id_pas']; ?></td>
		 			<td><?php echo $data['nama_pas']; ?></td>
		 			<td><?php echo $data['nomor_rm']; ?></td>
		 			<td><?php echo $data['nomor_rma']; ?></td>
		 			<td width="13%"><?php echo $data['jk_pas']; ?></td>
		 			<td width="30%"><?php echo $data['alm_pas']; ?></td>
		 			<td><?php echo $data['lhr_pas']; ?></td>
		 			<td><?php echo $data['no_hp']; ?></td>

		 			<td class="td-opsi">
                        <!-- <button class="btn-transition btn btn-outline-success btn-sm" title="lihat detail" id="tombol_detail">
                            <i class="fas fa-info-circle"></i>
                        </button> -->
                        <!-- <a href="?page=edit_datapasien&id=<?php echo $data['id_peg']; ?>"> -->
	                        <!-- <button class="btn-transition btn btn-outline-primary btn-sm" title="edit" id="tombol_edit"> -->
                    <button class='btn-transition btn btn-outline-primary btn-sm' title='daftar' id='tombol_daftar' name='tombol_daftar' data-id="<?php echo $data['id_pas']; ?>">
daftar
                    </button>

	                        <button class="btn-transition btn btn-outline-primary btn-sm" title="edit" id="tombol_edit" name="tombol_edit" data-id="<?php echo $data['id_pas']; ?>">
	                            <i class="fas fa-user-edit"></i>
	                        </button>
                        <!-- </a> -->
                        <button class="btn-transition btn btn-outline-danger btn-sm" title="hapus" id="tombol_hapus" name="tombol_hapus" data-id="<?php echo $data['id_pas']; ?>" data-nama="<?php echo $data['nama_pas']; ?>">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                    <?php } ?>
		 		</tr>
		 
		    </tbody>
		</table>
	</div>
</div>

<script>
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
	              url: "ajax/hapus.php?page=pasien",
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
			            window.location='?page=datapasien';
			          }
			        })
	              }
	            })  
	          }
	        })
	    }
	});

	$("button[name='tombol_edit']").click(function() {
		var id = $(this).data('id');
		window.location='?page=edit_datapasien&id='+id;
	});

	 $("button[name='tombol_daftar']").click(function() {
        var id = $(this).data('id');
        window.location='?page=daftar_pasien&id='+id;
    });
</script>