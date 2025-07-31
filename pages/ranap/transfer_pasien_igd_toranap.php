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
		<div class="col-6"><h4>Form Daftar Pasien Ranap</h4></div>
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

                <?php 
                    $tgl_daftar = gmdate("Y-m-d", time() + 60 * 60 * 7);
                    $hari= substr($tgl_daftar, 8, 2);
                    $bulan = substr($tgl_daftar, 5, 2);
                    $tahun = substr($tgl_daftar, 0, 4);
                    $tgl = $tahun.$bulan.$hari;
                    $carikode = mysqli_query($conn, "SELECT MAX(no_daftar) FROM tbl_daftarpasienranap WHERE tgl_daftar = '$tgl_daftar'") or die (mysql_error());
                    $datakode = mysqli_fetch_array($carikode);
                    if($datakode) {
                        $nilaikode = substr($datakode[0], 16);
                        $kode = (int) $nilaikode;
                        $kode = $kode + 1;
                        $no_daftarku = "REG/IP/".$tgl."/".str_pad($kode, 2, "0", STR_PAD_LEFT);
                    } else {
                        $no_daftarku = "REG/IP/".$tgl."/01";
                    } 
                 ?>

                <div style="text-align: right;">
                    No Daftar : <b><?php echo $no_daftarku; ?></b> <br>
                    Tanggal : <b><?php echo tgl_indo(gmdate('Y-m-d', time() + 60 * 60 * 7)); ?></b>
                </div>
                <form method="post" id="form_penjualan" autocomplete="off">
                    <div class="position-relative row form-group">
                    	<!-- <label for="no_penjualan" class="col-sm-2 col-form-label">Nomor Penjualan</label> -->
                        <div class="col-sm-3">
                        	<input name="no_daftar" id="no_daftar" placeholder="nomor daftar" type="hidden" class="form-control form-control-sm" value="<?php echo $no_daftarku; ?>">

                        	                        <div class="col-sm-3">
                        	<input name="no_daftar" id="no_daftar" placeholder="nomor daftar" type="hidden" class="form-control form-control-sm" value="<?php echo $no_daftar; ?>">

                        	 <input name="ket" id="ket" type="hidden" class="form-control form-control-sm" value="open">
                        </div>
                        </div>
                        <!-- <label for="tanggal_pjl" class="col-sm-2 col-form-label">Periode Penjualan</label> -->
                        <div class="col-sm-4">
                            <input name="tgl_daftar" id="tgl_daftar" type="hidden" class="form-control form-control-sm" value="<?php echo gmdate('Y-m-d', time() + 60 * 60 * 7); ?>">
                        </div>
                    </div>

				  <div class="form-group row pt-3">
<!-- 				    <label for="id_pas" class="col-sm-3 col-form-label">No Pasien</label> -->
				    <div class="col-sm-9">
				      <input type="hidden" class="form-control form-control-sm" id="id_pas" placeholder="masukkan nama pasien" value="<?php echo $id_pas; ?>" disabled="">
				    </div>
				  </div>
				  <?php 
				  	$query_tampil = "SELECT * FROM tbl_daftarpasien_igd WHERE no_daftar='$no_daftar'";
					$sql_tampil = mysqli_query($conn, $query_tampil) or die ($conn->error);
					$data = mysqli_fetch_array($sql_tampil);
				   ?>

 <div class="form-group row">
				    <label for="nama_pas" class="col-sm-2 col-form-label">Nama Pasien</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control form-control-sm" id="nama_pas" placeholder="masukkan nama pasien" autofocus="" value="<?php echo $data['nama_pas']; ?>">
				      <input type="hidden" class="form-control form-control-sm" id="diagnosa" placeholder="masukkan nama pasien" autofocus="" value="">

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
<!-- 				      <small class="form-text text-muted" style="text-align: right;">bulan/tanggal/tahun</small> -->
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
				    <label for="nama_pas" class="col-sm-2 col-form-label">Cara Masuk</label>
				    <div class="col-sm-4">
				      <select name="cara_masuk" id="cara_masuk" class="form-control form-control-sm">
				      	<option value="0">--Pilih --</option>
				      	<option value="Datang Sendiri">Datang Sendiri</option>
				      	<option value="Rujukan">Rujukan</option>
				      </select>

					</div>
					<label for="nomor_rm" class="col-sm-2 col-form-label" style="text-align: right;">Nomor HP</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control form-control-sm" name="no_hp" id="no_hp" placeholder="masukkan nomor hp pasien" autofocus="" value="<?php echo $data['no_hp']; ?>">

				      				      <input type="hidden" class="form-control form-control-sm" name="agama" id="agama" placeholder="masukkan nomor hp pasien" autofocus="" value="<?php echo $data['agama']; ?>">
					</div>
				  </div>


 <div class="form-group row">
				    <label for="nama_pas" class="col-sm-2 col-form-label">Asuransi</label>
				    <div class="col-sm-4">
				      <select name="asuransi_pas" id="asuransi_pas" class="form-control form-control-sm" <?php echo $data['asuransi_pas']; ?>>
				      	<option value="0">pilih Asuransi Pasien</option>
