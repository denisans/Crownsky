<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Category
      <small>Category Data</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Category</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">

          <div class="box-header">
            <h3 class="box-title">Category</h3>
            <div class="btn-group pull-right">
              <a href="kategori_tambah.php" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> &nbsp Add Category</a>              
            </div>
          </div>
          <div class="box-body">

            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>NAME</th>
                    <th width="15%">OPTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM kategori");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['kategori_nama']; ?></td>
                      <td>                      
                        <?php if($d['kategori_id'] != 1){ ?>  
                          <a class="btn btn-warning btn-sm" href="kategori_edit.php?id=<?php echo $d['kategori_id'] ?>"><i class="fa fa-cog"></i></a>
                          <a class="btn btn-danger btn-sm" href="kategori_hapus_konfir.php?id=<?php echo $d['kategori_id'] ?>"><i class="fa fa-trash"></i></a>
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