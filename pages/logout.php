<?php
session_start();
include '../model/pdoconnect.php';
$logout=$_POST['logout'];
if (isset($_POST['logout'])) {
	session_unset();
	header('Location: login_in.php');
}
?>