<!-- 				      	<option value="BPJS Kesehatan" <?php if($data['asuransi_pas'] == "BPJS Kesehatan") {echo "selected";} ?>>BPJS Kesehatan</option> -->
				      	<option value="Umum" <?php if($data['asuransi_pas'] == "Umum") {echo "selected";} ?>>Umum</option>
				      	<option value="Asuransi" <?php if($data['asuransi_pas'] == "Asuransi") {echo "selected";} ?>>Asuransi</option>

				      </select>

					</div>
				    <label for="nama_pas" class="col-sm-2 col-form-label" style="text-align: right;">Kunjungan</label>
				    <div class="col-sm-4">
				      <select name="kunjungan" id="kunjungan" class="form-control form-control-sm">
				      	<option value="Baru">Baru</option>
				      	<option value="Lama">Lama</option>
				      </select>
</div>
				  </div>


 <div class="form-group row">
				    <label for="nama_pj" class="col-sm-2 col-form-label">No BPJS</label>
				    <div class="col-sm-4">
				      				      <input type="text" class="form-control form-control-sm" name="no_bpjs" id="no_bpjs" placeholder="masukkan nomor BPJS" autofocus="" value="<?php echo $data['no_bpjs']; ?>">

					</div>

<!-- 				      <input type="number" class="form-control form-control-sm" name="kontak_pj" id="kontak_pj" placeholder="masukkan contact PJ" > -->

					<label for="Status" class="col-sm-2 col-form-label" style="text-align: right;">Pekerjaan</label>
				    <div class="col-sm-4">

				      <input type="text" class="form-control form-control-sm" name="pekerjaan" id="pekerjaan" value="<?php echo $data['pekerjaan'] ?>" placeholder="pekerjaan" >

				      <input type="hidden" class="form-control form-control-sm" name="status" id="status" value ="daftar" placeholder="daftar" >


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
				      <textarea name="keluhan" id="keluhan" rows="2" class="form-control" placeholder="masukkan Keluhan" style="font-size: 14px;"></textarea>

					</div>

					<label for="nomor_rm" class="col-sm-2 col-form-label" style="text-align: right;">Dokter </label>
				    <div class="col-sm-4">
<select name="dokter" id="dokter" class="form-control form-control-sm" >

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
				    <label for="nama_pj" class="col-sm-2 col-form-label">Nama Penanggung Jawab</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control form-control-sm" name="nama_pj" id="nama_pj" placeholder="masukkan Nama Penanggung Jawab" >
					</div>
					<label for="tinggi_badan" class="col-sm-2 col-form-label" style="text-align: right;">Kontak PJ</label>
				    <div class="col-sm-4">
				      <input type="number" class="form-control form-control-sm" name="kontak_pj" id="kontak_pj" placeholder="masukkan contact PJ" >
					</div>
				  </div>

 <div class="form-group row">
				    <label for="nama_pj" class="col-sm-2 col-form-label">Hubungan PJ </label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control form-control-sm" name="hubungan_pj" id="hubungan_pj" placeholder="masukkan Hubungan PJ" >
					</div>
					<label for="golongan darah" class="col-sm-2 col-form-label" style="text-align: right;">Golongan Darah</label>
				    <div class="col-sm-4">
				      <select name="goldarah" id="goldarah" class="form-control form-control-sm" <?php echo $data['goldarah']; ?>>
				      	<option value="0">pilih </option>
				      	<option value="A" <?php if($data['goldarah'] == "A") {echo "selected";} ?>>A</option>
				      	<option value="B" <?php if($data['goldarah'] == "B") {echo "selected";} ?>>B</option>
				      	<option value="AB" <?php if($data['goldarah'] == "AB") {echo "selected";} ?>>AB</option>
				      	<option value="O" <?php if($data['goldarah'] == "O") {echo "selected";} ?>>AB</option>

				      </select>

					</div>
				  </div>


