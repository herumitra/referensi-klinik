<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="?page=entry_datapembelian"><i class="fas fa-align-left"></i> Form Entry Data Pembelian</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-shopping-bag"></i> Data Pembelian</li>
  </ol>
</nav>

<div class="page-content">
	<div class="row">
		<div class="col-6"><h4>Data Retur Obat</h4></div>
		<div class="col-6 text-right">
      <!-- <a href="?page=form_laporanpembelian" class="btn btn-sm btn-pink">
        Buat Laporan Pembelian
      </a> -->
      <a href="?page=lapor_retur_obat" class="btn btn-sm btn-pink">
        Buat Laporan Retur Obat
      </a>
<!-- 			<a href="?page=entry_datapengajuan">
				<button class="btn btn-sm btn-info">Pengajuan Retur Obat</button>
			</a> -->
		</div>
	</div>
    <style>
        ul.nav-pills{
            padding: 12px 15px;
            /*border-bottom: 1px solid #169BB0;*/
        }
        .kotak-data-tab .nav-item{
            font-size: 12px;
            font-weight: lighter;
            padding-bottom: 5px;
            border-bottom: 1px solid #D9DADB;
            margin-right: 15px;
        }
        .kotak-data-tab .nav-link{
            color: #000000;
        }
        .kotak-data-tab .nav-link.active{
            background-color: #169BB0;
        }
        .badge-status {
            padding: 5px;
        }
    </style>
    <div class="kotak-data-tab">
    	<ul class="nav nav-pills" id="pills-tab" role="tablist">
          <?php 
            $query_lunas = "SELECT * FROM tbl_pengobatan 

            INNER JOIN tbl_pegawai ON tbl_pengobatan.id_peg = tbl_pegawai.id_peg 
            INNER JOIN tbl_farmasi ON tbl_pengobatan.no_depo = tbl_farmasi.no_depo WHERE tbl_pengobatan.status_obat = 'Retur' ORDER BY tbl_farmasi.nama_depo ASC";
            $sql_lunas = mysqli_query($conn, $query_lunas) or die ($conn->error);
            $jml_lunas = mysqli_num_rows($sql_lunas);

            $query_utang = "SELECT * FROM tbl_pengobatan 

            INNER JOIN tbl_pegawai ON tbl_pengobatan.id_peg = tbl_pegawai.id_peg 
            INNER JOIN tbl_farmasi ON tbl_pengobatan.no_depo = tbl_farmasi.no_depo WHERE tbl_pengobatan.status_obat = 'Tetap' ORDER BY tbl_pengobatan.tgl_pengobatan ASC";
            $sql_utang = mysqli_query($conn, $query_utang) or die ($conn->error);
            $jml_utang = mysqli_num_rows($sql_utang);
           ?>
          <li class="nav-item">
            <a class="nav-link active" id="dpembelian_lunas-tab" data-toggle="pill" href="#dpembelian_lunas" role="tab" aria-controls="dpembelian_lunas" aria-selected="true">Retur Obat <sup>( <?php echo $jml_lunas; ?> )</sup></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="dpembelian_utang-tab" data-toggle="pill" href="#dpembelian_utang" role="tab" aria-controls="dpembelian_utang" aria-selected="false">Pengajuan Retur <sup>( <?php echo $jml_utang; ?> )</sup></a>
          </li>

