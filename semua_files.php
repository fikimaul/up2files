<?php
	include "fungsi.php";
	atas($judul="Semua Files");
	navigasi();
	login($login,$iduser);
    kiri();
?>
<h3>SEMUA FILE</h3>
<div class="semua_file">
<?php
	$sql = mysql_query("select * from file order by idfile desc");
		if (!mysql_affected_rows())
		{
			echo "file kosong";
		}
	
	$item=0;
	while ($row = mysql_fetch_assoc($sql)){
				$url='files/'.$row['nama'];
				echo "Nama File : <a href='detil_file.php?idfile=".$row['idfile']."'>".$row['nama']."</a><br>";
				echo "Keterangan  : ".$row['keterangan']."<br>";
				echo "Tanggal Upload: ".$row['tanggal']."<br>";
				echo "Size : ".$row['size']." Bytes<br>";
				echo '<a href="'.$url.'">download</a>';
				echo '<br/><hr/>';
}
	echo "</div>";
	kanan();
	bawah();
?>