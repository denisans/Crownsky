<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Room
      <small>Edit Room</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Room</li>
    </ol>
  </section>

  <?php 
  function check_fasiltas($id_kamar, $id_fasilitas){
    global $koneksi;

    $fasilitas = mysqli_query($koneksi,"select * from kamar_fasilitas where kf_kamar='$id_kamar' and kf_fasilitas='$id_fasilitas'");
    $cek = mysqli_num_rows($fasilitas);
    if($cek > 0){
      echo "checked='checked'";
    }



  }
  ?>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">       
        <div class="box">

          <div class="box-header">
            <h3 class="box-title">Edit Room</h3>
            <a href="kamar.php" class="btn btn-default btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Back</a> 
          </div>
          <div class="box-body">

            <?php 
            $id = $_GET['id'];
            $data = mysqli_query($koneksi,"select * from kamar where kamar_id='$id'");
            while($d = mysqli_fetch_array($data)){
              ?>

              <form action="kamar_update.php" method="post" enctype="multipart/form-data">

                <div class="row">

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Room Name</label>
                      <input type="hidden" name="id" value="<?php echo $d['kamar_id']; ?>">
                      <input type="text" class="form-control" name="nama" required="required" placeholder="Enter Room Name.." value="<?php echo $d['kamar_nama']; ?>">
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Bed Types</label>
                      <select name="ranjang" required="required" class="form-control">
                        <option value="">- Select Bed Type -</option>
                        <option <?php if($d['kamar_ranjang'] == "Twin"){echo "selected='selected'";} ?> value="Twin">Twin</option>
                        <option <?php if($d['kamar_ranjang'] == "Double"){echo "selected='selected'";} ?> value="Double">Double</option>
                        <option <?php if($d['kamar_ranjang'] == "King"){echo "selected='selected'";} ?> value="King">King</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Room Size</label>
                      <input type="number" class="form-control" name="ukuran" required="required" placeholder="Enter Room Size (m2) .." value="<?php echo $d['kamar_ukuran']; ?>">
                    </div>
                  </div>


                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Room Category</label>
                      <select name="kategori" required="required" class="form-control">
                        <option value="">- Select Room Category -</option>
                        <?php 
                        $kategori = mysqli_query($koneksi,"SELECT * FROM kategori");
                        while($k = mysqli_fetch_array($kategori)){
                          ?>
                          <option <?php if($k['kategori_id'] == $d['kamar_kategori']){echo "selected='selected'";} ?> value="<?php echo $k['kategori_id']; ?>"><?php echo $k['kategori_nama']; ?></option>
                          <?php 
                        }
                        ?>
                      </select>
                    </div>
                  </div>


                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Price</label>
                      <input type="number" class="form-control" name="harga" required="required" placeholder="Enter Price / night .." value="<?php echo $d['kamar_harga']; ?>">
                    </div>
                  </div>


                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Number of Rooms</label>
                      <input type="number" class="form-control" name="jumlah" required="required" placeholder="Enter Number of Rooms .." value="<?php echo $d['kamar_jumlah']; ?>">
                    </div>
                  </div>


                  <div class="col-lg-8">
                    <div class="form-group">
                      <label>Descripition</label>
                      <textarea name="keterangan" class="form-control textarea" style="resize: none" rows="10" placeholder="Additional description about the room (Optional) .."><?php echo $d['kamar_keterangan']; ?></textarea>
                    </div>
                  </div>


                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Room Facilities</label>
                      <br>
                      <?php   
                      $no_f = 1;
                      $id_kamar = $d['kamar_id'];
                      $fasilitas = mysqli_query($koneksi,"select * from fasilitas_kamar order by fk_nama asc");
                      while($f = mysqli_fetch_array($fasilitas)){
                        ?>
                        <input type="checkbox" value="<?php echo $f['fk_id'] ?>" name="fasilitas[]" <?php check_fasiltas($id_kamar, $f['fk_id']); ?>> &nbsp; <?php echo $f['fk_nama']; ?> <br>
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

                      <br>

                      <?php if($d['kamar_foto1'] == ""){ ?>
                        <img src="../gambar/sistem/kamar.png" style="width: 120px;height: auto">
                      <?php }else{ ?>
                        <img src="../gambar/kamar/<?php echo $d['kamar_foto1'] ?>" style="width: 120px;height: auto">
                      <?php } ?>

                      <br/>
                      <small class="text-muted">Leave it blank if you don't want to change the photo</small>

                    </div>
                  </div>


                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Photo 2</label>
                      <input type="file" name="foto2">

                      <br>

                      <?php if($d['kamar_foto2'] == ""){ ?>
                        <img src="../gambar/sistem/kamar.png" style="width: 120px;height: auto">
                      <?php }else{ ?>
                        <img src="../gambar/kamar/<?php echo $d['kamar_foto2'] ?>" style="width: 120px;height: auto">
                      <?php } ?>

                      <br/>
                      <small class="text-muted">Leave it blank if you don't want to change the photo</small>


                    </div>
                  </div>


                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Photo 3</label>
                      <input type="file" name="foto3">

                      <br>

                      <?php if($d['kamar_foto3'] == ""){ ?>
                        <img src="../gambar/sistem/kamar.png" style="width: 120px;height: auto">
                      <?php }else{ ?>
                        <img src="../gambar/kamar/<?php echo $d['kamar_foto3'] ?>" style="width: 120px;height: auto">
                      <?php } ?>

                      <br/>
                      <small class="text-muted">Leave it blank if you don't want to change the photo</small>
                    </div>
                  </div>

                </div>


                <br>
                <br>

                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Simpan">
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