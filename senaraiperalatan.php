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
?>
<html>
<head>
<title>Senarai Alatan</title>
<style>
.last {
	position: fixed;
    bottom: 30px;
    right: 50px;
    z-index: 99;
    cursor: pointer;
}
</style>
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
      <li class="active"><a href="senaraiperalatan.php">Senarai Peralatan</a></li>
      <li><a href="daftarpeminjam.php">Daftar Peminjam</a></li>
      <li><a href="carianpeminjam.php">Carian Peminjam</a></li>
	  <li><a href="options.php">Options</a></li>
	  <li><a href="logout.php" class="btn-warning">Logout (<?php echo $user;?>)</a></li>
    </ul>
	</div>
</div>
</nav>
<div class="content1">
<?php
$sql = "SELECT * FROM alatan";
$result = $conn->query($sql);
if ($result->num_rows > 0){
echo '<table style="text-align: center;" id="alatan" cellpadding="1" cellspacing="1" class="dbtable">';
echo '<tr><th>Image</th><th>ID Alatan</th><th>Nama Alatan</th><th>Bilangan Sedia<br>&nbsp;&nbsp;&nbsp;Digunakan</th></tr>';
while ($row = $result->fetch_assoc()){
echo '<tr>';
foreach($row as $key => $value){
	if ($key == 'Id_Alatan') {
		$id = $value;
		echo '<td>', '<img height="140px" width="140px" src="images/', $value, '.png" alt="', $value, '">', '</td>';
	}
	if ($key == 'Kuantiti') {
		$kuantiti = "SELECT * FROM pinjaman WHERE Id_Alatan = '$id'";
		$resultt = $conn->query($kuantiti);
		$final = $value;
		while ($roww = $resultt->fetch_assoc()){
			foreach($roww as $keyy => $valuee){
				if ($keyy == 'Kuantiti') {
					$num = (int)$valuee;
					$final = $final - $num;
				}
			}
		} echo '<td>', $final, '/', $value, '</td>';
	} else {
	echo '<td>', $value, '</td>';}
}
echo '</tr>';
echo '</div>';
}
}
echo '</table>';
$conn->close();
?>
</div>
<br>
</body>
</html>