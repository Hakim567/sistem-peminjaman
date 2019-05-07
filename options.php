<?php 
include_once ("db.php");
include_once ("checklogin.php");
include_once ("bc.php");
$sql = "SELECT * FROM user_settings WHERE username = '$user'";
if (isset($_POST['check'])) {
	if (isset($_POST['textcolor'])) {
		$textcolor = $_POST['textcolor'];
		}
	if (isset($_POST['zoom'])) {
		$zoom = true;
		}
	$sqlinsert = "REPLACE INTO user_settings(username,textcolor,zoom)
values('$user','$textcolor','$zoom')";
	$conn->query($sqlinsert);
}
$options = "SELECT * FROM user_settings WHERE username = '$user'";
if ($conn->query($options)->fetch_assoc()["zoom"] == 1) {
	echo '<link rel="stylesheet" href="zoom.css" >';
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <p style="font-family: Futura; font-size:24px;">
<img heigh="40px" width="40px" src="images/smkk.png" alt="SMKK KULIM">
SISTEM PENGURUSAN MAKMAL ICT 1&nbsp;</p>
    <ul style="font-family: 'Century Gothic';"class="nav navbar-nav">
      <li><a href="mainpage.php">Home</a></li>
      <li><a href="senaraiperalatan.php">Senarai Peralatan</a></li>
      <li><a href="daftarpeminjam.php">Daftar Peminjam</a></li>
      <li><a href="carianpeminjam.php">Carian Peminjam</a></li>
	  <li class="active"><a href="options.php">Options</a></li>
	  <li><a href="logout.php" class="btn-warning">Logout (<?php echo $user;?>)</a></li>
    </ul>
  </div>
</nav>
<div class="content1">
<center>
<form method="post" action="options.php">
<style>
.content1 {
  margin-top: 2%;
  padding: 1px;
}

#file, #filetable {
  text-align: center;
}

#invinsible-button {
  background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
}

table, th, td {
  padding: 1px;
  border: 0px solid black;
  background-color: #2C2F33;
  color: <?php $color = $conn->query($options)->fetch_assoc()["textcolor"];
        if (isset($color)) {
      echo $color;
      }?>;
}
</style>
<table>
<tr>
  <td>
  <label for="textcolor"><h2>Text Color</h2></label></td>
</td><td>
  <script src="jscolor.js"></script>
  <input class="jscolor {hash:true}" name="textcolor" value="<?php $color=$conn->query($sql)->fetch_assoc()["textcolor"]; if (is_null($color)) { echo 'FFFFFF';} else { echo $color;}?>"></td>
</tr>
<tr>
  <td>
  <link rel="stylesheet" href="checkbox.css" >
  <label for="zoom"><h2>Zoom Function &nbsp;</h2></label></td>
</td><td>
  <label class="check">
  <input id="zoom" name="zoom" <?php if ($conn->query($sql)->fetch_assoc()["zoom"] == 1) { echo 'checked';}?> type="checkbox"/>
  <div class="box"></div>
</label>
</td>
</tr>
</table>
<link rel="stylesheet" href="buttons.css" >
<button type="submit" class="btn btn-primary btn-flat">
Update
</button>
<input type="hidden" id="check" name="check">
</center>
</form>
</div>
<div id="file" class="content1">
<h2>DATABASE MANAGEMENT</h2>
<center>
<table id="filetable">
<tr>
<td><h2><a href="export.php" style="color: #cc0000"><i class="fa fa-download"></i></a>&nbsp;EXPORT DATA</h2></td>
</tr>
<tr>
<form action="import.php" method="post" enctype="multipart/form-data">
<td><h2>IMPORT DATA<h2><h4><input style="margin-left: 105px;" type="file" name="file" id="file"></h4><h5><button type="submit" class="btn btn-primary btn-flat">Upload</button></h5></td>
<input type="hidden" name="btn-upload">
</form>
</tr>
</table>
</div>
