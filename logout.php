<?php 
	include "sesi.php";
	session_destroy();
	header ("location: index.php");
?>