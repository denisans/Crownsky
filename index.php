<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>


  <section class="content">

    <div class="row">

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
          <?php 
            $kamar = mysqli_query($koneksi,"SELECT * FROM kamar");
            ?>
            <h3><?php echo mysqli_num_rows($kamar); ?></h3>
            <p>Total Rooms</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="kamar.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-primary">
          <div class="inner">
          <?php 
            $kategori = mysqli_query($koneksi,"SELECT * FROM kategori");
            ?>
            <h3><?php echo mysqli_num_rows($kategori); ?></h3>
            <p>Total Room Categories</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-list"></i>
          </div>
          <a href="kategori.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>


      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
          <?php 
            $customer = mysqli_query($koneksi,"SELECT * FROM customer");
            ?>
            <h3><?php echo mysqli_num_rows($customer); ?></h3>
            <p>Total Customers</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="customer.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>


      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
          <?php 
            $invoice = mysqli_query($koneksi,"SELECT * FROM invoice");
            ?>
            <h3><?php echo mysqli_num_rows($invoice); ?></h3>
            <p>Total Transactions</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="transaksi.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

    </div>

    <div class="row">    
      <section class="col-lg-7">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Detail Login</h3>
          </div>
          <div class="box-body">
            <table class="table table-bordered">
              <tr>
                <th width="30%">Name</th>
                <td><?php echo $profil['admin_nama']; ?></td>
              </tr>
              <tr>
                <th>Username</th>
                <td><?php echo $profil['admin_username']; ?></td>
              </tr>
              <tr>
                <th>Status</th>
                <td>
                  <span class="label label-success text-uppercase">
                    online</span>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </section>
    </div>

  </section>

</div>
<?php include 'footer.php'; ?>