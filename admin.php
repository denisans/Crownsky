<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Admin
      <small>Admin Data</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Data Admin</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">

          <div class="box-header">
            <h3 class="box-title">Admin</h3>
            <a href="admin_tambah.php" class="btn btn-default btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Add New Admin</a>              
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>NAME</th>
                    <th>USERNAME</th>
                    <th width="15%">PHOTO</th>
                    <th width="10%">OPTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM admin");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['admin_nama']; ?></td>
                      <td><?php echo $d['admin_username']; ?></td>
                      <td>
                        <center>
                          <?php if($d['admin_foto'] == ""){ ?>
                            <img src="../gambar/sistem/user.png" style="width: 40px;height: auto">
                          <?php }else{ ?>
                            <img src="../gambar/user/<?php echo $d['admin_foto'] ?>" style="width: 40px;height: auto">
                          <?php } ?>
                        </center>
                      </td>
                      <td>                        
                        <a class="btn btn-warning btn-sm" href="admin_edit.php?id=<?php echo $d['admin_id'] ?>"><i class="fa fa-cog"></i></a>
                        <?php if($d['admin_id'] != 1){ ?>
                          <a class="btn btn-danger btn-sm" href="admin_hapus.php?id=<?php echo $d['admin_id'] ?>"><i class="fa fa-trash"></i></a>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php 
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>