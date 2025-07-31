    <nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a href="?page=data_radiologi"><i class="fas fa-briefcase-medical"></i> Data Ruangan</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-edit"></i> Form Edit Data Ruangan</li>
  </ol>
</nav>
<div class="page-content">
    <div class="row">
        <div class="col-6"><h4>Form Tambah Data Ruangan</h4></div>
        <div class="col-6 text-right">
            <a href="?page=data_ruangan">
                <button class="btn btn-sm btn-info">Data Ruangan</button>
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
                   
                    $carikode = mysqli_query($conn, "SELECT MAX(id_ruangan) as kodeTerbesar FROM ruangan ") ;
                    $datakode = mysqli_fetch_array($carikode);
          $kd_radiologi = $datakode['kodeTerbesar'];
          $urutan = (int) substr($kd_radiologi, 1, 2);
          $urutan =$urutan+1;
          $huruf = "R";
$kd_tindak = $huruf . sprintf("%02s", $urutan);


                 ?>

<div class="form-group">
                                    <label for="">Kode</label>
                                    <input type="text" id="kd_radiologi" name="kd_radiologi" class="form-control" value="<?php echo $kd_tindak; ?>"   >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Ruangan</label>
                                    <input type="text" class="form-control" id="kamar" name="kamar" placeholder="Input Nama">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">No BED</label>
                                    <input type="text" class="form-control" id="no_bed" name="no_bed" placeholder="Input Kelas">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kelas</label>
                                    <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Input Kelas">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tarif</label>
                                    <input type="text" class="form-control" id="tarif" name="tarif"
                                        placeholder="Input Harga">

                                </div>
    
<div class="form-group">
                                    <label for="exampleInputPassword1">Kuota</label>
                                    <input type="text" class="form-control" id="kuota" name="kuota"
                                        placeholder="Input Kuota">

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
                            url: "pages/ruangan/simpan_master_ruangan.php",
                            data: $('#form-input').serialize(),
                            success: function () {
                window.location='?page=data_ruangan' ;
                                
                                //setelah simpan data, update data terbaru
                                update()
                            }
                        });
                        //kosongkan form nama dan jurusan
                        document.getElementById("kamar").value = "";
                        document.getElementById("kelas").value = "";
                        document.getElementById("no_bed").value = "";
                        document.getElementById("tarif").value = "";
                        document.getElementById("kuota").value = "";
                        return false;
                    }
                });
            });
    
            //fungsi tampil data
            function update() {
                $.ajax({
                    url: 'pages/ruangan/ruangan.php',
                    type: 'get',
                    success: function(data) {
                        $('#tabeldata').html(data);
                    }
                });
            }
        </script>
    </body>
    
    </html>