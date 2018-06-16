<?php
$dbc = mysqli_connect("localhost", "lazarenko", "xedfr1998", "lazarenko");
session_start();
mysqli_query($dbc, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
mysqli_query($dbc, "SET CHARACTER SET 'utf8'");
?>
<head>
<link rel="shortcut icon" href="/pictures/AWT-Plane.ico" />
	<title>Airplanes</title>
</head>