<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Combobox Filter Bertingkat">
    <meta name="author" content="Hakko Bio Richard">
    <link rel="icon" href="../../favicon.ico">

    <title>Contoh Membuat Combobox Bertingkat di PHP dan MySQL</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.hakkoblogs.com">ComboBox Beringkat</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://www.hakkoblogs.com">Tutorial PHP</a></li>
            <li><a href="http://www.hakkoblogs.com">Tutorial MySQL</a></li>
            <li><a href="http://www.hakkoblogs.com">Tutorial Java</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
<?php
mysql_connect("localhost","root","");
mysql_select_db("combobox_bertingkat");
?>
<div class="col-sm-4">
<form id="" method="post" action="simpan.php">
 
Pilih Provinsi :<br>
<select name="propinsi" id="propinsi" class="form-control">
<option>--Pilih Provinsi--</option>
<?php
//mengambil nama-nama propinsi yang ada di database
$propinsi = mysql_query("SELECT * FROM prov ORDER BY nama_prov");
while($p=mysql_fetch_array($propinsi)){
echo "<option value=\"$p[id_prov]\">$p[nama_prov]</option>\n";
}
?>
</select>
 
<br>Pilih Kabupaten/Kota :<br>
<select name="kota" id="kota" class="form-control">
<option>--Pilih Kabupaten/Kota--</option>
<?php
//mengambil nama-nama propinsi yang ada di database
$kota = mysql_query("SELECT * FROM kabkot ORDER BY nama_kabkot");
while($p=mysql_fetch_array($propinsi)){
echo "<option value=\"$p[id_kabkot]\">$p[nama_kabkot]</option>\n";
}
?>
</select>
 
<br>Pilih Kecamatan :<br>
<select name="kec" id="kec" class="form-control">
<option>--Pilih Kecamatan--</option>
</select><p>
<input id='' type ='submit' value='Simpan' name='' class="btn btn-sm btn-success"/>
<input type="reset" value="Batal" class="btn btn-sm btn-warning">
</form>
</div>
<div class="col-sm-8"></div><br />
<table class="table table-hover table-bordered" width='500' cellspacing='1' align='left'>
<?php
mysql_connect("localhost","root","");
mysql_select_db("combobox_bertingkat");
 
$query=mysql_query("
SELECT * FROM data
JOIN prov ON data.id_prov = prov.id_prov
JOIN kabkot ON data.id_kabkot = kabkot.id_kabkot
JOIN kec ON data.id_kec = kec.id_kec") or die (mysql_error());
?>
<tr align='center'><td>No.</td><td>Provinsi</td><td>Kabupaten/Kota</td><td>Kecamatan</td></tr>
<?php
$no="1";
while ($row=mysql_fetch_array($query))
{
$nmprov = $row['nama_prov'];
$nmkab    = $row['nama_kabkot'];
$nmkec  = $row['nama_kec'];
echo "<tr><td width='10'>";
echo "$no";
echo "</td><td>";
echo "$nmprov";
echo "</td><td>";
echo "$nmkab";
echo "</td><td>";
echo "$nmkec";
echo "</td></tr>";
$no++;
}
?>
</table>
</div>
<!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    
     <script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
//apabila terjadi event onchange terhadap object <select id=propinsi>
$("#propinsi").change(function(){
var propinsi = $("#propinsi").val();
$.ajax({
url: "ambilkota.php",
data: "propinsi="+propinsi,
cache: false,
success: function(msg){
//jika data sukses diambil dari server kita tampilkan
//di <select id=kota>
$("#kota").html(msg);
}
});
});
$("#kota").change(function(){
var kota = $("#kota").val();
$.ajax({
url: "ambilkecamatan.php",
data: "kota="+kota,
cache: false,
success: function(msg){
$("#kec").html(msg);
}
});
});
});
 
</script>
  </body>
</html>
