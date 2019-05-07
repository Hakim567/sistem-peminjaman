<?php
include_once("db.php");
include_once ("checklogin.php");
if (isset($_POST['Id_Pinjaman'])) {
 $id_pinjaman = $_POST["Id_Pinjaman"];
 if (!empty($id_pinjaman)) {
 $sql = "DELETE FROM pinjaman WHERE Id_Pinjaman = '$id_pinjaman'";
 $target_dir = "images/" . $id_pinjaman . ".png";
 unlink($target_dir);
 if ($conn->query($sql) === TRUE) {
 echo "<script>alert('Pinjaman telah dihapuskan');window.history.back();</script>";
 } else {
 echo "<script>alert('Deletion failed');
 window.location.href='mainpage.php';</script>";
 }
} 
} else {
 echo "<script>alert('Input tidak diketahui');
 window.location.href='mainpage.php';</script>";
}
?>