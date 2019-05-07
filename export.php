<?PHP
//x leh pakai connection.php sebab dia ada empty line banyak mls nak suruh buang
include_once ("db.php");

$download = fopen("DATA.txt", "w") or die("Unable to create file!");
$result=mysqli_query($conn, "select * FROM pinjaman");
$i = 0;
while ($row = $result->fetch_assoc()) {
    if ($i > 0) {
        $txt = $txt . "\n";
    }
    $txt = $txt . $row['Id_Pinjaman'] . '|' . $row['No_KP'] . '|' . $row['Nama_Murid'] . '|' . $row['Kelas'] . '|' 
    . $row['Id_Alatan'] . '|' . $row['Nama_Alatan'] . '|' . $row['Kuantiti'] . '|' . $row['Tarikh_Pinjam'] . '|' . $row['Tarikh_Hantar'] . '|';
    $i++;
}
fwrite($download, $txt);
fclose($download);
header("Content-disposition: attachment; filename=" . "DATA.txt");
header("Content-type: application/txt");
readfile("DATA.txt");
?>