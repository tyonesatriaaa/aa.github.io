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
          <h1><a href="index.html">SA<span class="logo_colour">NM</span></a></h1>
          <h2>SISTEM APLIKASI NEWS MANAGEMENT</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="indexpr.php">Home</a></li>
          <li><a href="updateberitapr.php">Update Berita</a></li>
          <li><a href="ambilberitapr.php">Ambil Berita</a></li>
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
  <h1>Halaman Pemimpin Redaksi</h1>
  <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
            <h2>Berita yang telah terupload hari ini.</h2>
            <table class="table" width="100%" cellpadding="3" cellspacing="0">
              <tr>
                  <th width="30">No.</th>
                    <th width="80">Tgl. Upload</th>
                    <th>Nama File</th>
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
              <td>'.$data['nama_file'].'</td>
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
            <table class="table" width="100%" cellpadding="3" cellspacing="0">
              <tr>
                  <th width="30">No.</th>
                    <th width="80">Tgl. Upload</th>
                    <th>Nama File</th>
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
              <td>'.$data['nama_file'].'</a></td>
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
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
     Copyright &copy; TYONE SATRIA 
    </div>
  </div>
</body>
</html>
