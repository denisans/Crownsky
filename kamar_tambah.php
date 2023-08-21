<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Room
      <small>Add New Room</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">       
        <div class="box">

          <div class="box-header">
            <h3 class="box-title">Add Room</h3>
            <a href="kamar.php" class="btn btn-default btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Back</a> 
          </div>
          <div class="box-body">

            <form action="kamar_act.php" method="post" enctype="multipart/form-data">



              <div class="row">

              <div class="col-lg-6">
              <div class="form-group">
                <label>Room Name</label>
                <input type="text" class="form-control" name="nama" required="required" placeholder="Enter Room Name..">
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label>Bed Type</label>
                <select name="ranjang" required="required" class="form-control">
                  <option value="">- Select Bed Type -</option>
                  <option value="Single">Twin</option>
                  <option value="Double">Double</option>
                  <option value="King">King</option>
                </select>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label>Room Size</label>
                <input type="number" class="form-control" name="ukuran" required="required" placeholder="Enter Room Size (m2) ..">
              </div>
            </div>


            <div class="col-lg-6">
              <div class="form-group">
                <label>Room Category</label>
                <select name="kategori" required="required" class="form-control">
                  <option value="">- Select Room Category -</option>
                  <?php 
                  $data = mysqli_query($koneksi,"SELECT * FROM kategori");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <option value="<?php echo $d['kategori_id']; ?>"><?php echo $d['kategori_nama']; ?></option>
                    <?php 
                  }
                  ?>
                </select>
              </div>
            </div>


            <div class="col-lg-6">
              <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control" name="harga" required="required" placeholder="Enter Price / night ..">
              </div>
            </div>


            <div class="col-lg-6">
              <div class="form-group">
                <label>Number of Rooms</label>
                <input type="number" class="form-control" name="jumlah" required="required" placeholder="Enter Number of Rooms ..">
              </div>
            </div>


            <div class="col-lg-8">
              <div class="form-group">
                <label>Description</label>
                <textarea name="keterangan" class="form-control textarea" style="resize: none" rows="10" placeholder="Additional description about the room (Optional).."></textarea>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-group">
                <label>Room Facilities</label>
                <br>
                <?php   
                $no_f = 1;
                $fasilitas = mysqli_query($koneksi,"select * from fasilitas_kamar order by fk_nama asc");
                while($f = mysqli_fetch_array($fasilitas)){
                  ?>
                  <input type="checkbox" value="<?php echo $f['fk_id'] ?>" name="fasilitas[]"> &nbsp; <?php echo $f['fk_nama']; ?> <br>
                  <?php 
                }
                ?>
                <br>
                <hr>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="form-group">
                <label>Photo 1 (Main Photo)</label>
                <input type="file" name="foto1">
              </div>
            </div>


            <div class="col-lg-4">
              <div class="form-group">
                <label>Photo 2</label>
                <input type="file" name="foto2">
              </div>
            </div>


            <div class="col-lg-4">
              <div class="form-group">
                <label>Photo 3</label>
                <input type="file" name="foto3">
              </div>
            </div>

          </div>

              <br>
              <br>

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