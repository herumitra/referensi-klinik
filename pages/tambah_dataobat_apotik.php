<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a href="?page=dataobat"><i class="fas fa-capsules"></i> Data Obat</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-align-left"></i> Form Tambah Data Obat</li>
  </ol>
</nav>

<div class="page-content">
	<div class="row">
		<div class="col-6"><h4>Form Tambah Data Obat</h4></div>
		<div class="col-6 text-right">
			<a href="?page=data_obat_apotik">
				<button class="btn btn-sm btn-info">Daftar Data Obat</button>
			</a>
		</div>
	</div>
	<div class="form-container">
		<div class="row">
			<div class="col-md-6 offset-md-3 offset-form">
				<h6><i class="fas fa-list-alt"></i> Lengkapi form ini untuk menambah data obat baru</h6>
				<form action="javascrip:void" autocomplete="off">
				  <div class="form-group row pt-3">
				    <label for="ip_kdobat" class="col-sm-3 col-form-label">Kode Obat</label>
				    <div class="col-sm-9">
				    	 <div class="input-group">
                                      <input type="text" class="form-control form-control-sm" name="kode_obat" id="kode_obat">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal_dataobat" id="lihat_data_obat"><i class="fas fa-search"></i></button>
                                        </div>
 
				    </div>
				  </div>
				  <div class="form-group row pt-3">
				    <label for="ip_kdobat" class="col-sm-3 col-form-label">Kode Obat</label>

                                    				    <div class="col-sm-9">
				    	 <div class="input-group">

                                    <input name="nm_obat" id="nm_obat" placeholder="" type="text" class="form-control form-control-sm" disabled="">
                                </div>

				  </div>
				  <div class="form-group row pt-3">
				    <label for="ip_kdobat" class="col-sm-3 col-form-label">Satuan Obat</label>

                                    				    <div class="col-sm-9">
				    	 <div class="input-group">

                                    <input name="sat_obat" id="sat_obat" placeholder="" type="text" class="form-control form-control-sm" disabled="">
                                </div>

				  </div>
				  <div class="form-group row pt-3">
				    <label for="ip_kdobat" class="col-sm-3 col-form-label">Hrg Satuan Obat</label>

                                    				    <div class="col-sm-9">
				    	 <div class="input-group">

                                    <input id="hrg_obat" name="hrg_obat" placeholder="" type="text" class="form-control form-control-sm" disabled="">
                                </div>
				  </div>
				  <div class="form-group row pt-3">
				    <label for="ip_kdobat" class="col-sm-3 col-form-label">Harga Beli Obat</label>

                                    				    <div class="col-sm-9">
				    	 <div class="input-group">

                                    <input id="hrgbeli_obat" name="hrgbeli_obat" placeholder="" type="text" class="form-control form-control-sm" disabled="">
                                </div>


				  </div>
				  <div class="form-group row pt-3">
				    <label for="ip_kdobat" class="col-sm-3 col-form-label">Expired Obat</label>

                                    				    <div class="col-sm-9">
				    	 <div class="input-group">

                                    <input id="exp_obat" name="exp_obat" placeholder="" type="text" class="form-control form-control-sm" disabled="">
                                </div>

				  </div>
				  <div class="form-group row pt-3">
				    <label for="ip_kdobat" class="col-sm-3 col-form-label">Kategori Obat</label>

                                    				    <div class="col-sm-9">
				    	 <div class="input-group">

                                    <input id="ktg_obat" name="ktg_obat" placeholder="" type="text" class="form-control form-control-sm" disabled="">
                                </div>

				  </div>
				  <div class="form-group row pt-3">
				    <label for="ip_kdobat" class="col-sm-3 col-form-label">Bentuk Obat</label>

                                    				    <div class="col-sm-9">
				    	 <div class="input-group">

                                    <input id="bnt_obat" name="bnt_obat" placeholder="" type="text" class="form-control form-control-sm" disabled="">
                                </div>

				  </div>
				  <div class="form-group row pt-3">
				    <label for="ip_kdobat" class="col-sm-3 col-form-label">Stok Obat</label>

    				    <div class="col-sm-9">
				    	 <div class="input-group">

                                    <input id="stk_obat" name="stk_obat" placeholder="" type="text" class="form-control form-control-sm" >
                                </div>

				  </div>
				  <div class="form-group row pt-3">
				    <label for="ip_kdobat" class="col-sm-3 col-form-label">Minimal Stok</label>

    				    <div class="col-sm-9">
				    	 <div class="input-group">

                                    <input id="minstk_obat" name="minstk_obat" placeholder="" type="text" class="form-control form-control-sm" >
                                </div>

				  </div>
				  <div class="form-group row pt-3">
				    <label for="ip_kdobat" class="col-sm-3 col-form-label">status</label>

    				    <div class="col-sm-9">
				    	 <div class="input-group">

                                    <input id="status" name="status" placeholder="" type="text" class="form-control form-control-sm" >

                                    <input id="lokasi" name="lokasi" placeholder="" type="hidden" class="form-control form-control-sm" >
                                </div>


                                </div>

							</div>
						</div>
					</div>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-12 text-right">
				      <button class="btn btn-info btn-sm" id="simpan_obat" name="simpan_obat" >Simpan</button>
				    </div>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modal_dataobat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="tabel_dataobat" class="table table-striped display">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Obat</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Kategori</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
        <?php 
            $query_tampil = "SELECT * FROM tbl_dataobat ORDER BY nm_obat ASC";
            $sql_tampil = mysqli_query($conn, $query_tampil) or die ($conn->error);
            while($data = mysqli_fetch_array($sql_tampil)) {
         ?>
                <tr>
                    <td><?php echo $data['kd_obat']; ?></td>
                    <td><?php echo $data['nm_obat']; ?></td>
                    <td><?php echo $data['hrgbeli_obat']; ?></td>
                    <td><?php echo $data['stk_obat']; ?></td>
                    <td><?php echo $data['sat_obat']; ?></td>
                    <td><?php echo $data['ktg_obat']; ?></td>
                    <td><?php echo $data['exp_obat']; ?></td>
                    <td class="td-opsi">
                        <button class="btn-transition btn btn-outline-dark btn-sm" title="pilih" id="tombol_pilihobat" name="tombol_pilihobat" data-dismiss="modal"
                            data-kode="<?php echo $data['kd_obat']; ?>"
                            data-nama="<?php echo $data['nm_obat']; ?>"
                            data-harga="<?php echo $data['hrgbeli_obat']; ?>"
                            data-satuan="<?php echo $data['sat_obat']; ?>"
                            data-exp="<?php echo $data['exp_obat']; ?>"
                            data-kategori="<?php echo $data['ktg_obat']; ?>"
             data-bentuk="<?php echo $data['bnt_obat']; ?>"
             data-jual="<?php echo $data['hrg_obat']; ?>"
                        >
                            pilih
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
	$("#ip_stobat").change(function() {
		var satuan = $("#ip_stobat").val();
		if(satuan=="0")
		{
			satuan = "Satuan";
		}
		$(".u_satuan").text(satuan);
	});


    $("button[name='tombol_pilihobat']").click(function() {

        var kode = $(this).data("kode");
        var nama = $(this).data("nama");
        // var exp = $(this).data("expired");
        var jual = $(this).data("jual");
        var hrg = $(this).data("harga");
        var satuan = $(this).data("satuan");
        var exp = $(this).data("exp");
        var kategori = $(this).data("kategori");
        var bentuk = $(this).data("bentuk");

        $("#kode_obat").val(kode);
        $("#nm_obat").val(nama);
        // $("#tgl_exp").val(exp);
        $("#jml_obat").val(1);
        $("#hrgbeli_obat").val(hrg);
        $("#hrg_obat").val(jual);
        $("#sat_obat").val(satuan);
        $("#exp_obat").val(exp);
        $("#ktg_obat").val(kategori);
        $("#bnt_obat").val(bentuk);
    });


	$("#simpan_obat").click(function(){
		var kode = $("#kode_obat").val();
		var nama = $("#nm_obat").val();
		var exp = $("#exp_obat").val();
		var ktg = $("#ktg_obat").val();
		var bentuk = $("#bnt_obat").val();
		var satuan = $("#sat_obat").val();
		var jual = $("#hrg_obat").val();
		var harga = $("#hrgbeli_obat").val();
		var stok = $("#stk_obat").val();
		var min_stok = $("#minstk_obat").val();
		var status = $("#status").val();
		var lokasi = $("#lokasi").val();

		if(kode=="") {
			document.getElementById("kode_obat").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong isi kode obat',
			  'warning'
			)
		} else if (nama=="") {
			document.getElementById("nm_obat").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong isi nama obat',
			  'warning'
			)
/*		} else if (exp=="") {
			document.getElementById("ip_expobat").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong isi tanggal kadaluarsa obat',
			  'warning'
			)*/
		} else if (ktg=="") {
			document.getElementById("ktg_obat").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong pilih kategori obat',
			  'warning'
			)
		} else if (bentuk=="") {
			document.getElementById("bnt_obat").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong pilih bentuk obat',
			  'warning'
			)

/*		} else if (harga=="" || harga<=0) {
			document.getElementById("ip_hrgobat").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong isi harga obat',
			  'warning'
			)
		} else if (stok=="" || stok<=0) {
			document.getElementById("ip_stokobat").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong isi jumlah stok obat',
			  'warning'
			)*/

		} else {
			$.ajax({
				type: "POST",
				url: "ajax/simpan_obat_apotik.php",
				data: "nama="+nama+"&kode="+kode+"&exp="+exp+"&ktg="+ktg+"&bentuk="+bentuk+"&satuan="+satuan+"&jual="+jual+"&harga="+harga+"&stok="+stok+"&min_stok="+min_stok+"&status="+status+"&lokasi="+lokasi,
				success: function(hasil) {
					if(hasil=="tersimpan") {
						Swal.fire({
				          title: 'Berhasil',
				          text: 'Data Berhasil Disimpan',
				          type: 'success',
				          confirmButtonColor: '#3085d6',
				          confirmButtonText: 'OK'
				        }).then((ok) => {
				          if (ok.value) {
				            window.location='?page=tambah_dataobat_apotik';
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
	})
</script>