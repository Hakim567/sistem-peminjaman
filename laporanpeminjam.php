<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<?php
include_once ("db.php");
include_once ("checklogin.php");
include_once ("bc.php");
$options = "SELECT * FROM user_settings WHERE username = '$user'";
if ($conn->query($options)->fetch_assoc()["colourblind"] == 1) {
	echo '<link rel="stylesheet" href="bccolourblind.css" >';
} else {
	echo '<link rel="stylesheet" href="bc.css" >';
}
if ($conn->query($options)->fetch_assoc()["zoom"] == 1) {
	echo '<link rel="stylesheet" href="zoom.css" >';
}
if (isset($_GET['input'])) {
 $input = $_GET['input'];
} else {
 echo "<script>alert('Input tidak diketahui');
 window.location.href='carianpeminjam.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
@media screen
{
    .noPrint{}
    .noScreen{display:none;}
}

@media print
{
    .noPrint{display:none;}
    .noScreen{}
}
</style>
<script>
function printInfo(ID_Pinjaman, No_KP, Nama_Murid, Kelas, Id_Alatan, Nama_Alatan, Kuantiti, Tarikh_Pinjam, Tarikh_Hantar) {
  var check = document.getElementById('Print');
  if (check){
	  check.parentNode.removeChild(check);
  }
  var div = document.createElement('div');
  div.className = "noScreen";
  div.setAttribute('id', 'Print');
  div.innerHTML = `
    <center>
	<img style="margin: 2px;" heigh="250px" width="250px" src="images/${ID_Pinjaman}.png">
	<div style="font-family: Helvetica; font-size: 30px;">
	<br>
	ID Pinjaman: ${ID_Pinjaman}
	<br>
	No KP: ${No_KP}
	<br>
	Nama Murid: ${Nama_Murid}
	<br>
	Kelas: ${Kelas}
	<br>
	Id Alatan: ${Id_Alatan}
	<br>
	Nama Alatan: ${Nama_Alatan}
	<br>
	Kuantiti: ${Kuantiti}
	<br>
	Tarikh Pinjaman: ${Tarikh_Pinjam}
	<br>
	Tarikh Hantar: ${Tarikh_Hantar}
	</div>
	<center>
	<h5 style="float: right;">&copy; SMK KULIM 2019</h5>
	`;
  document.body.appendChild(div);
  window.print();
  return true;
}
</script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <p style="font-family: Futura; font-size:24px;">
<img heigh="40px" width="40px" src="images/smkk.png" alt="SMKK KULIM">
SISTEM PENGURUSAN MAKMAL ICT 1&nbsp;</p>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="mainpage.php">Home</a></li>
      <li><a href="senaraiperalatan.php">Senarai Peralatan</a></li>
      <li><a href="daftarpeminjam.php">Daftar Peminjam</a></li>
      <li class="active"><a href="carianpeminjam.php">Carian Peminjam</a></li>
	  <li><a href="options.php">Options</a></li>
	  <li><a href="logout.php" class="btn-warning">Logout (<?php echo $user;?>)</a></li>
    </ul>
  </div>
</nav>
<div class="content1">
<p><h1 align = "center" >LAPORAN PINJAMAN MAKMAL ICT 1</h1></p>
<div>
<?php
 if (isset($_GET['types'])) {
	if(!empty($input)) {
		if($_GET['types'] == "nokp") {
			$sql = "SELECT * FROM pinjaman WHERE No_KP = '$input'";	
		} elseif($_GET['types'] == "idalatan") {
			$sql = "SELECT * FROM pinjaman WHERE Id_Alatan = '$input'";
		} elseif($_GET['types'] == "idpinjaman") {
			$sql = "SELECT * FROM pinjaman WHERE Id_Pinjaman = '$input'";
		}
	} else {
		$sql = "SELECT * FROM pinjaman";
	}
 }
$result = $conn->query($sql);
if ($result->num_rows > 0){
echo '<table style="text-align: center;" id="alatan" cellpadding="1" cellspacing="1" class="dbtable noPrint">';
echo '<tr><th>Image</th><th>ID Pinjaman</th><th>No KP</th><th>Nama Murid</th><th>Kelas</th><th>Id Alatan</th><th>Nama Alatan</th><th>Kuantiti</th><th>Tarikh Pinjam</th><th>Tarikh Hantar</th><th>Operasi</th></tr>';
while ($row = $result->fetch_assoc()){
echo '<tr>';
foreach($row as $key => $value){
${$key} = $value;
	if ($key == 'Id_Pinjaman') {
		echo '<td>', '<img heigh="100px" width="100px" src="images/', $value, '.png" alt="', $value, '">', '</td>';
	}
echo '<td>', $value, '</td>';}
echo '<td><form style="display:inline" method="post" action="deletepinjaman.php">';
echo '<input type="hidden" name="Id_Pinjaman';
echo '" value="';
echo $Id_Pinjaman;
echo '">';
echo '<input class="btn btn-danger" type="submit" value="Delete">&nbsp;</form>';
echo '<input class="btn btn-success" type="button" onclick="printInfo(', "'", $Id_Pinjaman, "'", ', ', "'", $No_KP, "'", ', ', "'", $Nama_Murid, "'", ', ', "'", $Kelas, "'", ', ', "'", $Id_Alatan, "'", ', ', "'", $Nama_Alatan, "'", ', ', "'", $Kuantiti, "'", ', ', "'", $Tarikh_Pinjam, "'", ', ', "'", $Tarikh_Hantar, "'", ');" value="Print"';
echo '<td>&nbsp;<form style="display:inline" method="post" action="kemaskinipinjaman.php">';
echo '<input type="hidden" name="Id_Pinjaman';
echo '" value="';
echo $Id_Pinjaman;
echo '">';
echo '<input class="btn btn-info" type="submit" value="Kemaskini"></form>';
echo '</td>';
echo '</tr>';
}
}
echo '</table>';
echo '<br>';
$conn->close();
?>
</div>
</div>
</body>
</html>