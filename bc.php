<?php
$options = "SELECT * FROM user_settings WHERE username = '$user'";
$color = $conn->query($options)->fetch_assoc()["textcolor"];
if (!isset($color)) {
	$color = "#FFFFFF";
}
echo '<style>';
echo '
body {
	background-image: url("https://visme.co/blog/wp-content/uploads/2017/07/50-Beautiful-and-Minimalist-Presentation-Backgrounds-037.jpg");
	font-family: "Century Gothic";
  background-color: #FFFFFF;
  color: #333333;
}
table, th, td {
	padding: 5px;
    border: 2px solid black;
	background-color: #CCCCCC;
	margin-left: auto; 
    margin-right: auto;
}
.content1 {
	background-color: #2C2F33;
	color: ' . $color . ';
}
';
echo '</style>';
?>