<!--           <li class="nav-item">
            <a class="nav-link" id="dpembelian_bayar-tab" data-toggle="pill" href="#dpembelian_bayar" role="tab" aria-controls="dpembelian_bayar" aria-selected="false">Bayar <sup>( <?php echo $jml_utang; ?> )</sup></a>
          </li> -->

    	</ul>
    	<div class="tab-content" id="pills-tabContent">
    	  <div class="tab-pane fade show active" id="dpembelian_lunas" role="tabpanel" aria-labelledby="dpembelian_lunas-tab">
            <div class="table-container">
                <table id="example" class="table table-striped display tabel-data">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Register</th>
                   
                            <th>No Pengobatan</th>
                            <th>Tanggal</th>
                            <th>Depo</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Opsi</th>
                            <th>Confirm</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            while($dlunas = mysqli_fetch_array($sql_lunas)) {
                         ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $dlunas['no_daftar']; ?></td>
                   
                                <td><?php echo $dlunas['no_pengobatan']; ?></td>
                                <td class="text-center"><?php echo $dlunas['tgl_pengobatan']; ?></td>
                                <td><?php echo $dlunas['nama_depo']; ?></td>
                                <td class="text-center"><?php echo $dlunas['total_penjualan']; ?></td>
                                <td class="text-center"><span class="badge badge-pill badge-success badge-status"><?php echo $dlunas['status_obat']; ?></span></td>
                                <td class="td-opsi">
                                    <button class="btn-transition btn btn-outline-primary btn-sm" title="detail obat" id="tombol_detail" name="tombol_detail" data-toggle="modal" data-target="#detail_pembelian" data-no_pengobatan="<?php echo $dlunas['no_pengobatan']; ?>" data-tgl_pengobatan="<?php echo tgl_indo($dlunas['tgl_pengobatan']); ?>" data-nama_depo="<?php echo $dlunas['nama_depo']; ?>" data-status="<?php echo $dlunas['status_obat']; ?>">
                                        <i class="fas fa-info-circle"></i>
                                    </button>
                                    <a href="laporan/nota_pembelianoke.php?no_pengobatan=<?php echo $dlunas['no_pengobatan']; ?>" target="_blank">
<!--                           <a href="laporan/nota_penjualan.php?no_pjl=<?php echo $data_pjl['no_penjualan']; ?>" target="_blank"> -->

                                      <button class="btn-transition btn btn-outline-dark btn-sm" title="cetak" id="tombol_cetak" name="tombol_cetak">
                                          <i class="fas fa-print"></i>
                                      </button>
                                    </a>
                                    <?php if($_SESSION['posisi_peg'] == 'Admin' || $_SESSION['posisi_peg'] == 'Manager' || $_SESSION['posisi_peg'] == 'Apoteker') { ?>
                                    <button class="btn-transition btn btn-outline-danger btn-sm" title="hapus" id="tombol_hapus" name="tombol_hapus" data-no_pengobatan="<?php echo $dlunas['no_pengobatan']; ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <?php } ?>
                                </td>
<td>

   <button class="btn-transition btn btn-outline-success btn-sm" title="Validasi Retur Obat" id="tombol_obat_pembelian" name="tombol_obat_pembelian" data-id="<?php echo $dlunas['no_pengobatan']; ?>">
                              <i class="fas fa-medkit"></i>
                          </button>
</td>

                            </tr>
                         <?php } ?>
                    </tbody>
                </table>
            </div>   
          </div>



    	  <div class="tab-pane fade" id="dpembelian_utang" role="tabpanel" aria-labelledby="dpembelian_utang-tab">
            <div class="table-container">
                <table id="example2" class="table table-striped display tabel-data">
                    <thead>
                        <tr>
                            <th>No</th>
<th>No Register</th>
                            <th>No Pengobatan</th>
                            <th>Tanggal</th>
                            <th>Depo</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            while($dutang = mysqli_fetch_array($sql_utang)) {
                         ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $dutang['no_daftar']; ?></td>
                                <td><?php echo $dutang['no_pengobatan']; ?></td>
                                <td class="text-center"><?php echo $dutang['tgl_pengobatan']; ?></td>
                                <td><?php echo $dutang['nama_depo']; ?></td>
                                <td class="text-center"><?php echo $dutang['total_penjualan']; ?></td>
                                <td class="text-center"><span class="badge badge-pill badge-danger badge-status"><?php echo $dutang['status_obat']; ?></span></td>

                                <td class="td-opsi">
                                    <button class="btn-transition btn btn-outline-primary btn-sm" title="detail obat" id="tombol_detail" name="tombol_detail" data-toggle="modal" data-target="#detail_pembelian" data-no_pengobatan="<?php echo $dutang['no_pengobatan']; ?>" data-tgl_pengobatan="<?php echo tgl_indo($dutang['tgl_pengobatan']); ?>" data-nama_depo="<?php echo $dutang['nama_depo']; ?>" data-status="<?php echo $dutang['status_obat']; ?>">
                                        <i class="fas fa-info-circle"></i>
                                    </button>
                                    <!-- <a href="laporan/?page=nota_pembelian&no_pengobatan=<?php echo $dutang['no_pengobatan']; ?>" target="_blank">
                                      <button class="btn-transition btn btn-outline-dark btn-sm" title="cetak" id="tombol_cetak" name="tombol_cetak">
                                          <i class="fas fa-print"></i>
                                      </button>
                                    </a>-->
                                    <button class="btn-transition btn btn-outline-success btn-sm" title="validasi" id="tombol_request" name="tombol_request" data-no_pengobatan="<?php echo $dutang['no_pengobatan']; ?>" data-nama_depo="<?php echo $dutang['nama_depo']; ?>">
                                        <i class="fas fa-check-square"></i>
                                    </button>
                                    <?php if($_SESSION['posisi_peg'] == 'Admin' || $_SESSION['posisi_peg'] == 'Manager' || $_SESSION['posisi_peg'] == 'Apoteker') { ?>
                                    <button class="btn-transition btn btn-outline-danger btn-sm" title="hapus" id="tombol_hapus" name="tombol_hapus" data-no_pengobatan="<?php echo $dutang['no_pengobatan']; ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <?php } ?>
                                </td>
                            </tr>
                         <?php } ?>
                    </tbody>
                </table>
            </div>
          </div>
    	</div>
    </div>
</div>




<div class="modal fade" id="detail_pembelian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Detail Obat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<table class="tabel-profil">
        		<tr>
        			<th>No Pengobatan</th>
        			<td id="no_pengobatandetail">PJL00001</td>
        			<th>Tanggal</th>
        			<td id="tgl_pembeliandetail">20/11/19</td>
        		</tr>
        		<tr>
        			<th>Supplier</th>
        			<td id="nm_supplierdetail">Faizal Abidin</td>
                    <th>Status</th>
                    <td id="status_pembeliandetail">Lunas</td>
        		</tr>
        	</table>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Nama Obat</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Satuan</th>
						<th>Subtotal</th>
					</tr>
				</thead>
				<tbody id="data_detailpembelian">
					<!-- diisi dengan ajax jquery -->
				</tbody>
				<tfoot>
					<tr>
						<th colspan="4" class="text-right">Total :</th>
						<th class="text-right">
							<span id="total_pembeliandetail"></span>
						</th>
					</tr>
				</tfoot>
			</table>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        </div> -->
      </div>
    </div>
</div>

<!-- tambahan  -->
        <div class="tab-pane fade" id="dpembelian_bayar" role="tabpanel" aria-labelledby="dpembelian_bayar-tab">
            <div class="table-container">
                <table id="example3" class="table table-striped display tabel-data">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Pengobatan</th>
                            <th>Tanggal</th>
                            <th>Supplier</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Jth Tempo</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                  
                    </tbody>
                </table>
            </div>
          </div>
      </div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
  $("#dpembelian_lunas-tab").click(function(){
      $("#dpembelian_lunas").show();
      $("#dpembelian_utang").hide();
      $("#dpembelian_bayar").hide();

  });
  $("#dpembelian_utang-tab").click(function(){
      $("#dpembelian_utang").show();
      $("#dpembelian_lunas").hide();
      $("#dpembelian_bayar").hide();

  });
  $("#dpembelian_bayar-tab").click(function(){
      $("#dpembelian_bayar").show();
      $("#dpembelian_lunas").hide();
      $("#dpembelian_utang").hide();
  });

});
</script>

