<?php
	include "fungsi.php";
	
	atas($judul="Detail User");
	navigasi();
	login($login,$iduser);
    kiri();
	$iduser=$_GET['iduser'];
	$sql = mysqli_query($kon,"select * from pengguna where iduser=$iduser;");
	$sql1=mysqli_query($kon,"Select count(*) as jumfiles from file where iduser=$iduser;");
	if (!$sql or !$sql1){
		echo "Cie Mau Pentes";
	}
	else{
	$row = mysqli_fetch_assoc($sql);
	$row1 = mysqli_fetch_assoc($sql1);
			echo "<h3>".$row['nama']."'s Profil</h3>";
			echo "<table width='100%'><tr><td colspan='3' align='center'><img src='avatar/".$row['avatar']."' class='avatar' width='200px' height='200px'/></td></tr>";
			echo "<tr><td>Nama </td><td>: </td><td>".$row['nama']."</td></tr>";
			echo "<tr><td>Email  </td><td>: </td><td>".$row['email']."</td></tr>";
			echo "<tr><td>File Terupload  </td><td>: </td><td>".$row1['jumfiles']."<td></tr></table>";
	}
	kanan();
	bawah();
?>