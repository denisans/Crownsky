<?php 
$id = $_SESSION['customer_id'];
$customer = mysqli_query($koneksi,"select * from customer where customer_id='$id'");
$c = mysqli_fetch_assoc($customer)
?>

<div class="shop__sidebar">
	<div class="shop__sidebar__accordion">
		<div class="card">
			<div class="card-heading">
				<h5><b>Hy, <?php echo $c['customer_nama'] ?></b></h5>
			</div>
			<div class="card-body">
				<div class="shop__sidebar__tags">
					<a class="btn-block py-3" href="customer.php"> <i class="fa fa-home"></i> &nbsp; Dashboard</a>
					<a class="btn-block py-3" href="customer_pesanan.php"> <i class="fa fa-list"></i> &nbsp; My Order</a>
					<a class="btn-block py-3" href="customer_password.php"> <i class="fa fa-unlock"></i> &nbsp; Change Password</a>
					<a class="btn-block py-3" href="customer_logout.php"> <i class="fa fa-sign-out"></i> &nbsp; Logout</a>
				</div>
			</div>
		</div>
	</div>
</div>