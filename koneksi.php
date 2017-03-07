<?php 
	error_reporting(E_ALL ^ E_DEPRECATED);
	$host="localhost";
	$user="root";
	$pass ="";
	$dbName="u581249997_upld";

	$kon= mysqli_connect($host,$user,$pass) or die("gagal koneksi");
	$hasil = mysqli_select_db($kon,$dbName);
?>