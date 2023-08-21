<!DOCTYPE html>
<html>
<head>
<div class="loader-wrapper" id="loader-wrapper">
        <div class="loader"></div>
    </div>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard Admin - Website Crown Sky Hotel</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../assets/dist/css/style.css">
  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../assets/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="../assets/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- Select2 -->
  <link rel="stylesheet" href="../assets/bower_components/select2/dist/css/select2.min.css">

  <?php 
  include '../koneksi.php';
  session_start();
  if($_SESSION['status'] != "admin_login"){
    header("location:../login.php?alert=belum_login");
  }
  ?>

</head>

<body class="hold-transition skin-yellow sidebar-mini">

  <div class="wrapper">

    <header class="main-header">
      <a href="index.php" class="logo">
        <span class="logo-mini"><b>CS</b>H </span>
        <span class="logo-lg"><b>CROWN SKY</b> HOTEL</span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php 
                $id_admin = $_SESSION['id'];
                $profil = mysqli_query($koneksi,"select * from admin where admin_id='$id_admin'");
                $profil = mysqli_fetch_assoc($profil);
                if($profil['admin_foto'] == ""){ 
                  ?>
                  <img src="../gambar/sistem/user.png" class="user-image">
                <?php }else{ ?>
                  <img src="../gambar/user/<?php echo $profil['admin_foto'] ?>" class="user-image">
                <?php } ?>
                <span class="hidden-xs"><?php echo $profil['admin_nama']; ?> - Admin</span>
              </a>
            </li>
            <li>
              <a href="logout.php"><i class="fa fa-sign-out"></i> LOGOUT</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <?php 
            $id = $_SESSION['id'];
            $profil = mysqli_query($koneksi,"select * from admin where admin_id='$id'");
            $profil = mysqli_fetch_assoc($profil);
            if($profil['admin_foto'] == ""){ 
              ?>
              <img src="../gambar/sistem/user.png" class="img-circle">
            <?php }else{ ?>
              <img src="../gambar/user/<?php echo $profil['admin_foto'] ?>" class="img-circle" style="max-height:45px">
            <?php } ?>
          </div>
          <div class="pull-left info">
            <p><?php echo $profil['admin_nama']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          <li> 
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
          </a>
          </li>
          <li>
            <a href="fasilitas_kamar.php">
              <i class="fa fa-building"></i> <span>ROOM FACILITIES</span>
            </a>
          </li>

          <li>
            <a href="kategori.php">
              <i class="fa fa-folder"></i> <span>ROOM CATEGORY</span>
            </a>
          </li>
          <li>
            <a href="layanan_tambahan.php">
              <i class="fa fa-bed"></i> <span>ADDITIONAL SERVICES</span>
            </a>
          </li>
          <li>
          <li>
            <a href="kamar.php">
              <i class="fa fa-bed"></i> <span>ROOM DATA</span>
            </a>
          </li>
          <li>
          <li>
            <a href="customer.php">
              <i class="fa fa-users"></i> <span>CUSTOMER DATA</span>
            </a>
          </li>

          <li>
            <a href="transaksi.php">
              <i class="fa fa-retweet"></i> <span>TRANSACTION / BOOKING</span>
            </a>
          </li>

          <li>
            <a href="laporan.php">
              <i class="fa fa-file"></i> <span>REPORT</span>
            </a>
          </li> 

          <li>
            <a href="admin.php">
              <i class="fa fa-user"></i> <span>ADMIN DATA</span>
            </a>
          </li>

          <li>
            <a href="gantipassword.php">
              <i class="fa fa-lock"></i> <span>CHANGE PASSWORD</span>
            </a>
          </li>



  <li>
    <a href="logout.php">
      <i class="fa fa-sign-out"></i> <span>LOGOUT</span>
    </a>
  </li>

          
        </ul>
      </section>
      <script>
      // After a delay, show the content and hide the loader
      setTimeout(function() {
        document.getElementById('loader-wrapper').style.display = 'none';
        document.querySelector('.content-wrapper').style.display = 'block';
      }, 500); // Adjust the delay (in milliseconds) as needed
    </script>
      <!-- /.sidebar -->
    </aside>
