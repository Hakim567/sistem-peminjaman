<?php 
include_once("db.php");
$username = $_POST["username"]; 
$pass = $_POST["password"]; 
$sql = "INSERT INTO admins (username, password) VALUES ('$username', '$pass');";
$result = $conn->query($sql); 
if ($result) {
 echo "<script>alert('Success'); window.location.href='index.html';</script>"; }
 else{ 
 echo "<script>alert('Something went wrong'); window.location.href='signup.html';</script>"; } 
?>