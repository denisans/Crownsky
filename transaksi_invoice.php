<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Transactions
      <small>Transaction / Order Data</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Order Invoice</h3>
          </div>
          <div class="box-body">

            <div class="row">

              <?php 
              $id_invoice = $_GET['id'];
              $invoice = mysqli_query($koneksi,"select * from invoice where invoice_id='$id_invoice' order by invoice_id desc");
              while($i = mysqli_fetch_array($invoice)){
                ?>


                <div class="col-lg-12">

                  <a href="transaksi.php" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> BACK</a>
                  <a href="transaksi_invoice_cetak.php?id=<?php echo $_GET['id'] ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> PRINT</a>

                  <br/>
                  <br/>

                  <h4>INVOICE-00<?php echo $i['invoice_id'] ?></h4>


                  <br/>
                  <table class="table table-bordered">
                    <tr>
                      <th width="20%">Name</th>
                      <td><?php echo $i['invoice_nama']; ?></td>
                    </tr>
                    <tr>
                      <th>Phone</th>
                      <td><?php echo $i['invoice_hp']; ?></td>
                    </tr>
                  </table> 
                  <br/>

                  <?php 
                  $no=1;
                  $id_kamar = $i['invoice_kamar'];
                  $kamar = mysqli_query($koneksi,"SELECT * FROM kamar,kategori where kategori_id=kamar_kategori and kamar_id='$id_kamar' order by kamar_id desc");
                  $k = mysqli_fetch_assoc($kamar);
                  ?>

                  <div class="row">

                    <div class="col-lg-2">
                      <?php if($k['kamar_foto1'] == ""){ ?>
                        <img src="../gambar/sistem/kamar.png" style="width: 100%;height: auto">
                      <?php }else{ ?>
                        <img src="../gambar/kamar/<?php echo $k['kamar_foto1'] ?>" style="width: 100%;height: auto">
                      <?php } ?>
                    </div>

                    <div class="col-lg-10">

                      <h5><?php echo $k['kamar_nama']; ?></h5>


                      <small class="text-muted">
                        <?php echo $k['kategori_nama']; ?>
                        |
                        Beds : <?php echo $k['kamar_ranjang']; ?>
                        |
                        Room Size : <?php echo $k['kamar_ukuran']; ?> m2
                        <br>
                        Fcilities : 
                        <?php   
                        $id_kamar = $k['kamar_id'];
                        $fasilitas = mysqli_query($koneksi,"select * from fasilitas_kamar,kamar_fasilitas where fk_id=kf_fasilitas and kf_kamar='$id_kamar' order by fk_nama asc");
                        while($f = mysqli_fetch_array($fasilitas)){
                          echo $f['fk_nama'].", ";
                        }
                        ?>
                        <br>
                        Price : <b><?php echo "Rp. ".number_format($k['kamar_harga']).",-"; ?></b> / night

                      </small>

                    </div>

                  </div>

                  <br>

                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <th>Room Price</th>
                          <td class="text-center"><?php echo "Rp. ".number_format($i['invoice_harga'])." ,-"; ?></td>
                        </tr>
                        <tr>
                          <th>
                          Length of Stay :
                            <br>
                            <small class="text-muted"><?php echo date('d/m/Y', strtotime($i['invoice_dari'])); ?> - <?php echo date('d/m/Y', strtotime($i['invoice_sampai'])); ?></small>
                          </th>
                          <td class="text-center">
                            <?php 
                            $tgl_dari = strtotime($i['invoice_dari'] );
                            $tgl_sampai = strtotime($i['invoice_sampai'] );
                            $jumlah_hari =  $tgl_sampai - $tgl_dari;
                            $hari = round($jumlah_hari / (60 * 60 * 24));
                            ?>
                            <?php echo $hari ?> Days

                          </td>
                        </tr>
                        <tr>
                          <th>
                          Number of Reserved Rooms
                          </th>
                          <td class="text-center"><?php echo $i['invoice_jumlah_kamar']; ?></td>
                        </tr>
                        <tr>
                          <th>
                          Additional Services :
                            <br>
                            <?php   
                            $harga_layanan = 0;
                            $id_invoice = $i['invoice_id'];
                            $layanan = mysqli_query($koneksi,"select * from layanan_tambahan, invoice_layanan_tambahan where ilt_layanan=lt_id and ilt_invoice='$id_invoice'");
                            while($l = mysqli_fetch_array($layanan)){
                              $harga_layanan += $l['lt_harga'];
                              ?>
                              <small class="text-muted">- <?php echo $l['lt_nama'] ?> &nbsp; - &nbsp; (<?php echo "Rp. ".number_format($l['lt_harga'])." ,-" ?>)</small><br>
                              <?php
                            }
                            ?>
                          </th>
                          <td class="text-center"><?php echo "Rp. ".number_format($harga_layanan)." ,-"; ?></td>
                        </tr>
                        <tr>
                          <th>Total Payment</th>
                          <td class="text-center bg-primary text-white font-weight-bold"><?php echo "Rp. ".number_format($i['invoice_total_bayar'])." ,-"; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>


                  <br>
                  <h5>STATUS :</h5> 
                  <?php 
                  if($i['invoice_status'] == 0){
                    echo "<span class='label label-warning'>Awaiting Payment</span>";
                  }elseif($i['invoice_status'] == 1){
                    echo "<span class='label label-default'>Awaiting Confirmation</span>";
                  }elseif($i['invoice_status'] == 2){
                    echo "<span class='label label-danger'>Rejected</span>";
                  }elseif($i['invoice_status'] == 3){
                    echo "<span class='label label-primary'>Confirmed</span>";
                  }elseif($i['invoice_status'] == 4){
                    echo "<span class='label label-success'>Completed</span>";
                  }
                  ?>

                </div>  


                <?php 
              }
              ?>
            </div>

          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>