<script>
	$("button[name='tombol_detail']").click(function() {
		var no_pengobatan = $(this).data("no_pengobatan");
		var tgl_pembelian = $(this).data("tgl_pembelian");
		var nama_supp = $(this).data("nama_supp");
        var status_byr = $(this).data("status_byr");
		$("#no_pengobatandetail").html(no_pengobatan);
		$("#tgl_pembeliandetail").html(tgl_pembelian);
		$("#nm_depodetail").html(nama_depo);
        $("#status_pembeliandetail").html(status);

		$("#data_detailpembelian").html("");
		$.ajax({
			type: "GET",
			url: "ajax/detail.php?page=pengobatanku",
			data: "no_pengobatan="+no_pengobatan,
			success : function(data) {
				// console.log(data);
				var total_pembelian = 0;
				var objData = JSON.parse(data);
				$.each(objData, function(key,val){
					// $("#data_detailpjl").append(val.nm_obat+"/"+val.hrg_jual+"/"+val.jml_jual+"/"+val.sat_jual+"/"+val.subtotal+"<br>");
					var baris_baru = '';
					baris_baru += '<tr>';
					baris_baru += 	'<td>'+val.nm_obat+'</td>';
					baris_baru += 	'<td class="text-right">'+val.hrg_beli+'</td>';
					baris_baru += 	'<td class="text-center">'+val.jml_beli+'</td>';
					baris_baru += 	'<td>'+val.sat_beli+'</td>';
					baris_baru += 	'<td class="text-right">'+val.subtotal+'</td>';
					baris_baru += '</tr>';

					total_pembelian = total_pembelian + Number(val.subtotal);
					$("#data_detailpembelian").append(baris_baru);
					$("#total_pembeliandetail").html(total_pembelian);
				})
			}
		});
	});


