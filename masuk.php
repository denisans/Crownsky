<?php include 'header.php'; ?>


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__text">
					<h4>Login Customer</h4>
					<div class="breadcrumb__links">
						<a href="index.php">Home</a>
						<a href="#">Customer</a>
						<span>Login</span>
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



			<form action="masuk_act.php" method="post">
				<div class="row justify-content-center">
					<div class="col-lg-6 col-md-6">

						<?php 
						if(isset($_GET['alert'])){
							if($_GET['alert'] == "terdaftar"){
								echo "<div class='alert alert-success text-center'>Congratulations, your account has been saved. Please login.</div>";
							}elseif($_GET['alert'] == "gagal"){
								echo "<div class='alert alert-danger text-center'>Email and password do not match, please try again.</div>";
							}elseif($_GET['alert'] == "login-dulu"){
								echo "<div class='alert alert-warning text-center'>Please login first to make a booking.</div>";
							}
						}
						?>

						<h6 class="coupon__code"><span class="icon_tag_alt"></span> Don't have an account yet? <a href="daftar.php" class="text-success">Click here</a> to sign up	</h6>
						<h6 class="checkout__title">Login</h6>

						<div class="checkout__input">
							<p>Email<span>*</span></p>
							<input type="email" class="input" required="required" name="email" placeholder="Email ..">

						</div>
						<div class="checkout__input">
							<p>Password<span>*</span></p>
							<input type="password" class="input" required="required" name="password" placeholder="Password ..">

						</div>
						
						<button type="submit" class="site-btn">LOGIN</button>

					</div>
					
				</div>
			</form>
		</div>
	</div>
</section>
<!-- Checkout Section End -->

<?php include 'footer.php'; ?>