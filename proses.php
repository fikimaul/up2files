<?php
	include "fungsi.php";
	atas();
	navigasi();
	
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
					echo "file sukses di upload";
					$upload = mysql_query($sql);
		}
		else{
			echo"Gagal Upload";
		}
?>