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
if (isset($_POST['Id_Pinjaman'])) {
  $input = $_POST['Id_Pinjaman'];
  $sql = "select * from pinjaman WHERE Id_Pinjaman = '" . $input . "'";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    foreach($row as $key => $value) {
      ${$key} = $value;
    }
  }
} else {
 echo "<script>alert('Input tidak diketahui');
 window.location.href='carianpeminjam.php';</script>";
}
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<title>Pinjaman</title>
</head>
<style>
divv {
	position: fixed;
    bottom: 30px;
    right: 50px;
    z-index: 99;
    cursor: pointer;
}
</style>
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
      <li class="active"><a href="daftarpeminjam.php">Daftar Peminjam</a></li>
      <li><a href="carianpeminjam.php">Carian Peminjam</a></li>
	  <li><a href="options.php">Options</a></li>
	  <li><a href="logout.php" class="btn-warning">Logout (<?php echo $user;?>)</a></li>
    </ul>
  </div>
</nav>
<div class="content1">
<script>
$(document).ready(function() {
  $("#hp-Id_Alatan").bind('change', function () {
    var name = window[document.getElementById('hp-Id_Alatan').value];
    if (typeof name != "undefined") {
      document.getElementById('hp-Nama_Alatan').value = name;
    }
});
});
</script>
<img style="display:block; margin-right:auto; margin-left:auto;" id="Image" alt="Student Picture" width="200"
height="200" src="images/<?php echo $Id_Pinjaman . ".png";?>"/>
<p style="font-size:1px;">&nbsp;</p>
<form method="post" action="updatepinjaman.php" enctype="multipart/form-data">
 <table align = "center" border="0" >
 <tr>
 <td><label for="Image">Image</label></td>
 <td><input type="file" accept="image/*" name="fileToUpload" id="fileToUpload" onchange="document.getElementById('Image').src =
window.URL.createObjectURL(this.files[0])"></td>
 </tr>
 <tr>
 <td><label for="No_KP">ID Pinjaman&nbsp;</label></td>
 <td>
 <input readonly type="number" name="Id_Pinjaman" id="Id_Pinjaman" value="<?php echo $Id_Pinjaman;?>" required>
</td>
 </tr>
 <tr>
 <td><label for="No_KP">No Kad Pengenalan&nbsp;</label></td>
 <td><input type="text" name="No_KP" id="No_KP" value="<?php echo $No_KP?>" required>
</td>
 </tr>
 <tr>
 <td><label for="Nama_Murid">Nama Murid</label></td>
 <td><input type="text" name="Nama_Murid" id="Nama_Murid" value="<?php echo $Nama_Murid?>" required>
</td>
 </tr>
 <tr>
 <td><label for="Kelas">Kelas Murid</label></td>
 <td><input type="text" name="Kelas" id="Kelas" value="<?php echo $Kelas?>" required>
</td>
 </tr>
 <tr>
 <td><label for="Id_Alatan">ID Alatan</label></td>
 <td>
 <input name="Id_Alatan" id= "hp-Id_Alatan" list="Id_Alatan" value="<?php echo $Id_Alatan?>" required>
 <datalist id="Id_Alatan">
<?php
$sql = "SELECT Id_Alatan FROM alatan";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()){
foreach($row as $key => $value){
echo "<option value='$value'>";}
}
?>
</datalist>
</td>
 </tr>
 <tr>
 <td><label for="Nama_Alatan">Nama Alatan</label></td>
 <td>
 <input name="Nama_Alatan" id= "hp-Nama_Alatan" list="Nama_Alatan" value="<?php echo $Nama_Alatan?>" required>
 <datalist id="Nama_Alatan">
 <?php
 $sql = "SELECT DISTINCT Nama_Alatan FROM alatan";
 $result = $conn->query($sql);
 while ($row = $result->fetch_assoc()){
 foreach($row as $key => $value){
 echo "<option value='$value'>";}
 }
 $conn->close();
 ?>
</datalist>
</td>
 </tr>
 <tr>
 <td><label for="Kuantiti">Kuantiti</label></td>
 <td><input type="number" name="Kuantiti" id="Kuantiti" value="<?php echo $Kuantiti?>" required>
</td>
 </tr>
 <tr>
 <td><label for="Tarikh_Pinjam">Tarikh Pinjam</label></td>
 <td><input type="date" name="Tarikh_Pinjam" id="Tarikh_Pinjam" value="<?php echo $Tarikh_Pinjam?>" required>
</td>
 </tr>
 <tr>
 <td><label for="Tarikh_Hantar">Tarikh Hantar</label></td>
 <td><input type="date" name="Tarikh_Hantar" id="Tarikh_Hantar" value="<?php echo $Tarikh_Hantar?>" required>
</td>
 </tr>
 </table>
 <link rel="stylesheet" href="buttons.css" >
 <button style="color: #FFFFFF; margin:5px auto; width:120px; display:block;" type="submit" class="btn btn-primary btn-flat">
 Update
 </button>
 </form>
<br>
</div>
<br>
</body>
</html>