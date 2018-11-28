<?php
include "../include/koneksi.php";
$login=mysqli_query($koneksi, "select * from admin where id_user='$_POST[id_user]' and password='$_POST[password]'");
if (mysqli_num_rows($login)) {
		$data=mysqli_fetch_array($login);
		session_start();
		$_SESSION['namauser']=$data['id_user'];
		$_SESSION['passuser']=$data['password'];
		header("location:server.php?module=home");
}

else
{
	print "<script>
	alert ('Periksa Pengisian Form'); 
	location.href = 'index.php';
</script>";
}
?>