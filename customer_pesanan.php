<?php include 'header.php'; ?>


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__text">
					<h4>Dashboard Customer</h4>
					<div class="breadcrumb__links">
						<a href="index.php">Home</a>
						<a href="#">Customer</a>
						<span>Pesanan</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
	<div class="container">
		<div class="row">
			
			<div id="aside" class="col-md-3">
				<?php 
				include 'customer_sidebar.php'; 
				?>
			</div>

			<div id="main" class="col-md-9">
				
				<h4><b>My room reservation</b></h4>
				<br>

				<div>

					<?php 
					if(isset($_GET['alert'])){
						if($_GET['alert'] == "gagal"){
							echo "<div class='alert alert-danger'>Failed to upload image!</div>";
						}elseif($_GET['alert'] == "sukses"){
							echo "<div class='alert alert-success'>Booking successful, please proceed with the payment!</div>";
						}elseif($_GET['alert'] == "upload"){
							echo "<div class='alert alert-success'>Payment confirmation successfully saved, please wait for admin's confirmation!</div>";
						}
					}
					?>

					<small class="text-muted">
					All room booking data / invoice.
					</small>

					<br/>
					<br/>


					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>NO</th>
									<th>No.Invoice</th>
									<th>Customer</th>
									<th class="text-center">Status</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no = 1;
								$id = $_SESSION['customer_id'];
								$invoice = mysqli_query($koneksi,"select * from invoice where invoice_customer='$id' order by invoice_id desc");
								while($i = mysqli_fetch_array($invoice)){
									?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td>
											<small class="text-muted"><?php echo date('d/m/Y', strtotime($i['invoice_tanggal'])) ?></small><br>
											INVOICE-00<?php echo $i['invoice_id'] ?><br>
											<small><?php echo "Rp. ".number_format($i['invoice_total_bayar'])." ,-" ?></small>

										</td>
										<td><?php echo $i['invoice_nama'] ?></td>
										<td class="text-center">
											<?php 
											if($i['invoice_status'] == 0){
												echo "<span class='badge badge-warning'>Awaiting Payment</span>";
											}elseif($i['invoice_status'] == 1){
												echo "<span class='badge badge-default'>Awaiting Confirmation</span>";
											}elseif($i['invoice_status'] == 2){
												echo "<span class='badge badge-danger'>Rejected</span>";
											}elseif($i['invoice_status'] == 3){
												echo "<span class='badge badge-primary'>Confirmed</span>";
											}elseif($i['invoice_status'] == 4){
												echo "<span class='badge badge-success'>Completed</span>";
											}
											?>

										</td>
										<td class="text-center">
											<?php 
											if($i['invoice_status'] == 0){
												?>
												<a class='btn btn-sm btn-primary' href="customer_pembayaran.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-money"></i> Payment Confirmation</a>
												<?php
											}elseif($i['invoice_status'] == 1){
												?>
												<a class='btn btn-sm btn-primary' href="customer_pembayaran.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-money"></i> Payment Confirmation</a>
												<?php
											}
											?>

											<?php 
											if($i['invoice_status'] == 4){
												?>
												<a class='btn btn-sm btn-danger' href="customer_rating.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-star"></i> Give Rating & Review</a>
												<?php
											}
											?>
											<a class='btn btn-sm btn-success' href="customer_invoice.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-print"></i> Invoice</a>
										</td>
									</tr>
									<?php 
								}
								?>
							</tbody>
						</table>
					</div>


					<small class="text-muted">When the status changes to 'Confirmed', please provide the INVOICE NUMBER and Identification Card (ID Card/Driver's License, etc.) to the receptionist upon CHECK-IN.</small>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- Checkout Section End -->

<?php include 'footer.php'; ?>