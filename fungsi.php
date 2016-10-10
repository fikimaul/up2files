<?php
	include "sesi.php";
	include "koneksi.php";
	function atas($judul){
?>
	<html>
	<head>
	<title><?php echo $judul ?> | UPLOAD FILE GRATIS</title>
	<link rel="stylesheet" href="style.css">
	</head>
	<body>
	<div id="wrap">
		<div id="atas"><img src="css/logo.png" width="100%" height="100%"></div>
<?php } ?>

<?php
	function navigasi(){
?>
<div id="navigasi">
	<ul>
		<li> <a href="index.php">HOME</a>
		<li> <a href="upload.php">UPLOAD</a>
		<li> <a href="semua_files.php">SEMUA FILES</a>
		<li> <a href="galeri.php">GALERI</a>		
		<li> <a href="faq.php">FAQ</a>
	</ul>
</div>
<?php } ?>

<?php
	function kiri(){
?>
<div id="konten">

<?php } ?>

<?php
	function kanan(){
?>
</div>
<div id="kanan">
	<form action="cari.php" method="get">
		<input type="text" name="cari"> <input type="submit" value="Search">
	</form>
	<h3> Pendaftar Terbaru</h3>
	<ul>
<?php
		include "koneksi.php";
		
		$sql=mysql_query("select * from pengguna order by iduser desc limit 0,6");
		
		while ($row = mysql_fetch_assoc($sql)){	
				$url='detil_user.php?iduser='.$row['iduser'];
?>
	<li> <a href="<?php echo $url ?>"><?php echo $row['nama'] ?></a></li>
	<?php } ?>
	</ul>
</div>
<?php 

		
}
?>

<?php
	function bawah(){
?>
<div id="bawah">
	copy right &copy; Fiki Maulana
</div>
</div>
</body>
</html>
<?php } 
function  login($login,$iduser){
?>
<div id="kiri">
<?php
	if ($login=="Not Loged"){
?>
<form action="login.php" method="post">
<table>
    <tr>
        <td>EMAIL</td>
        <td>:</td>
        <td><input name="email" type="text" class="input"></td>
    </tr>
    <tr>
        <td>SANDI</td>
        <td>:</td>
        <td><input name="sandi" type="password" class="input"></td>
    </tr>
    <tr>
    	<td colspan="3" align="center"><input type="submit" value="Login" name="submit"></td>
    </tr>
    <tr>
    	<td colspan="3" align="center"><a href="registration.php">Daftar Sekarang</a></td>
    </tr>
</table>
</form>
</h4>

<?php
}
else {
		$query="select * from pengguna where iduser=$iduser";
		$sql=mysql_query($query);
		
		$row = mysql_fetch_assoc($sql);
				echo "<table width='250px'><tr><td align='center'><img src='t_avatar/t_".$row['avatar']."' width='100px' height='100px'/></td></tr></table>";
				echo "<hr/><b><p align='center'>Welcome : ".$row['nama']."</p></b>";
?>
	<ul>
		<li> <a href="files.php">MY FILES</a></li>
		<li> <a href="detil_user.php?iduser=<?php echo $iduser ?>">MY PROFIL</a></li>
		<li> <a href="edit_user.php">EDIT PROFIL</a></li>
		<li> <a href="logout.php">LOGOUT</a></li>
	</ul>
<?php } ?>
</div>
<?php
}
?>

<?php
	
				function buat_thumbnail($file_src,$file_dst){
					list($w_src,$h_src,$type) = getImageSize($file_src);
					switch ($type){
						case 1 : //gif -> jpg
							$img_src = imagecreatefromgif($file_src);
							break;
						case 2 : //jpeg -> jpg
							$img_src = imagecreatefromjpeg($file_src);
							break;
						case 3 : //png -> jpg
							$img_src = imagecreatefrompng($file_src);
							break;
					}
					$thumb = 100; //max. size untuk thumb
					if($w_src > $h_src){
						$w_dst = $thumb; //landscape
						$h_dst = round($thumb / $w_src * $h_src);
					}else{
						$h_dst = round($thumb / $h_src * $w_src);
						$w_dst = $thumb; // protrait
					}
					$img_dst = imagecreatetruecolor($w_dst,$h_dst); // resample
					imagecopyresampled($img_dst, $img_src, 0,0,0,0,
							$w_dst, $h_dst, $w_src, $h_src);
					imagejpeg($img_dst, $file_dst);//Simpan thumbnail
					//Bersihkan memori
					imagedestroy($img_src);
					imagedestroy($img_dst);
					}

?>