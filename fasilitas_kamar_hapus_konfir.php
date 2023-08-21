<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
    Delete Room Facility
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-6">    

        <br>

        <div class="box">

          <div class="box-header">
            <h3 class="box-title">Are You Sure You Want to Delete the Room Facility?</h3>
          </div>
          <div class="box-body">
            <br>
            <p>By deleting, the facility linked to other data will also be removed.</p>
            <br/>
            <br/>
            <a href="fasilitas_kamar.php" class="btn btn-danger btn-sm"><i class="fa fa-reply"></i> &nbsp Back</a> 
            <?php 
            $idd = $_GET['id'];
            ?>
            <a href="fasilitas_kamar_hapus.php?id=<?php echo $idd; ?>" class="btn btn-success btn-sm pull-right"><i class="fa fa-check"></i> &nbsp Delete</a> 
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>