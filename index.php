<?php 
	include "fungsi.php";
	atas($judul="Home");
	navigasi();
	login($login,$iduser);
	kiri(); 
	if ($login=="Not Loged"){
			echo "Up2-Files adalah tempat untuk mengupload file yang akan dibagikan. Di up2-files semua orang dapat melihat ataupun mendownload file yang telah dibagikan. Untuk mengetahui carakerja website ini silahkan kunjungi bagian FAQ";
	}
	else{
		$query="select * from pengguna where iduser=$iduser";
		$sql=mysqli_query($kon,$query);
		$row = mysqli_fetch_assoc($sql);
		
?>
<div id="form_chat">
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<table>
		<tr>
		<td><input type="text" name="chat"> &nbsp; &nbsp;
		<input type="submit" name="btn_chat" value="kirim"> 
		</td>
		</tr>
		</table>
	</form>
</div>
<?php
	if (isset($_POST['btn_chat'])){
				if (empty($_POST['chat'])){
						echo "<div id='notif'>";
						echo "Chatnya Tidak Boleh Kosong<br/>";
						echo "</div>";
					}
				else {
						$chat=$_POST['chat'];
						$tgl = date('Y-m-d');
						
						
						$nama=$row['nama'];
						echo "<div id='notif'>";
						$sql=mysqli_query($kon,"insert into chat (iduser,nama,tanggal,chat) values ('$iduser','$nama','$tgl','$chat')");
						if ($sql)
							echo "Chat Terkirim";
						else {
							echo "gagal coeg";
						}
						echo "</div>";
				}
		}
?>
<div id="tampil_chat">
	<table width="100%">
	<?php
		$sql_tampil=mysqli_query($kon,"select * from chat order by kode_chat desc");
		$count=0;
		while ($row_tampil=mysqli_fetch_assoc($sql_tampil)){
		if ($count % 2 ==0 ){
	?>

		<tr  style="background-color:rgb(99,10,199) ">
		<td><?php echo $row_tampil['nama']?>'s  berkata : </td><td align="right"><span align="right"><?php echo $row_tampil['tanggal']?></span></div></td></tr>
		<tr>
		<td valign='top' class='chat_isi' colspan="2" height="100px" style="border-top: 2px dashed black; background-color:rgb(142,189,209)">
		<?php echo $row_tampil['chat']?></td>
		</tr>

<?php
		}
		else {
?>
		<tr style="background-color:rgb(99,30,199)">
		<td><?php echo $row_tampil['nama']?>'s  berkata : </td><td align="right"><span align="right"><?php echo $row_tampil['tanggal']?></span></div></td></tr>
		<tr>
		<td valign='top' class='chat_isi'  colspan="2" height="100px" style="min-height:50px; border-top: 2px dashed black; background-color:rgb(100,100,209)">
		<?php echo $row_tampil['chat']?></td>
		</tr>


<?php		
		}
	
		$count++;
	}
	echo "</table></div>";
}
	kanan();
	bawah();
?>