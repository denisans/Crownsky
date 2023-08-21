<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
    Room Facilities
      <small>Edit Room Facilities</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Room Facilities</li>
      <li class="active">Edit</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-6">   

        <div class="box">

          <div class="box-header">
            <h3 class="box-title">Edit Room Facilities</h3>
            <a href="fasilitas_kamar.php" class="btn btn-default btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Back</a> 
          </div>
          <div class="box-body">

           <?php 
           $id = $_GET['id'];              
           $data = mysqli_query($koneksi, "select * from fasilitas_kamar where fk_id='$id'");
           while($d = mysqli_fetch_array($data)){
            ?>

            <form action="fasilitas_kamar_update.php" method="post">

              <div class="form-group">
                <label>Icon</label>
                <input type="hidden" name="id" value="<?php echo $d['fk_id'] ?>">
                <input type="text" class="form-control" name="icon" required="required" readonly value="fa-circle">
            
              </div>

              <div class="form-group">
                <label>Facilities Name</label>
                <input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['fk_nama'] ?>" placeholder="Enter Facility Name..">
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Save">
              </div>

            </form>
            <?php 
          }
          ?>

        </div>
      </div>
    </section>
  </div>
</section>
</div>
<?php include 'footer.php'; ?>