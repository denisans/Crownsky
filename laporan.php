<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      REPORT
      <small>Report Data</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-default">
          <div class="box-header">
            <h3 class="box-title">Report Filter</h3>
          </div>
          <div class="box-body">
            <form method="get" action="">
              <div class="row">

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Start Date</label>
                    <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_dari'])){echo $_GET['tanggal_dari'];}else{echo "";} ?>" name="tanggal_dari" class="form-control datepicker2" placeholder="Star Date" required="required">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label>End Date</label>
                    <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_sampai'])){echo $_GET['tanggal_sampai'];}else{echo "";} ?>" name="tanggal_sampai" class="form-control datepicker2" placeholder="End Date" required="required">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <br/>
                    <input type="submit" value="SHOW REPORT" class="btn btn-sm btn-primary">
                  </div>
                </div>

              </div>
            </form>
          </div>
        </div>

        <div class="box box-default">
          <div class="box-header">
            <h3 class="box-title">Booking Report</h3>
          </div>
          <div class="box-body">

            <?php 
            if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])){
              $tgl_dari = $_GET['tanggal_dari'];
              $tgl_sampai = $_GET['tanggal_sampai'];
              ?>

              <div class="row">
                <div class="col-lg-6">
                  <table class="table table-bordered">
                    <tr>
                      <th width="30%">FROM DATE</th>
                      <th width="1%">:</th>
                      <td><?php echo $tgl_dari; ?></td>
                    </tr>
                    <tr>
                      <th>TO DATE</th>
                      <th>:</th>
                      <td><?php echo $tgl_sampai; ?></td>
                    </tr>
                  </table>
                  
                </div>
              </div>

              <a href="laporan_print.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp PRINT</a>
              
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table-datatable">
                  <thead>
                    <tr>
                      <th width="1%">NO</th>
                      <th>INVOICE</th>
                      <th>BOOKING DATE</th>
                      <th>CUSTOMER NAME</th>
                      <th>ROOM</th>
                      <th>AMOUNT</th>
                      <th>STATUS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=1;
                    $data = mysqli_query($koneksi,"SELECT * FROM invoice,customer,kamar WHERE invoice_kamar=kamar_id and invoice_customer=customer_id and date(invoice_tanggal) >= '$tgl_dari' AND date(invoice_tanggal) <= '$tgl_sampai'");
                    while($i = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td>INVOICE-00<?php echo $i['invoice_id'] ?></td>
                        <td><?php echo date('d-m-Y', strtotime($i['invoice_tanggal'])); ?></td>
                        <td><?php echo $i['customer_nama'] ?></td>
                        <td><?php echo $i['kamar_nama'] ?></td>
                        <td><?php echo "Rp. ".number_format($i['invoice_total_bayar'])." ,-" ?></td>
                        <td>
                        <?php 
                          if($i['invoice_status'] == 0){
                            echo "Waiting for Payment";
                          }elseif($i['invoice_status'] == 1){
                            echo "Waiting for Confirmation";
                          }elseif($i['invoice_status'] == 2){
                            echo "Rejected";
                          }elseif($i['invoice_status'] == 3){
                            echo "Confirmed & Being Processed";
                          }elseif($i['invoice_status'] == 4){
                            echo "Completed";
                          }
                          ?>
                        </td>
                      </tr>
                      <?php 
                    }
                    ?>
                  </tbody>
                </table>
              </div>

              <?php 
            }else{
              ?>

              <div class="alert alert-success text-center">
              Please Filter the Report First.
              </div>

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