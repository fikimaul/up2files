<?php
	include "fungsi.php";
		
	atas($judul="Files");
	navigasi();
	login($login,$iduser);
    kiri();

	$sql = mysql_query("select * from file where iduser=$iduser");
	
	$jum_row=mysql_num_rows($sql);
	
	if ($jum_row!=0){
			while ($row = mysql_fetch_assoc($sql)){
			$url='files/'.$row['nama'];
			
			echo "Nama File : ".$row['nama']."<br>";
			echo "Keterangan  : ".$row['keterangan']."<br>";
			echo "Tanggal Upload: ".$row['tanggal']."<br>";
			echo "Size : ".$row['size']." Bytes<br>";
			echo '<a href="'.$url.'">download</a>';
			echo '<br/><hr/>';
			}
	}
	else {
		echo "File Kosong";
	}
	kanan();
	bawah();
?>