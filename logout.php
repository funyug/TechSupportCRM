<?php
	include 'dbconnection.php';
	session_start();
	session_destroy();
	header("location:login.php");
?>