<?php
session_start();
//apabila user yang mengakses tidak sah
if (empty($_SESSION['namauser']) and
	empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses halaman ini, anda harus login
terlebih dahulu <br>";
echo "<a href=index.php><b>LOGIN</b></a></center>";
}
//apabila user yang mengakses sah
else {
	?>
	<html>
	<head>
		<title>.:: Halaman Utama Administrator ::.</title>
		<link href="../include/admin_style.css" rel="stylesheet"
		type="text/css">
	</head>
	<body>
		<table width="100%" border="20" cellspacing="20" cellpadding="20">
			<tr>
				<td colspan="2" align="left" valign="top"
				background="">
				<table width="100%" border="10" cellspacing="10" cellpadding="10">
					<tr>
						<td width="57%"> </td>
						<td width="43%" valign="bottom">
							<table width="100%" border="10" cellspacing="10" cellpadding="10">
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td align="right" class="judul">
										<a href="server.php?module=home"><b>Beranda</b></a> | <a 
										href="server.php?module=user&act=gantipwd&id=<?php echo "$_SESSION[namauser]";?>">Ganti Password </a> | <a
										href="logout.php"><b>Logout</b></a>&nbsp;</td>
									</tr></table>
								</td>
							</tr>
						</table></td>
					</tr>
					<tr>
						<td width="400" valign="top" bgcolor="yellow" id="menu">
							<?php include "menu.php"; ?>
						</td>
						<td align="left" valign="top" bgcolor="lime" class="text"
						id="content"><?php include "konten.php"; ?></td>
					</tr>
					<tr>
						<td height="40" colspan="2" align="center" valign="middle"
						><span
						class="kecil">Copyright <b>Kayeen</b> &copy; 2018. All Right
						Reserved<br>
						<span class="style_text">Design By <a
							href="http://www.polindra.ac.id" target="_blank">Training
							Center TI Polindra</a></span></span></td>
						</tr>
					</table>
				</body>
				</html>
				<?php
			}
			?>