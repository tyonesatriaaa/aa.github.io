<?php
include 'proses_download.php';
// menyimpan data id kedalam variabel
$id  = $_GET['id'];
// query SQL untuk insert data
$query="DELETE from download where id='$id'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:indexadm.php");
?>
