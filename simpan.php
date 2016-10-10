<?php
	include "fungsi.php";
	$reg_nama=$_POST['reg_nama'];
	$reg_email=$_POST['reg_email'];
	$reg_sandi=md5($_POST['reg_sandi']);
	
	atas($judul="Sukses Daftar");
	navigasi();
	login($login,$iduser);
	kiri(); 
	
	
	if (isset($_POST['reg_submit'])){
			if (empty($_POST['reg_nama'])){
				echo "Nama Tidak Boleh kosong<br/>";
				echo '<br/><input type="button" value="kembali" onClick="self.history.back()">';

			}
			elseif (empty($_POST['reg_email'])){
				echo "Email Tidak Boleh kosong";
				echo '<br/><input type="button" value="kembali" onClick="self.history.back()">';
			}
			elseif (empty($_POST['reg_sandi'])){
				echo "Sandi Tidak Boleh kosong";
				echo '<br/><input type="button" value="kembali" onClick="self.history.back()">';
			}
			
			else{
						$query=mysql_query("select * from pengguna where email='$reg_email'");
						$baris=mysql_num_rows($query);
			
						if ($baris==1){
							echo "Email sudah dipakai!!";
							echo '<br/><input type="button" value="kembali" onClick="self.history.back()">';
						}
	
						if ($baris==0){
							$sql=mysql_query("INSERT INTO pengguna (`nama`, `email`, `sandi`) VALUES ('$reg_nama', '$reg_email', '$reg_sandi')");
							if ($sql){
										echo "Anda Sukses Terdaftar. <a href='index.php'>Klik Disini</a> untuk login.";
										
										}
							}
					}
		}	
	kanan();
	bawah();
?>