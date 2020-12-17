<?php 
  session_start();

  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }

  ?>
<!DOCTYPE HTML>
<html>

<head>
  <title>SISTEM APLIKASI NEWS MANAGEMENT</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="indexww.php">SA<span class="logo_colour">NM</span></a></h1>
          <h2>SISTEM APLIKASI NEWS MANAGEMENT</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="indexadm.php">Home</a></li>
          <li><a href="ambilberitaadm.php">Ambil Berita</a></li>
          <li><a href="updateberitaadm.php">Update Berita</a></li>
          <li class="selected"><a href="kirimberitaadm.php">Kirim Berita</a></li>
          <!--<li><a href="ambilberitaadm.php">Ambil Berita</a></li>-->
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
   <div class="sidebar">
        <!-- insert your sidebar items here -->
        <h3>Contact Person</h3>
        <h4>Jika ada kendala hubungi</h4>
        <p><a href="https://wa.me/085230682896">085230682896</a> Tyone Admin</p>
<h3>Useful Links</h3>
        <ul>
          <li><a href="#">Website Perusahaan</a></li>
          <li><a href="#">Aplikasi Pegawai</a></li>
          <li><a href="#">link 3</a></li>
          <li><a href="#">link 4</a></li>
        </ul>
      </div>
       <div id="content">
          <h2>Upload Berita</h2>
            <p>File yang bisa di Upload hanya file dengan ekstensi <b>hanya .rar, .zip</b> dan besar file (file size) maksimal hanya 100 MB.</p>
            
            <?php
      include('proses_download.php');
      if(@$_POST['upload']){
        $allowed_ext  = array('rar', 'zip');
        $file_name    = $_FILES['file']['name'];
        $eksfile     = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_size    = $_FILES['file']['size'];
        $file_tmp   = $_FILES['file']['tmp_name'];
        
        $nama     = $_POST['nama'];
        $tgl      = date("Y-m-d");
        
        if(in_array($eksfile, $allowed_ext) === true){
          if($file_size < 50000000){
            $lokasi = 'files/'.$nama.'.'.$eksfile;
            move_uploaded_file($file_tmp, $lokasi);
            $in = mysqli_query($koneksi, "INSERT INTO download VALUES(NULL, '$tgl', '$nama', '$eksfile', '$file_size', '$lokasi')");
            if($in){
              echo '<div class="ok">SUCCESS: File berhasil di Upload!</div>';
            }else{
              echo '<div class="error">ERROR: Gagal upload file!</div>';
            }
          }else{
            echo '<div class="error">ERROR: Besar ukuran file (file size) maksimal 1 Mb!</div>';
          }
        }else{
          echo '<div class="error">ERROR: Ekstensi file tidak di izinkan!</div>';
        }
      }
      ?>
            
            <p>
            <form action="" method="post" enctype="multipart/form-data">
            <table width="100%" align="center" border="0" bgcolor="#eee" cellpadding="2" cellspacing="0">
              <tr>
                  <td width="40%" align="right"><b>Judul Berita</b></td><td><b>:</b></td><td><input type="text" name="nama" size="40" required /></td>
                </tr>
                <tr>
                  <td width="40%" align="right"><b>File Berita</b></td><td><b>:</b></td><td><input type="file" name="file" required /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" name="upload" value="Upload" /></td>
                </tr>
            </table>
            </form>
            </p>
            <a href="logout.php">LOGOUT</a>
        </div>
    </div>
<div id="content_footer"></div>
    <div id="footer">
     Copyright &copy; TYONE SATRIA
    </div>
  </div>
</body>
</html>