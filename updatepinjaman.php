<?php
include_once ("db.php");
include_once ("checklogin.php");
include_once ("bc.php");
if (isset($_POST['Id_Pinjaman'])) {
    $id_pinjaman = $_POST["Id_Pinjaman"];
    if (!empty($id_pinjaman)) {
    $target_dir = "images/";
    $ext = "png";
    $target_file = $target_dir . $id_pinjaman . "." . $ext;
    $no_kp = $_POST["No_KP"];
    $nama_murid = $_POST["Nama_Murid"];
    $kelas = $_POST["Kelas"];
    $id_alatan = $_POST["Id_Alatan"];
    $nama_alatan = $_POST["Nama_Alatan"];
    $kuantiti = $_POST["Kuantiti"];
    $tarikh_pinjam = $_POST["Tarikh_Pinjam"];
    $tarikh_hantar = $_POST["Tarikh_Hantar"];
    $sql = "SELECT * FROM student WHERE id = '$studid'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    echo "<script>alert('Duplicate data!!');
    window.location.href='daftarpeminjam.php';</script>";}
   else {
    $sqlinsert = "REPLACE INTO pinjaman(Id_Pinjaman, No_KP,Nama_Murid,Kelas,Id_Alatan,Nama_Alatan,Kuantiti,Tarikh_Pinjam,Tarikh_Hantar)
   values('$id_pinjaman','$no_kp','$nama_murid','$kelas','$id_alatan','$nama_alatan','$kuantiti','$tarikh_pinjam','$tarikh_hantar')";
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
           echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
       } else {
           echo "Sorry, there was an error uploading your file.";
       }
    if ($conn->query($sqlinsert) === TRUE) {
    echo "<script>alert('Pinjaman telah di-update');
    window.location.href='carianpeminjam.php';</script>";
    } else {
    echo "<script>alert('Insertion of data failed');
    window.location.href='carianpeminjam.php';</script>";
    }
    }
    }
}
?>