<div class="form-group row">
				    <label for="kamar" class="col-sm-2 col-form-label">Ruangan</label>
				    <div class="col-sm-4">
                                <div class="input-group-append">
<input type="text" id="kamar" name="kamar" class="form-control">
<input type="hidden" class="form-control form-control-sm" id="id_ruangan" name="id_ruangan">
                                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal_databed" id="lihat_data_pasien"><i class="fas fa-search"></i></button>
                                </div>
</div> 


					<label for="no_bed" class="col-sm-2 col-form-label" style="text-align: right;">Nomor BED</label>
				    <div class="col-sm-4">

<input type="text" id="no_bed" name="no_bed"  class="form-control">


</div>
				  </div> 

 <div class="form-group row">
				    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control form-control-sm" name="kelas" id="kelas" placeholder="masukkan Deposit" >
					</div>
				  


					<label for="" class="col-sm-2 col-form-label" style="text-align: right;"> TARIF </label>

				    <div class="col-sm-4">
				      <input type="text" class="form-control form-control-sm" name="tarif" id="tarif" placeholder="masukkan Deposit" >

				      <input type="text" class="form-control form-control-sm" name="kuota" id="kuota" value="1" placeholder="masukkan Deposit" >

				      <input type="hidden" class="form-control form-control-sm" name="idruang" id="idruang" value="1" placeholder="masukkan Deposit" >

					</div>
				  </div>






				  <div class="form-group row">
				    <label id="btn_simpandaftar"  class="btn btn-success col-sm-3 form-label"> Daftar</label>

				    </div>
				  </div>




				</form>
			</div>
		</div>
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
                            data-idruang="<?php echo $data['id_ruangan']; ?>"
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
        var idruang = $(this).data('idruang');
        var nama = $(this).data('nama');
        var no_bed = $(this).data('no_bed');
        var kelas = $(this).data('kelas');
        var tarif = $(this).data('tarif');

        $("#idruang").val(idruang);
        $("#kamar").val(nama);
        $("#no_bed").val(no_bed);
        $("#kelas").val(kelas);
        $("#tarif").val(tarif);
    });
</script>



<!--     $(document).ready(function() {
      // tampilkan jumlah antrian
      $('#antrian').load('nomor-antrian/get_antrian.php');

      // proses insert data
      $('#btn_simpandaftar').on('click', function() {
        $.ajax({
          type: 'POST',                     // mengirim data dengan method POST
          url: 'nomor-antrian/insert.php',                // url file proses insert data
          success: function(result) {       // ketika proses insert data selesai
            // jika berhasil
            if (result === 'Sukses') {
              // tampilkan jumlah antrian
              $('#antrian').load('nomor-antrian/get_antrian.php').fadeIn('slow');
            }
          },
        });
      });
    });
 -->
