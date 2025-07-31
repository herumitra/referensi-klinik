<div class="table-container">
<table id="tabeldata" class="table table-striped display tabel-data">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Ruangan</th>
            <th scope="col">No Bed</th>
            <th scope="col">Kelas</th>
            <th scope="col">Tarif</th>
            <th scope="col">Kuota</th>
        </tr>
    </thead>
    <tbody>
        <?php
          include('koneksi.php');
            $no=1;
            $query=mysqli_query($conn, "SELECT * FROM ruangan");
            while ($result=mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $result['kamar']; ?>
                        </td>
                        <td>
                            <?php echo $result['no_bed']; ?>
                        </td>
                        <td>
                            <?php echo $result['kelas']; ?>
                        </td>
                        <td>
                            <?php echo $result['tarif']; ?>
                        </td>
                        <td>
                            <?php echo $result['kuota']; ?>
                        </td>

                    </tr>
                <?php
            }
        ?>
    </tbody>
</table>