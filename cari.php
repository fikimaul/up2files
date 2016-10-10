<?php
	include "fungsi.php";
	include "koneksi.php";

	$cari=$_GET['cari'];
	atas($judul="Cari Files");
	navigasi();
	login($login,$iduser);    
	kiri();
	
	$sql = mysql_query("select * from file where nama like '%$cari%' order by idfile");
	$baris=mysql_num_rows($sql);
	if ($baris ==0){
			echo "404 File Not Found";
		}
	else{
		echo "<h3>$baris File Telah Ditemukan </h3><hr>";
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
	kanan();
	bawah();
?>