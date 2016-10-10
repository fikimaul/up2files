<?php
	session_start();
	if (!isset($_SESSION['login']))
	{
		$user_aktif="";
		$login="Not Loged";
		$iduser="";
	}
	else{
		include "koneksi.php";
		$user_aktif=$_SESSION['login'];	
		
		$sesi_sql = mysql_query("select * from pengguna where email='$user_aktif'");
		$row = mysql_fetch_assoc($sesi_sql);

		$login=$row['nama'];
		$iduser=$row['iduser'];
}
?>