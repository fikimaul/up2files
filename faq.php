<?php
	include "fungsi.php";
	atas($judul="FaQ");
	navigasi();
	login($login,$iduser);
    kiri();
?>
<b>Q : Bagaimana cara daftar di website ini?</b>
<br/>A : Buka <a href="registration.php">Halaman Ini</a>, lalu masukan Nama, Alamat Email, Dan Kata sandi di kotak isian yang telah disediakan. Lalu klik tombol "daftar".
<hr/>
<b>Q : Bagaimana cara Upload File di website ini?</b>
<br/>A : Pastikan anda sudah login dengan email dan password agan. lalu  Buka <a href="upload.php">Halaman Ini</a>, Lalu isikan Keterangan file , Pilih file yang akan di upload ke website ini. Setelah itu klik tombol Upload.
<hr/>
<?php
	kanan();
	bawah();
?>