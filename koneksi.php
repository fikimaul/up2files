<?php 
	error_reporting(E_ALL ^ E_DEPRECATED);
	$host="localhost";
	$user="root";
	$pass ="";
	$dbName="u581249997_upld";

	$kon= mysql_connect($host,$user,$pass) or die("gagal koneksi");
	$hasil = mysql_select_db($dbName);
?>