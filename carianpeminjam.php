<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<?php
include_once("db.php");
include_once ("checklogin.php");
include_once ("bc.php");
$options = "SELECT * FROM user_settings WHERE username = '$user'";
if ($conn->query($options)->fetch_assoc()["zoom"] == 1) {
	echo '<link rel="stylesheet" href="zoom.css" >';
}
?>
<html>
<head>
<title>Carian Peminjam</title>
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
<center>
<p><h2 align = "center" >Sila Masukkan Id Pinjaman, No Kad Pengenalan atau Id Alatan</h2></p>
<form method="get" action="laporanpeminjam.php" >
<div class="buttons">
<input type="text" name="input" id="input">
<select name="types">
  <option value="idpinjaman">Id Pinjaman</option>
  <option value="nokp">No Kad Pengenalan</option>
  <option value="idalatan">Id Alatan</option>
</select>
</div>
<link rel="stylesheet" href="buttons.css" >
<button style="margin:5px" type="submit" class="btn btn-primary btn-flat">
&nbsp;&nbsp;Cari&nbsp;&nbsp;
</button>
 </form>
 </center>
<style>
.content1 {
  margin-top: 20%
}

form {
  color: #333333;
}

.buttons {
	margin-top: 8px
}
</style>
</div>
</body>
</html>