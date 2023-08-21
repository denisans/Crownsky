<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Menghubungkan dengan koneksi
include 'koneksi.php';

// Menangkap data yang dikirim dari form
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, md5($_POST['password']));

$login = mysqli_query($koneksi, "SELECT * FROM admin WHERE admin_username='$username' AND admin_password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
  session_start();
  $data = mysqli_fetch_assoc($login);
  $_SESSION['id'] = $data['admin_id'];
  $_SESSION['nama'] = $data['admin_nama'];
  $_SESSION['username'] = $data['admin_username'];
  $_SESSION['status'] = "admin_login";

  header("location: admin/");
}else{
  header("location: login.php?alert=gagal");
}
?>
