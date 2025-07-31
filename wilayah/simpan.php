<?php
mysql_connect("localhost","root","");
mysql_select_db("combobox_bertingkat");
$propinsi=$_POST['propinsi'];
$kota=$_POST['kota'];
$kec=$_POST['kec'];
 
$masuk = mysql_query ("
insert into data (id_prov,id_kabkot,id_kec) values ('$propinsi', '$kota', '$kec')");
if ($masuk){
echo '<script language="javascript">alert("Berhasil")</script>';
echo '<script language="javascript">window.location = "index.php"</script>';
} else {
echo '<script language="javascript">alert("Data gagal disimpan")</script>';
echo '<script language="javascript">window.location = "index.php"</script>';
}
?>