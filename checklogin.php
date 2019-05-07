<?php 
session_start();
if (!isset($_SESSION["user_id"])) {
 echo "<script>alert('You are not logged in');
 window.location.href='index.html';</script>";
} else {
 $user = $_SESSION["user_id"];
 }
?>