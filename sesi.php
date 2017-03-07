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
		
		$sesi_sql = mysqli_query($kon,"select * from pengguna where email='$user_aktif'");
		$row = mysqli_fetch_assoc($sesi_sql);

		$login=$row['nama'];
		$iduser=$row['iduser'];
}
?>