<script>
	$("#btn_simpandaftar").click(function() {
var id_daftar = $("#id_daftar").val();
var id_pas = $("#id_pas").val();
		var no_daftar = $("#no_daftar").val();
	var tgl_daftar = $("#tgl_daftar").val();
		var nama_pas = $("#nama_pas").val();
		var nik = $("#nik").val();
		var tgl_lahir = $("#tlahir_pas").val();
		var tpt_lahir = $("#tpt_lahir").val();

		var asuransi_pas = $("#asuransi_pas").val();
		var no_bpjs = $("#no_bpjs").val();
		var no_hp = $("#no_hp").val();
		var alm_pas = $("#alm_pas").val();
		var desa = $("#desa").val();
		var kec = $("#kec").val();
		var kab_kota = $("#kab_kota").val();
		var provinsi = $("#provinsi").val();

		var nomor_rm = $("#nomor_rm").val();
				var diagnosa = $("#diagnosa").val();
		var status = $("#status").val();
		var nomor_antri = $("#number_antrian").val();
		var tinggi_badan = $("#tinggi_badan").val();
		var berat_badan = $("#berat_badan").val();
		var temp = $("#temp").val();
		var keluhan = $("#keluhan").val();
		var cara_masuk = $("#cara_masuk").val();
		var jk = $("#jk_pas").val();
		var dokter = $("#dokter").val();
		var nama_pj = $("#nama_pj").val();
		var kontak_pj = $("#kontak_pj").val();
		var hubungan_pj = $("#hubungan_pj").val();
		var kunjungan = $("#kunjungan").val();

		var goldarah = $("#goldarah").val();
		var pekerjaan = $("#pekerjaan").val();
		var proses = $("#proses").val();
		var agama = $("#agama").val();
		var ket = $("#ket").val();
	var kamar = $("#kamar").val();
		var no_bed = $("#no_bed").val();
		var tarif = $("#tarif").val();
		var kelas = $("#kelas").val();
		var kuota = $("#kuota").val();
		var idruang = $("#idruang").val();

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
		} else if (no_hp=="") {
			document.getElementById("no_hp").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong isi nomor hp petugas Pasien',
			  'warning'
			)

		} else if (cara_masuk=="") {
			document.getElementById("cara_masuk").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong isi  cara masuk',
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
			  'maaf, tolong isi alamat Pasien',
			  'warning'
			)
		} else {
			Swal.fire({
	          title: 'Apakah Anda Yakin?',
	          text: 'anda akan Mendaftarkan data Pasien ini',
	          type: 'warning',
	          showCancelButton: true,
	          confirmButtonColor: '#3085d6',
	          cancelButtonColor: '#d33',
	          confirmButtonText: 'Ya'
	        }).then((ya) => {
	          if (ya.value) {
	            $.ajax({
	              type: "POST",
	              url: "ajax/daftar_pasienranap_igd.php",
	              data: "no_daftar="+no_daftar+"&tgl_daftar="+tgl_daftar+"&nama_pas="+nama_pas+"&nik="+nik+"&jk="+jk+"&tpt_lahir="+tpt_lahir+"&tgl_lahir="+tgl_lahir+"&agama="+agama+"&pekerjaan="+pekerjaan+"&asuransi_pas="+asuransi_pas+"&no_bpjs="+no_bpjs+"&no_hp="+no_hp+"&alm_pas="+alm_pas+"&nomor_rm="+nomor_rm+"&keluhan="+keluhan+"&dokter="+dokter+"&diagnosa="+diagnosa+"&nama_pj="+nama_pj+"&kontak_pj="+kontak_pj+"&hubungan_pj="+hubungan_pj+"&kunjungan="+kunjungan+"&goldarah="+goldarah+"&nomor_antri="+nomor_antri+"&status="+status+"&cara_masuk="+cara_masuk+"&desa="+desa+"&kec="+kec+"&kab_kota="+kab_kota+"&provinsi="+provinsi+"&proses="+proses+"&id_pas="+id_pas+id_pas+"&ket="+ket+"&kamar="+kamar+"&no_bed="+no_bed+"&tarif="+tarif+"&kelas="+kelas+"&kuota="+kuota+"&idruang="+idruang,
	              success: function(hasil) {
	              	if(hasil=="berhasil") {
						Swal.fire({
				          title: 'Berhasil',
				          text: 'Data Berhasil Didaftarkan',
				          type: 'success',
				          confirmButtonColor: '#3085d6',
				          confirmButtonText: 'OK'
				        }).then((ok) => {
				          if (ok.value) {
				            window.location='?page=daftarpasien_ranap' ;
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