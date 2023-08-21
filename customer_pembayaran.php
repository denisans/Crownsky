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
						<span>Payment Confirmation</span>
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
				
				<h4><b>PAYMENT CONFIRMATION</b></h4>
				<br>

				<div>

					<?php 
					if(isset($_GET['alert'])){
						if($_GET['alert'] == "gagal"){
							echo "<div class='alert alert-danger'>Failed to upload image!</div>";
						}elseif($_GET['alert'] == "sukses"){
							echo "<div class='alert alert-success'>Booking successful, please proceed with the payment!</div>";
						}elseif($_GET['alert'] == "upload"){
							echo "<div class='alert alert-success'>Payment confirmation successfully saved, please wait for admin's confirmation</div>";
						}
					}
					?>

					<a href="customer_pesanan.php" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
					<br>
					<br>
					<div class="row">

						<div class="col-lg-12">

							<table class="table table-bordered">
								<tbody>
									<?php 
									$id_invoice = mysqli_escape_string($koneksi, $_GET['id']);
									$id = $_SESSION['customer_id'];
									$invoice = mysqli_query($koneksi,"select * from invoice where invoice_customer='$id' and invoice_id='$id_invoice' order by invoice_id desc");
									while($i = mysqli_fetch_array($invoice)){
										?>
										<tr>
											<th width="20%">No.Invoice</th>	
											<td>INVOICE-00<?php echo $i['invoice_id'] ?></td>
										</tr>
										<tr>
											<th>Date</th>	
											<td><?php echo date('d-m-Y', strtotime($i['invoice_tanggal'])) ?></td>
										</tr>
										<tr>
											<th>Total Payment</th>	
											<td><?php echo "Rp. ".number_format($i['invoice_total_bayar'])." ,-" ?></td>
										</tr>
										<tr>
											<th>Status</th>	
											<td>

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
											</td>
										</tr>
										<?php 
									}
									?>
								</tbody>
							</table>

							<br/>
							<p>Please make the payment to the following bank account:</p>
							<table class="table table-bordered">
								<tr>
									<th width="30%">Account Number</th>
									<td>123-122-3345</td>
								</tr>
								<tr>
									<th>Account name</th>
									<td>Crown Sky Hotel</td>
								</tr>
								<tr>
									<th>Bank</th>
									<td>BCA</td>
								</tr>
							</table>
							<br/>

							<form action="customer_pembayaran_act.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<input type="hidden" name="id" value="<?php echo $id_invoice; ?>">
									<label>Upload Payment Proof</label>
									<br>
									<input type="file" name="bukti" required="required">
									<small class="text-muted">Only image files are allowed.</small>
								</div>
								<br>
								<input type="submit" value="Upload Payment Proof" class="site-btn">
							</form>

						</div>	

					</div>

					
				</div>

			</div>
		</div>
	</div>
</section>
<!-- Checkout Section End -->

<?php include 'footer.php'; ?>