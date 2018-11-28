
<?php 
include '../include/koneksi.php';
switch(@$_GET['act']){
//tampil galery 
default:
echo "<h2>galery</h2>
<form method=post action='?module=galeri&act=tambahgaleri'>
<input type=submit value='Tambah galery'>
</form>
<table border=1>
<tr>
<th>No</th>
<th>Nama galery</th>
<th>Keterangan</th>
<th>Tgl</th>
<th>galery</th>

<th>Aksi</th>
</tr>";
$tampil=mysqli_query($koneksi, "select * from galery order by id_galery");
$no=1;
while ($r=mysqli_fetch_array($tampil))
{
echo "<tr><td>$no</td>
<td>$r[nm_galery]</td>
<td>$r[ket]</td>
<td>$r[tgl_galery]</td>
<td><img src='galeri/$r[gambar]' width='50'></td>
<td><a href=?module=galeri&act=editgaleri&id=$r[id_galery]>Edit</a> |
<a href=\"aksi.php?module=galeri&act=hapus&id=$r[id_galery]\" onClick=\"return confirm('apakah anda benar akan menghapus galery $r[id_galery]?')\">Hapus</a>
</td></tr>";
$no++;
}
echo "</table>"; break;

//tambah galery
case "tambahgaleri":
echo "<h2>Tambah galery</h2>
<form name='form1' method='post' action='aksi.php?module=galeri&act=input' enctype='multipart/form-data'>
<table>
<tr><td>Nama galery</td>
 
<td> : <input name='nm_gal' type='text' size='35' /></td></tr>
<tr><td>Keterangan</td>
<td> : <textarea name='ket' cols='35' rows='4'></textarea>
</td></tr>
<tr><td>File Gambar</td>
<td> : <input name='gam' type='file' size='30' /></td></tr>
<tr><td colspan=2><input type=submit value=Simpan>
<input type=button value=Batal onclick=self.history.back()>
</td></tr>
</table> </form>"; break;

//edit galery
case "editgaleri":
$edit=mysqli_query($koneksi, "select * from galery where id_galery='$_GET[id]'");
$r=mysqli_fetch_array($edit); echo "<h2>Edit galery</h2>
<form name='form1' method='post' action='aksi.php?module=galeri&act=update&id=$r[id_galery]' enctype='multipart/form-data'>
<input type=hidden name=id value='$r[id_galery]'>
<table>
<tr><td>Nama galery</td>
<td> : <input name='nm_gal' type='text' size='35' value='$r[nm_galery]' /></td></tr>
<tr><td>Keterangan</td>
<td> : <textarea name='ket' cols='35' rows='4'>
$r[ket]</textarea></td></tr>
<tr><td>File Gambar</td>
<td> : <img src='galeri/$r[gambar]' width='50'><br>
<input name='gam_baru' type='file' size='30' /></td></tr>
<tr><td colspan=2><input type=submit value=Update>
<input type=button value=Batal onclick=self.history.back()></td></tr>
</table></form>"; break;}
?>
