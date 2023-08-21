<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Room Facilities
      <small>Add New Room Facilities</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Room Facilities</li>
      <li class="active">Add</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-6">   

        <div class="box">

          <div class="box-header">
            <h3 class="box-title">Add Room Facilities</h3>
            <a href="fasilitas_kamar.php" class="btn btn-default btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Back</a> 
          </div>
          <div class="box-body">

            <form action="fasilitas_kamar_act.php" method="post">

              <div class="form-group">
                <label>Icon</label>
                <input type="text" class="form-control" name="icon" required="required" readonly value="fa-circle">
              </div>

              <div class="form-group">
                <label>Facilities Name</label>
                <input type="text" class="form-control" name="nama" required="required" placeholder="Enter Facility Name..">
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Simpan">
              </div>

            </form>

          </div>
        </div>
      </section>
    </div>
  </section>
</div>
<?php include 'footer.php'; ?>