$("button[name='tombol_obat_pembelian']").click(function() {
    var id = $(this).data('id');
    window.location='?page=pengajuan_retur&id='+id;
  });


	$("button[name='tombol_hapus']").click(function() {
		var no_pengobatan = $(this).data("no_pengobatan");
		Swal.fire({
          title: 'Apakah Anda Yakin?',
          text: 'anda akan menghapus data pembelian '+no_pengobatan+', anda tidak dapat mengembalikan data yang telah dihapus.',
          type: 'warning',
          showCancelButton: true,
          cancelButtonColor: '#d33',
          confirmButtonColor: '#3085d6',
          cancelButtonText: 'Tidak',
          confirmButtonText: 'Hapus'
        }).then((hapus) => {
          if (hapus.value) {
            $.ajax({
              type: "POST",
              url: "ajax/hapus.php?page=datapengajuan",
              data: "id="+no_pengobatan,
              success: function(hasil) {
                Swal.fire({
		          title: 'Berhasil',
		          text: 'Data Berhasil Dihapus',
		          type: 'success',
		          confirmButtonColor: '#3085d6',
		          confirmButtonText: 'OK'
		        }).then((ok) => {
		          if (ok.value) {
		            window.location='?page=datapengajuan';
		          }
		        })
              }
            })  
          }
        })
	});

    $("button[name='tombol_request']").click(function() {
        var no_pengobatan = $(this).data("no_pengobatan");
        var nama_depo = $(this).data("nama_depo");
        Swal.fire({
          title: 'Apakah Anda Yakin?',
          text: 'anda telah Meretur No Resep '+no_pengobatan+' dengan pihak '+nama_depo+', data ini tidak dapat dirubah kembali.',
          type: 'warning',
          showCancelButton: true,
          cancelButtonColor: '#d33',
          confirmButtonColor: '#28A745',
          cancelButtonText: 'Tidak',
          confirmButtonText: 'Retur'
        }).then((lunas) => {
          if (lunas.value) {
            $.ajax({
              type: "POST",
              url: "ajax/detail.php?page=retur",
              data: "no_pengobatan="+no_pengobatan,
              success: function(hasil2) {
                Swal.fire({
                  title: 'Berhasil',
                  text: 'Retur Telah Divalidasi',
                  type: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'OK'
                }).then((ok_lunas) => {
                  if (ok_lunas.value) {
/*                    window.open("laporan/?page=nota_pengajuan&no_pengobatan="+no_pengobatan);*/
                    window.location='?page=data_retur';
                  }
                })
              }
            })  
          }
        })
    });
</script>