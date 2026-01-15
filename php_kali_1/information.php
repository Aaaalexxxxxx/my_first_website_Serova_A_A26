<?php
$link = mysqli_connect('127.0.0.1', 'root', '110251210');
if (!$link) {
	die('Error: ' . mysqli_error());
}
echo 'Connection established';
mysqli_close($link);
?>
