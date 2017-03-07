<?php
include "koneksi.php";
session_start();
$status="";

if (isset($_POST['submit'])){
	if (empty($_POST['email']) || empty($_POST['sandi'])){
		$status = "Email Atau Sandi Salah";
	}
	else{
			$email = $_POST['email'];
			$sandi =md5( $_POST['sandi']);

			
			$query=mysqli_query($kon,"select * from pengguna where email='$email' and sandi='$sandi'");
			$baris=mysqli_num_rows($query);
			if ($baris==1){
				$status="true";
				$_SESSION['login']=$email;
				header ("location: index.php");
			}
			else
			$status = "Email Atau Sandi Salah";
	}
}	

else { 
	$_SESSION['email']="";
	}
	echo $status;

mysqli_close($kon);
?>