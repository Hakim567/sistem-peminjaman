<?php 
include_once("db.php");
$username = $_POST["username"]; 
$pass = $_POST["password"]; 
$sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$pass'";
$result = $conn-> query($sql); 
if ($result->num_rows > 0) {
 session_start();
 $_SESSION["user_id"] = $username;
 echo "<script>alert('Success'); window.location.href='mainpage.php';</script>"; }
 else{ 
 echo "<script>alert('Wrong login credentials'); window.location.href='index.html';</script>"; } 
?>