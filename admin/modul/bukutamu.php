<html>
</head>
	<title>Buku Tamu</title>
	<style type="text/css">
		body { font-family:tahoma; font-size:12px; }
		#container { width:450px; padding:20px 40px; margin:50px auto; border:0px solid #555; box-shadow:0px 0px 2px #555; }
		input[type="text"] { width:200px; }
		input[type="text"], textarea { padding:5px; margin:2px 0px; border: 1px solid #777; }
		input[type="submit"], input[type="reset"] { padding: 5px 20px; margin:2px 0px; font-weight:bold; cursor:pointer; }
		#error { border:1px solid red; background:#ffc0c0; padding:5px; }
	</style>

	<script type="text/javascript" src="../tinymce/tiny_mce.js"></script>
	<script type="text/javascript">

	tinyMCE.init({

	// General options

	mode : "textareas",
	theme : "advanced",

	});
	</script>
</head>
<body>
 
	<div id="container">
		<h1>Buku Tamu</h1>
		<p>Silahkan isi buku tamu di bawah ini untuk meninggalkan pesan Anda!</p>
 
		<?php
		if(isset($_POST['go'])){
			include '../include/koneksi.php';
 
			$nama	= $_POST['nama'];
			$email	= $_POST['email'];
			$web	= $_POST['website'];
			$pesan	= $_POST['komentar'];
			$tgl	= time();
 
			if($nama && $email && $pesan){
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){
					$in = mysqli_query($koneksi,"INSERT INTO buku_tamu(tgl_bktamu,nm_bktamu,email_bktamu,alamat_bktamu,komentar) VALUES('$tgl', '$nama', '$email', '$web', '$pesan')");
					if($in){
						echo '<script language="javascript">alert("Terima kasih, data Anda berhasil disimpan"); document.location="server.php?module=bukutamu";</script>';
					}else{
						echo '<div id="error">Uppsss...! Query ke database gagal dilakukan!</div>';
					}
				}else{
					echo '<div id="error">Uppsss...! Email Anda tidak valid!</div>';
				}
			}else{
				echo '<div id="error">Uppsss...! Lengkapi form!</div>';
			}
		}
		?>
 
		<form action="" method="post">
			<p><b>Nama Lengkap :</b><br><input type="text" name="nama" placeholder="Kayeen" required /></p>
			<p><b>Email :</b><br><input type="text" name="email" placeholder="kayeen@tutorialweb.net" required /></p>
			<p><b>Website :</b><br><input type="text" name="website" placeholder="http://www.tutorialweb.net" /></p>
			<p>
				<p><b>Komentar :</b></p><textarea name="komentar"></textarea>
			<p>
			<p><input type="submit" name="go" value="Kirim" /> <input type="reset" name="del" value="Hapus" /></p>
		</form>
	</div>
 
</body>
</html>