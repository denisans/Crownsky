<?php include 'header.php'; ?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__text">
					<h4>Daftar Customer</h4>
					<div class="breadcrumb__links">
						<a href="index.php">Home</a>
						<a href="#">Customer</a>
						<span>Daftar</span>
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
		<div class="checkout__form">
			<form action="daftar_act.php" method="post">
				<div class="row justify-content-center">
					<div class="col-lg-6 col-md-6">

						<?php 
						if(isset($_GET['alert'])){
							if($_GET['alert'] == "duplikat"){
								echo "<div class='alert alert-danger text-center'>Maaf email ini sudah digunakan, silahkan gunakan email yang lain.</div>";
							}
						}
						?>

						<h6 class="coupon__code"><span class="icon_tag_alt"></span> Already have an account? <a href="masuk.php" class="text-success">Click here</a> to login.</h6>
						
						<h6 class="checkout__title">Register</h6>
						<div class="checkout__input">
							<p>Fullname<span>*</span></p>
							<input type="text" class="input" required="required" name="nama" placeholder="Fullname ..">
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="checkout__input">
									<p>Email<span>*</span></p>
									<input type="email" class="input" required="required" name="email" placeholder="Email ..">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="checkout__input">
									<p>Phone Number / Whatsapp<span>*</span></p>
									<input type="number" class="input" required="required" name="hp" placeholder="Phone number/Whatsapp ..">
								</div>
							</div>
						</div>
						<div class="checkout__input">
							<p>Address<span>*</span></p>
							<input type="text" class="input" required="required" name="alamat" placeholder="Full Address ..">
						</div>
						<div class="checkout__input">
							<p>Password<span>*</span> <small class="text-muted">This password is used to log in to your account.</small></p>
							<input type="password" class="input" required="required" name="password" placeholder="Password ..">
						</div>
						
						<button type="submit" class="site-btn">REGISTER NOW</button>
					</div>
					
				</div>
			</form>
		</div>
	</div>
</section>
<!-- Checkout Section End -->


<?php include 'footer.php'; ?>