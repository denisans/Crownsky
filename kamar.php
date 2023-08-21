<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Room
      <small>Room Data</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Room</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box">

          <div class="box-header">
            <h3 class="box-title">Room</h3>
            <a href="kamar_tambah.php" class="btn btn-default btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Add New Room</a>              
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th class="text-center" width="1%">NO</th>
                    <th class="text-center">ROOM NAME</th>
                    <th class="text-center" width="10%">BED TYPE</th>
                    <th class="text-center">SIZE</th>
                    <th class="text-center">CATEGORY</th>
                    <th class="text-center" width="10%">PRICE</th>
                    <th class="text-center">QUANTITY</th>
                    <th class="text-center" width="1%">PHOTO</th>
                    <th class="text-center" width="10%">OPTIONS</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM kamar,kategori where kategori_id=kamar_kategori order by kamar_id desc");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td>
                        <?php echo $d['kamar_nama']; ?>
                        <br>
                        <small class="text-muted">
                          <?php   
                          $id_kamar = $d['kamar_id'];
                          $fasilitas = mysqli_query($koneksi,"select * from fasilitas_kamar,kamar_fasilitas where fk_id=kf_fasilitas and kf_kamar='$id_kamar' order by fk_nama asc");
                          while($f = mysqli_fetch_array($fasilitas)){
                            echo $f['fk_nama'].", ";
                          }
                          ?>
                        </small>
                      </td>
                      <td class="text-center"><?php echo $d['kamar_ranjang']; ?></td>
                      <td><?php echo $d['kamar_ukuran']; ?> m2</td>
                      <td><?php echo $d['kategori_nama']; ?></td>
                      <td><?php echo "Rp. ".number_format($d['kamar_harga']).",-"; ?></td>
                      <td class="text-center">
                        <?php echo number_format($d['kamar_jumlah']); ?>
                      </td>
                      <td>
                        <center>
                          <?php if($d['kamar_foto1'] == ""){ ?>
                            <img src="../gambar/sistem/kamar.png" style="width: 70px;height: auto">
                          <?php }else{ ?>
                            <img src="../gambar/kamar/<?php echo $d['kamar_foto1'] ?>" style="width: 70px;height: auto">
                          <?php } ?>
                        </center>
                      </td>
                      <td>                        
                        <a class="btn btn-warning btn-sm" href="kamar_edit.php?id=<?php echo $d['kamar_id'] ?>"><i class="fa fa-cog"></i></a>
                        <a class="btn btn-danger btn-sm" onclick=" return confirm('Delete?')" href="kamar_hapus.php?id=<?php echo $d['kamar_id'] ?>"><i class="fa fa-trash"></i></a>
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