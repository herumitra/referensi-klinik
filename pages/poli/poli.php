<div class="table-container">
<table id="tabeldata" class="table table-striped display tabel-data">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Poli</th>
            <th scope="col">tgl input</th>
        </tr>
    </thead>
    <tbody>
        <?php
          include('koneksi.php');
            $no=1;
            $query=mysqli_query($conn, "SELECT * FROM tbl_poliklinik");
            while ($result=mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $result['nama_poli']; ?>
                        </td>
                        <td>
                            <?php echo $result['tgl_input']; ?>
                        </td>
                    </tr>
                <?php
            }
        ?>
    </tbody>
</table>