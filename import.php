<!-- bahagian mendapatkan data dari fail dan menyimpanya dalam jadual ahli mula ------------------ -->
<?PHP
//menguji kewujudan fail yang di POST
if (isset($_POST['btn-upload']))
{
    //memanggil fail connection
    include('db.php');

    $namafailsementara=$_FILES["file"]["tmp_name"];
    //mengambil nama fail

    $namafail=$_FILES['file']['name'];
    //mengambil jenis fail
    $jenisfail=pathinfo($namafail,PATHINFO_EXTENSION);
    
    //menguji jenis fail dan saiz fail
    if($_FILES["file"]["size"]>0 AND $jenisfail=="txt")
    {
           //membuka fail yang diambil
           $failyangdataingindiupload=fopen($namafailsementara,"r");

           //mendapatkan datafail
           while (!feof($failyangdataingindiupload)) 
                {   
                    //mengambil data sebaris sahaja bg setiap pusingan
                    $ambilbarisdata = fgets($failyangdataingindiupload);

                    //memecahkan baris data mengikut tanda koma
                    $pecahkanbaris = explode("|",$ambilbarisdata);

                    //selepas pecahan tadi akan diumpukan kepada 3 pemboleh ubah
                    list($Id_Pinjaman,$No_KP,$Nama_Murid,$Kelas,$Id_Alatan,$Nama_Alatan,$Kuantiti,$Tarikh_Pinjam,$Tarikh_Hantar) = $pecahkanbaris;
                    
                    //memasukkan data kedalam jadual peminjaman
                    $result=mysqli_query($conn, "INSERT INTO pinjaman
                    (Id_Pinjaman,No_KP,Nama_Murid,Kelas,Id_Alatan,Nama_Alatan,Kuantiti,Tarikh_Pinjam,Tarikh_Hantar)
                    values
                    ('$Id_Pinjaman','$No_KP','$Nama_Murid','$Kelas','$Id_Alatan','$Nama_Alatan','$Kuantiti','$Tarikh_Pinjam','$Tarikh_Hantar')");
                
                    echo"<script>alert('import fail data berjaya.');
                    window.location.href='options.php';</script>";            
                }
                
           fclose($failyangdataingindiupload);
    }
    else
    {
        echo"<script>alert('hanya fail berformat txt sahaja dibenarkan');window.location.href='options.php';</script>";
    }

    mysqli_close($condb);
}
?>