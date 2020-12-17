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
          <li><a href="indexpr.php">Home</a></li>
          <li><a href="updateberitapr.php">Update Berita</a></li>
          <li class="selected"><a href="ambilberitapr.php">Ambil Berita</a></li>
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
          <h2>Ambil Berita</h2>
            <p>Silahkan download file berita yang sudah di Upload oleh wartawan. Untuk men-Download Anda bisa mengklik Judul file yang di inginkan anda juga bisa update berita tersebut di menu <a href="updateberitapr.php">update berita</a>.</p>
            <table class="table" width="100%" cellpadding="3" cellspacing="0">
              <tr>
                  <th width="30">No.</th>
                    <th width="80">Tgl. Upload</th>
                    <th>Nama File</th>
                    <th width="70">Tipe</th>
                    <th width="70">Ukuran</th>
                </tr>
                <?php
        include('proses_download.php');
        $sql = mysqli_query($koneksi, "SELECT * FROM download ORDER BY id DESC");
        if(mysqli_num_rows($sql) > 0){
          $no = 1;
          while($data = mysqli_fetch_assoc($sql)){
            echo '
            <tr bgcolor="#fff">
              <td align="center">'.$no.'</td>
              <td align="center">'.$data['tanggal_upload'].'</td>
              <td><a href="'.$data['file'].'">'.$data['nama_file'].'</a></td>
              <td align="center">'.$data['tipe_file'].'</td>
              <td align="center">'.formatBytes($data['ukuran_file']).'</td>
            </tr>
            ';
            $no++;
          }
        }else{
          echo '
          <tr bgcolor="#fff">
            <td align="center" colspan="4" align="center">Tidak ada data!</td>
          </tr>
          ';
        }
        ?>
            </table>
            </p>
                <h2>Update Berita</h2>
            <p>Silahkan download file berita yang sudah di Update. Untuk men-Download Anda bisa mengklik Judul file yang di inginkan.</p>
            <table class="table" width="100%" cellpadding="3" cellspacing="0">
              <tr>
                  <th width="30">No.</th>
                    <th width="80">Tgl. Upload</th>
                    <th>Nama File</th>
                    <th width="70">Tipe</th>
                    <th width="70">Ukuran</th>
                </tr>
               <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM download1 ORDER BY id DESC");
        if(mysqli_num_rows($sql) > 0){
          $no = 1;
          while($data = mysqli_fetch_assoc($sql)){
            echo '
            <tr bgcolor="#fff">
              <td align="center">'.$no.'</td>
              <td align="center">'.$data['tanggal_upload'].'</td>
              <td><a href="'.$data['file'].'">'.$data['nama_file'].'</a></td>
              <td align="center">'.$data['tipe_file'].'</td>
              <td align="center">'.formatBytes($data['ukuran_file']).'</td>
            </tr>
            ';
            $no++;
          }
        }else{
          echo '
          <tr bgcolor="#fff">
            <td align="center" colspan="4" align="center">Tidak ada data!</td>
          </tr>
          ';
        }
        ?>
              </table>
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
