<!DOCTYPE html>
<html>
<head>
      <title>Sales Report</title>
</head>
<body>

  <style type="text/css">

    @media print{@page {size: landscape}}
    
    body{
      font-family: sans-serif;
    }

    .table{
      width: 100%;
    }

    th,td{
    }
    .table,
    .table th,
    .table td {
      padding: 2px;
      border: 1px solid black;
      border-collapse: collapse;
      font-size: 10pt;
      text-align: center;
    }
  </style>

    
  <center>
    <h2>Room Transaction Report</h2>
  </center>

  <?php 
  include '../koneksi.php';
  if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])){
    $tgl_dari = $_GET['tanggal_dari'];
    $tgl_sampai = $_GET['tanggal_sampai'];
    ?>
    <br/>

    <table class="">
      <tr>
        <td width="20%">FROM DATE</td>
        <td width="1%">:</td>
        <td><?php echo $tgl_dari; ?></td>
      </tr>
      <tr>
        <td>TO DATE</td>
        <td>:</td>
        <td><?php echo $tgl_sampai; ?></td>
      </tr>
    </table>

    <br/>

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
        $data = mysqli_query($koneksi,"SELECT * FROM invoice,customer,kamar WHERE kamar_id=invoice_kamar and invoice_customer=customer_id and date(invoice_tanggal) >= '$tgl_dari' AND date(invoice_tanggal) <= '$tgl_sampai'");
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
                echo "Confirmed";
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

    <?php 
  }else{
    ?>

    <div class="alert alert-info text-center">
    Please Filter the Report First.
    </div>

    <?php
  }
  ?>
</body>

<script>
  window.print();
</script>
</html>