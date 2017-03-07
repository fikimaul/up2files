<?php
	include "fungsi.php";
	include "koneksi.php";
	
	atas($judul="Detail Files");
	navigasi();
	login($login,$iduser);
    kiri();
	$idfile=$_GET['idfile'];
	
	$sql=mysqli_query($kon,"select pengguna.nama as user,file.nama, file.keterangan,file.tanggal, file.size from pengguna,file where idfile=$idfile");
	if (!$sql){
		echo "Cie Mau Pentes";
	}
	else{
	$row = mysqli_fetch_assoc($sql);
	$url='files/'.$row['nama'];
	echo "Nama File : ".$row['nama']."<br>";
	echo "Keterangan  : ".$row['keterangan']."<br>";
	echo "Tanggal Upload: ".$row['tanggal']."<br>";
	echo "Size : ".$row['size']." Bytes<br>";
	echo '<a href="'.$url.'">download</a>';
	echo '<br/><hr/>';
	}
?>
<?php
	kanan();
	bawah();
?>