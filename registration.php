<?php 
	include "fungsi.php";
	atas($judul="Registrasi");
	navigasi();
	login($login,$iduser);
	kiri();
?>
<h3>DAFTAR</h3>
<table>
<form action="simpan.php" method="post">
	<tr>
		<td>nama </td> <td> : </td> <td><input type="text" name="reg_nama"></td>
	</tr>
	<tr>
		<td>email </td> <td>: </td><td><input type="email" name="reg_email"></td>
	</tr>
	<tr>
		<td>Sandi </td> <td>: </td><td><input type="password" name="reg_sandi"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="daftar" name="reg_submit"></td>
	</tr>
</form>
</table>
<?php
kanan();
bawah();
?>
