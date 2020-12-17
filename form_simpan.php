<html>
<head>
  <title>Aplikasi CRUD dengan PHP</title>
</head>
<body>
  <h1>Tambah Data Siswa</h1>
  <form method="post" action="proses_simpan.php" enctype="multipart/form-data">
  <table cellpadding="8">
  <tr>
    <td>id</td>
    <td><input type="text" name="no"></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td><input type="text" name="nama"></td>
  </tr>
  <tr>
    <td>Judul</td>
    <td><textarea name="judul"></textarea></td>
  </tr>
  <tr>
    <td>Isi Berita</td>
    <td><textarea name="isi"></textarea></td>
  </tr>
  <tr>
    <td>Video</td>
    <td><input type="file" name="video"></td>
  </tr>
  </table>
  
  <hr>
  <input type="submit" value="Simpan">
  <a href="index.php"><input type="button" value="Batal"></a>
  </form>
</body>
</html>