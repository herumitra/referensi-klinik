    <nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a href="?page=data_radiologi"><i class="fas fa-briefcase-medical"></i> Data radiologi</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-edit"></i> Form Edit Data radiologi</li>
  </ol>
</nav>
<div class="page-content">
    <div class="row">
        <div class="col-6"><h4>Form Tambah Data Poli</h4></div>
        <div class="col-6 text-right">
            <a href="?page=poli">
                <button class="btn btn-sm btn-info">Data Poli</button>
            </a>
        </div>
    </div>
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <form id="form-input">

    <?php 
  include('koneksi.php');
                   
                    $carikode = mysqli_query($conn, "SELECT MAX(id_poli) as kodeTerbesar FROM tbl_poliklinik ") ;
                    $datakode = mysqli_fetch_array($carikode);
          $id_poli = $datakode['kodeTerbesar'];
          $urutan = (int) substr($id_poli, 1, 2);
          $urutan =$urutan+1;
          $huruf = "P";
$kd_tindak = $huruf . sprintf("%02s", $urutan);


                 ?>

<div class="form-group">
                                    <label for="">Kode</label>
                                    <input type="text" id="id_poli" name="id_poli" class="form-control" value="<?php echo $kd_tindak; ?>"   >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Poli</label>
                                    <input type="text" class="form-control" id="nama_poli" name="nama_poli" placeholder="Input Nama">

                                      <input type="hidden" name="tgl_input" id="tgl_input"  class="form-control form-control-sm" value="<?php echo date('Y-m-d'); ?>">

                                </div>
    

                                <button type="submit" id="tombol-simpan" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div id="tabeldata">
                    
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
    
        <script>
            $(document).ready(function () {
                update();
            });
            $("#tombol-simpan").click(function () {
                //validasi form
                $('#form-input').validate({
                    rules: {
                        nama: {
                            required: true
                        },
                        jurusan: {
                            required: true
                        }
                    },
                    //jika validasi sukses maka lakukan
                    submitHandler: function (form) {
                        $.ajax({
                            type: 'POST',
                            url: "pages/poli/simpan_master_poli.php",
                            data: $('#form-input').serialize(),
                            success: function () {
                window.location='?page=tambah_datapoli' ;
                                
                                //setelah simpan data, update data terbaru
                                update()
                            }
                        });
                        //kosongkan form nama dan jurusan
                        document.getElementById("nama_poli").value = "";

                        return false;
                    }
                });
            });
    
            //fungsi tampil data
            function update() {
                $.ajax({
                    url: 'pages/poli/poli.php',
                    type: 'get',
                    success: function(data) {
                        $('#tabeldata').html(data);
                    }
                });
            }
        </script>
    </body>
    
    </html>