<?php
	include "fungsi.php";
	atas($judul="Edit User");
	navigasi();
	login($login,$iduser);
    kiri();
	$sql=mysqli_query($kon,"select * from pengguna where iduser=$iduser");
	$row=mysqli_fetch_assoc($sql);
?>
	<table>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"  enctype="multipart/form-data">
		<tr>	
			<td>Nama </td><td>:</td><td> <input type="text" name="edit_nama" value="<?php echo $row['nama'] ?>"></td>
		</tr>
		<tr>	
			<td>Email </td><td>:</td><td> <input type="email" name="edit_email" value="<?php echo $row['email'] ?>"></td>
		</tr>
		<tr>	
		<tr>	
			<td>Avatar [MAX 1.5 MB]</td><td>:</td><td> <input type="file" name="avatar"></td>
		</tr>
			<td>Paasword Baru</td><td>:</td><td> <input type="password" name="edit_sandi"></td>
		</tr>
		<tr>	
			<td>Paasword Lama (Wajib Diisi)</td><td>:</td><td> <input type="password" name="sandi_lama"></td>
		</tr>
		<tr>
			<td colspan="3" align="center"><input type="submit" value="SIMPAN" name="edit_simpan">&nbsp; &nbsp; <input type="reset" value="BATAL" name="btl_simpan">
		</tr>
		</form>
	</table>
<?php	
	if (isset($_POST['edit_simpan'])){
			$edit_nama=$_POST['edit_nama'];
			$edit_email=$_POST['edit_email'];
			$edit_sandi=md5($_POST['edit_sandi']);
			$sandi_lama=md5($_POST['sandi_lama']);
			
			$avatar = $_FILES['avatar']['name'];
			$tmpname = $_FILES['avatar']['tmp_name'];
			$size = $_FILES['avatar']['size'];	
			$type = $_FILES['avatar']['type'];
			$namaava=$iduser.".jpg";
			$maxsize = 1500000;
			$typeygboleh = array("image/jpeg","image/png","image/pjpeg");
			
			//folder
			$diravatar = "avatar";
			if(!is_dir($diravatar))
				mkdir($diravatar);
			$filetujuanavatar= $diravatar."/".$iduser.".jpg";
			
			$dirthumb = "t_avatar";
			if(!is_dir($dirthumb))
				mkdir($dirthumb);
			$filetujuanthumb = $dirthumb."/t_".$iduser.".jpg";
			
			if($size > 0){
				if($size > $maxsize){
					echo "Ukuran File Terlalu Besar <br/>";
				}
				if(!in_array($type, $typeygboleh)){
						echo "Type File Tidak Dikenal <br/>";
					}
			}

			if (empty($_POST['sandi_lama'])){
						echo "Sandi Tidak Boleh kosong";
				}
				if (empty($_POST['edit_sandi'])){
						$edit_sandi=$sandi_lama;
				}
				
				$sql=mysqli_query($kon,"select * from pengguna where iduser=$iduser");
				$row=mysqli_fetch_assoc($sql);
			
				if ($row['sandi']!=$sandi_lama){
					echo "sandi salah";
				}
				else {
					if (strlen(trim($avatar))==0){
						$avatar=$row['avatar'];
					}
					$sql_update=mysqli_query($kon,"update pengguna set nama='$edit_nama', email='$edit_email', sandi='$edit_sandi', avatar='$namaava'  where iduser=$iduser");
					if ($sql_update){
						echo "Profil Berhasil Di Update";
					}
				if($size > 0){
					if(!move_uploaded_file($tmpname,$filetujuanavatar)){
						echo "Gagal Upload Gambar... <br/>";
						echo "<a href='Buku_tampil.php'>Daftar Buku</a>";
						exit;
					}else{
						buat_thumbnail($filetujuanavatar,$filetujuanthumb);
					}
				}
				echo "<br/>File Sudah Di Upload.<br/>";
		}	
}
	kanan();
	bawah();
?>