<?php 
	include "fungsi.php";
	atas($judul="Upload Files");
	navigasi();
	login($login,$iduser);
	kiri();
	if ($login!="Not Loged"){
?>
<h3>UPLOAD FILE</h3>
<table width='100%'> 
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
		<tr>
		<td>Keterangan File</td>
		<td>:</td><td><input type="text" name="keterangan"></td>
		</td>
		<tr>
		<td>File </td><td>: </td><td><input type="file" name="berkas"></td>
		<tr>
		<td colspan="3" align="center">
		<input type="submit" value="simpan" name="proses"></td>
		</tr>
</form>
</table>
<?php 
	if (isset($_POST['proses'])){
	$keterangan=$_POST["keterangan"];
		
		$tmpFile	= $_FILES['berkas']['tmp_name'];
		$nama	= $_FILES['berkas']['name'];
		$size		= $_FILES['berkas']['size'];
		$type		= $_FILES['berkas']['type'];

		$folder="files";
		
		if (!is_dir($folder))
			mkdir($folder);
			
		$tujuanBerkas = $folder."/".$nama;
		
		include "koneksi.php";
		
		$tgl = date('Y-m-d');
		
		$sql = "insert into file (nama,keterangan,tanggal,size, jenis,iduser) values ('$nama','$keterangan','$tgl','$size','$type','$iduser')";


			if (move_uploaded_file($tmpFile,$tujuanBerkas)){
						echo "<div id='notif'>";
						echo "File Sukses Di Upload!!<br/>";
						echo "</div>";
						$upload = mysqli_query($kon,$sql);
			}
			else{
				echo "<div id='notif'>";
				echo"Gagal Upload";
				echo "</div>";
			}
	}
}
else { 
echo "<div id='notif'>";
echo "Silahkan LOGIN DULU";
echo "</div>";
}
kanan();
bawah();
?>