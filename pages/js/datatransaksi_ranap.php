<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-users"></i> Data Pasien</li>
  </ol>
</nav>

<div class="page-content">
  <div class="row">
    <div class="col-6" id="judul"><h4>Data Transaksi Pasien Ranap</h4></div>
    <div class="col-6 text-right">
<!--       <a href="?page=tambah_datatindakan">
        <button class="btn btn-sm btn-info">Tambah Data</button>
      </a> -->
    </div>

  </div>
  <div class="table-container">
    <table id="example" class="table table-striped display tabel-data">
      <thead>
            <tr>
            <th>No. Reg</th>
            <th>Nama Pasien</th>
            <th>Jaminan</th>
             <th>Total Bayar</th>
             <th>Total Uang</th>
             <th>Kembali</th>
              <th></th>
                </tr>
        </thead>
        <tbody>
    <?php 
    $no_daftar = @$_GET['id'];

      $query_tampil = " SELECT tbl_transaksi_ranap.*, tbl_transaksi_ranap.no_daftar, tbl_transaksi_ranap.total_penjualan, tbl_transaksi_ranap.jml_uang, tbl_transaksi_ranap.jml_kembali,  tbl_daftarpasienranap.nama_pas, tbl_daftarpasienranap.asuransi_pas FROM tbl_transaksi_ranap

                  LEFT JOIN tbl_daftarpasienranap ON tbl_transaksi_ranap.no_daftar=tbl_daftarpasienranap.no_daftar   ";


      $sql_tampil = mysqli_query($conn, $query_tampil) or die ($conn->error);
      while($data = mysqli_fetch_array($sql_tampil)) {
     ?>
        <tr>
          <td><?php echo $data['no_daftar']; ?></td>
          <td><?php echo $data['nama_pas']; ?></td>
          <td><?php echo $data['asuransi_pas']; ?></td>
          <td><?php echo $data['total_penjualan'] +$data['administrasi']; ?></td>
          <td><?php echo $data['jml_uang']; ?></td>
          <td><?php echo $data['jml_kembali']; ?></td>

          <td class="td-opsi">

<!--                           <button class="btn-transition btn btn-outline-primary btn-sm" title="edit" id="tombol_edit" name="tombol_edit" data-id="<?php echo $data['kd_tindakan']; ?>">
                              <i class="fas fa-user-edit"></i>
                          </button> -->
                        <!-- </a> -->
                        <button class="btn-transition btn btn-outline-danger btn-sm" title="hapus" id="tombol_hapus" name="tombol_hapus" data-id="<?php echo $data['no_daftar']; ?>" data-nama="<?php echo $data['nama_pas']; ?>">
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
            text: 'anda akan menghapus data '+nama+', semua data tindakan yang berkaitan dengan tindakan ini akan ikut terhapus',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
          }).then((hapus) => {
            if (hapus.value) {
              $.ajax({
                type: "POST",
                url: "ajax/hapus.php?page=transaksi_ranap",
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
                  window.location='?page=transaksi_ranap';
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
    window.location='?page=edit_datatindakan&id='+id;
  });


</script>