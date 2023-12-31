<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Category
      <small>Category Edit</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Category</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-6">       
        <div class="box">

          <div class="box-header">
            <h3 class="box-title">Category Edit</h3>
            <a href="kategori.php" class="btn btn-default btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Back</a> 
          </div>
          <div class="box-body">
            <form action="kategori_update.php" method="post">
              <?php 
              $id = $_GET['id'];              
              $data = mysqli_query($koneksi, "select * from kategori where kategori_id='$id'");
              while($d = mysqli_fetch_array($data)){
                ?>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="hidden" name="id" value="<?php echo $d['kategori_id'] ?>">
                  <input type="text" class="form-control" name="nama" required="required" placeholder="Enter Category Name.." value="<?php echo $d['kategori_nama'] ?>">
                </div>

                <br>
                
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="save">
                </div>
                <?php 
              }
              ?>
            </form>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>