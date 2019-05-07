<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<?php
include_once ("db.php");
include_once ("checklogin.php");
include_once ("bc.php");
error_reporting(0);
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
<!DOCTYPE html>
<html>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <p style="font-family: Futura; font-size:24px;">
<img heigh="40px" width="40px" src="images/smkk.png" alt="SMKK KULIM">
SISTEM PENGURUSAN MAKMAL ICT 1&nbsp;</p>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="mainpage.php">Home</a></li>
      <li><a href="senaraiperalatan.php">Senarai Peralatan</a></li>
      <li><a href="daftarpeminjam.php">Daftar Peminjam</a></li>
      <li><a href="carianpeminjam.php">Carian Peminjam</a></li>
	  <li><a href="options.php">Options</a></li>
	  <li><a href="logout.php" class="btn-warning">Logout (<?php echo $user;?>)</a></li>
    </ul>
  </div>
</nav>
<div style="height: 65%" class="content1">
<img style="float: left; margin: 10px;" height="auto" width="500px" src="images/makmal.jpg">
<p>
<b>SMK KULIM, "SENTIASA MAJU"</b><br>
Sekolah Menengah Kebangsaan Kulim atau nama ringkasnya SMK Kulim,sebagai Ditukar Nama Hingga 1972 Sekolah Tinggi Kulim ialah sebuah Sekolah Menengah Kebangsaan yang terletak di Jalan Lunas, Kulim, Kedah dan merupakan sekolah yang paling hebat di seluruh bandar Kulim
<br>
Pada 2009, Sekolah Menengah Kebangsaan Kulim memiliki 457 orang pelajar lelaki dan 518 orang pelajar perempuan, menjadikan jumlah keseluruhan murid seramai 975 orang. SMK Kulim mempunyai seramai 86 orang guru.
<br>&nbsp;<br>
<b>Visi</b><br>
Sekolah Menengah Kebangsaan Kulim menjadi antara sepuluh sekolah menengah yang terunggul di negeri Kedah menjelang tahun 2010
<br>&nbsp;<br>
<b>Misi</b><br>
SMK Kulim berazam dan beriltizam untuk:
Memimpin mengurus dan mentadbir sekolah dengan berkesan, cekap, dan cemerlang
Melahirkan pelajar yang berpotensi tinggi dan berdaya saing dalam bidang kokurikulum
Melahirkan pelajar yang bersahsiah mulia dan bersifat terpuji
Mewujudkan prasarana yang selamat, kondusif, dan cekap
Menjalinkan hubungan yang baik dan mesra di antara pihak sekolah dengan komuniti
</p>
</div>
<br>
<!-- Footer -->
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.1/css/mdb.min.css" rel="stylesheet">
<footer class="page-footer font-medium special-color-dark pt-3">

    <!-- Footer Elements -->
    <div class="container">
 	   
	  <div class="list-unstyled list-inline text-center">&nbsp;
    </div>
      <!-- Social buttons -->
      <ul class="list-unstyled list-inline text-center">
        <li class="list-inline-item">
          <a href="https://www.facebook.com/Smkkadmin/" class="btn-floating btn-fb mx-1">
            <i class="fab fa-facebook-f"> </i>
          </a>
        </li>
        <li class="list-inline-item">
          <a href="https://goo.gl/maps/z8vxqFihUoP2" class="btn-floating btn-tw mx-1">
            <i class="fas fa-map"> </i>
          </a>
        </li>
        <li class="list-inline-item">
          <a href="https://m.me/Smkkadmin" class="btn-floating btn-gplus mx-1">
            <i class="fab fa-facebook-messenger"></i>
          </a>
        </li>
		<li class="list-inline-item">
          <a href="tel:044892676" class="btn-floating btn-gplus mx-1">
            <i class="fas fa-phone"></i>
          </a>
        </li>
		<li class="list-inline-item">
          <a href="mailto:kea5024@moe.edu.my" class="btn-floating btn-gplus mx-1">
            <i class="fas fa-envelope"></i>
          </a>
        </li>
      </ul>
      <!-- Social buttons -->

    </div>
    <!-- Footer Elements -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">&copy; 2019 
      <a href=".">SMK KULIM</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
</body>
</html>