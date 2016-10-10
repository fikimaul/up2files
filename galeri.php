<?php
	include "fungsi.php";
	
	atas($judul="Galeri");
	navigasi();
	login($login,$iduser);
    kiri();
?>
<h3>GALERI</h3>
<?php
	$sql = mysql_query("select * from file where jenis='image' order by idfile desc");
	echo "<table align='center'>";
	$i=0;
	while ($row = mysql_fetch_assoc($sql)){
	$url='files/'.$row['nama'];
	if ($i>=3)
		$i=0;
	if	($i==0)
		echo "<tr>";
	if ($i<3){
?>	
		<td align="center"><a href="<?php echo $url ?>"><img src="<?php echo $url ?>" height="150px" width="150px"></a></td>
<?php 
				$i++;
		}
	if	($i==3)
		echo "</tr>";
	}	
	echo "</table>";
	kanan();
	bawah();
?>