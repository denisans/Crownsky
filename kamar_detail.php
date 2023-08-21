 <?php include('header.php'); ?>


 <?php 
 $id_kamar = mysqli_real_escape_string($koneksi, $_GET['id']);
 $data = mysqli_query($koneksi,"select * from kamar,kategori where kategori_id=kamar_kategori and kamar_id='$id_kamar'");
 while($d=mysqli_fetch_array($data)){
 	?>
 	<!-- Shop Details Section Begin -->
 	<section class="shop-details">
 		<div class="product__details__pic">
 			<div class="container">

 				<div class="row">
 					<div class="col-lg-3 col-md-3">
 						<ul class="nav nav-tabs" role="tablist">

 							<?php if($d['kamar_foto1'] == ""){ ?>
 								<li class="nav-item">
 									<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
 										<div class="product__thumb__pic set-bg" data-setbg="gambar/sistem/kamar.png"></div>
 									</a>
 								</li>
 							<?php }else{ ?>
 								<li class="nav-item">
 									<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
 										<div class="product__thumb__pic set-bg" data-setbg="gambar/kamar/<?php echo $d['kamar_foto1'] ?>"></div>
 									</a>
 								</li>
 							<?php } ?>

 							<?php if($d['kamar_foto2'] == ""){ ?>
 								<li class="nav-item">
 									<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
 										<div class="product__thumb__pic set-bg" data-setbg="gambar/sistem/kamar.png"></div>
 									</a>
 								</li>
 							<?php }else{ ?>
 								<li class="nav-item">
 									<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
 										<div class="product__thumb__pic set-bg" data-setbg="gambar/kamar/<?php echo $d['kamar_foto2'] ?>"></div>
 									</a>
 								</li>
 							<?php } ?>


 							<?php if($d['kamar_foto3'] == ""){ ?>
 								<li class="nav-item">
 									<a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
 										<div class="product__thumb__pic set-bg" data-setbg="gambar/sistem/kamar.png"></div>
 									</a>
 								</li>
 							<?php }else{ ?>
 								<li class="nav-item">
 									<a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
 										<div class="product__thumb__pic set-bg" data-setbg="gambar/kamar/<?php echo $d['kamar_foto3'] ?>"></div>
 									</a>
 								</li>
 							<?php } ?>


 						</ul>
 					</div>
 					<div class="col-lg-6 col-md-9">
 						<div class="tab-content">

 							<?php if($d['kamar_foto1'] == ""){ ?>
 								<div class="tab-pane active" id="tabs-1" role="tabpanel">
 									<div class="product__details__pic__item">
 										<img src="gambar/sistem/kamar.png" alt="">
 									</div>
 								</div>
 							<?php }else{ ?>
 								<div class="tab-pane active" id="tabs-1" role="tabpanel">
 									<div class="product__details__pic__item">
 										<img src="gambar/kamar/<?php echo $d['kamar_foto1'] ?>" alt="">
 									</div>
 								</div>
 							<?php } ?>

 							<?php if($d['kamar_foto2'] == ""){ ?>
 								<div class="tab-pane" id="tabs-2" role="tabpanel">
 									<div class="product__details__pic__item">
 										<img src="gambar/sistem/kamar.png" alt="">
 									</div>
 								</div>
 							<?php }else{ ?>
 								<div class="tab-pane" id="tabs-2" role="tabpanel">
 									<div class="product__details__pic__item">
 										<img src="gambar/kamar/<?php echo $d['kamar_foto2'] ?>" alt="">
 									</div>
 								</div>
 							<?php } ?>

 							<?php if($d['kamar_foto3'] == ""){ ?>
 								<div class="tab-pane" id="tabs-3" role="tabpanel">
 									<div class="product__details__pic__item">
 										<img src="gambar/sistem/kamar.png" alt="">
 									</div>
 								</div>
 							<?php }else{ ?>
 								<div class="tab-pane" id="tabs-3" role="tabpanel">
 									<div class="product__details__pic__item">
 										<img src="gambar/kamar/<?php echo $d['kamar_foto3'] ?>" alt="">
 									</div>
 								</div>
 							<?php } ?>

 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 		<div class="product__details__content">
 			<div class="container">
 				<div class="row d-flex justify-content-center">
 					<div class="col-lg-8">
 						<div class="product__details__text">
 							<h2 class="font-weight-bold"><?php echo $d['kamar_nama']; ?></h2>
 							<div class="rating">
 								
 								<?php 
 								$rata = bintang($d['kamar_id']);
 								?>

 								<?php if($rata >= 1){ ?>
 									<i class="fa fa-star text-warning"></i>
 								<?php }else{ ?>
 									<i class="fa fa-star-o"></i>
 								<?php } ?>
 								<?php if($rata >= 2){ ?>
 									<i class="fa fa-star text-warning"></i>
 								<?php }else{ ?>
 									<i class="fa fa-star-o"></i>
 								<?php } ?>
 								<?php if($rata >= 3){ ?>
 									<i class="fa fa-star text-warning"></i>
 								<?php }else{ ?>
 									<i class="fa fa-star-o"></i>
 								<?php } ?>
 								<?php if($rata >= 4){ ?>
 									<i class="fa fa-star text-warning"></i>
 								<?php }else{ ?>
 									<i class="fa fa-star-o"></i>
 								<?php } ?>
 								<?php if($rata >= 5){ ?>
 									<i class="fa fa-star text-warning"></i>
 								<?php }else{ ?>
 									<i class="fa fa-star-o"></i>
 								<?php } ?>

 								<?php 
 								$pemberi = mysqli_query($koneksi,"select * from rating, invoice where rating_invoice=invoice_id and invoice_kamar='$id_kamar'");
 								$p = mysqli_num_rows($pemberi);
 								?>
 								<span> - <?php echo $p ?> Reviews</span>
 							</div>
 							<br>

 							<h4><?php echo "Rp. ".number_format($d['kamar_harga']).",-"; ?> / Night </h4>

 							<br>
 							<p class="mb-0">The best room service to accompany your vacation time with family, relatives, or loved ones. Don't miss out, book now!</p>
 							<br>
 							<p class="mb-0">Facility :</p>
 							<div class="shop__sidebar__tags mb-5">
 								<?php   
 								$id_kamar = $d['kamar_id'];
 								$fasilitas = mysqli_query($koneksi,"select * from fasilitas_kamar,kamar_fasilitas where fk_id=kf_fasilitas and kf_kamar='$id_kamar' order by fk_nama asc");
 								while($f = mysqli_fetch_array($fasilitas)){
 									?>
 									<a href="#"><i class="fa <?php echo $f['fk_icon'] ?>"></i> &nbsp; <?php echo $f['fk_nama'] ?></a>
 									<?php
 								}	
 								?>
 							</div>


 							<div class="product__details__cart__option"> 								
 								<a href="booking.php?id=<?php echo $d['kamar_id'] ?>" class="primary-btn">Booking Room</a>
 							</div>

 							<div class="product__details__last__option">	
 								<ul>
 									<li><span>Room size:</span> <?php echo $d['kamar_ukuran'] ?> m2</li>
 									<li><span>Bed Type:</span> <?php echo $d['kamar_ranjang'] ?></li>
 									<li><span>Category:</span> <?php echo $d['kategori_nama'] ?></li>
 								</ul>
 							</div>
 						</div>
 					</div>
 				</div>
 				<div class="row">
 					<div class="col-lg-12">
 						<div class="product__details__tab">
 							<ul class="nav nav-tabs" role="tablist">
 								<li class="nav-item">
 									<a class="nav-link active" data-toggle="tab" href="#tabs-5"
 									role="tab">Description</a>
 								</li>
 								<li class="nav-item">
 									<a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Customer Reviews (<?php echo $p ?>)</a>
 								</li>
 							</ul>
 							<div class="tab-content">
 								<div class="tab-pane active" id="tabs-5" role="tabpanel">
 									<div class="product__details__tab__content">
 										
 										<div class="product__details__tab__content__item">
 											<?php if($d['kamar_keterangan'] != ""){ ?>
 												<?php echo $d['kamar_keterangan'] ?>
 											<?php }else{ ?>
 												<br><br>
 												<center><h4>There are no descripyion yet.</h4></center>
 												<br>
 											<?php } ?>
 										</div>

 									</div>
 								</div>
 								<div class="tab-pane" id="tabs-6" role="tabpanel">
 									<div class="product__details__tab__content">
 										<div class="product__details__tab__content__item">
 											<h5>Rating & Customer Reviews</h5>
 											<?php 
 											if($p > 0){
 												?>


 												<div class="row">

 													<?php 
 													$id_kamar = $d['kamar_id'];
 													$review = mysqli_query($koneksi,"select * from rating,customer,invoice where rating_invoice=invoice_id and invoice_customer=customer_id and invoice_kamar='$id_kamar'");
 													while($r=mysqli_fetch_array($review)){
 														?>


 														<div class="col-lg-12">
 															<div class="review-heading">
 																
 																<div class="review-rating pull-right">
 																	<?php if($r['rating'] >= 1){ ?>
 																		<i class="fa fa-star text-warning"></i>
 																	<?php }else{ ?>
 																		<i class="fa fa-star-o text-warning"></i>
 																	<?php } ?>
 																	<?php if($r['rating'] >= 2){ ?>
 																		<i class="fa fa-star text-warning"></i>
 																	<?php }else{ ?>
 																		<i class="fa fa-star-o text-warning"></i>
 																	<?php } ?>
 																	<?php if($r['rating'] >= 3){ ?>
 																		<i class="fa fa-star text-warning"></i>
 																	<?php }else{ ?>
 																		<i class="fa fa-star-o text-warning"></i>
 																	<?php } ?>
 																	<?php if($r['rating'] >= 4){ ?>
 																		<i class="fa fa-star text-warning"></i>
 																	<?php }else{ ?>
 																		<i class="fa fa-star-o text-warning"></i>
 																	<?php } ?>
 																	<?php if($r['rating'] >= 5){ ?>
 																		<i class="fa fa-star text-warning"></i>
 																	<?php }else{ ?>
 																		<i class="fa fa-star-o text-warning"></i>
 																	<?php } ?>
 																</div>

 																<div>
 																	<h6 class="font-weight-bold"><i class="fa fa-user-o"></i> <?php echo $r['customer_nama'] ?> - <small class="text-muted"><i class="fa fa-clock-o"></i> <?php echo date('d M Y', strtotime($r['rating_tanggal'])) ?></small></h6>
 																</div>
 															
 															</div>
 															<div class="review-body">
 																<br>
 																<i><p>" <?php echo $r['rating_review'] ?> ".</p></i>
 															</div>
                                                            <hr>
 														</div>

 														<?php 
 													}
 													?>
 												</div>


 												<?php 
 											}else{
 												?>
 												<br><br>
 												<center><h4>There are no reviews yet.</h4></center>
 												<br>
 												<?php 
 											}
 											?>
 										</div>
 										
 									</div>
 								</div>
 								
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</section>
 	<!-- Shop Details Section End -->

 	<?php 
 }
 ?>


 <br>
 <br>

 <div class="container">
 	<hr>	
 </div>
 <br>
 <br>

 <!-- Related Section Begin -->
 <section class="related spad">
 	<div class="container">
 		<div class="row">
 			<div class="col-lg-12">
 				<h3 class="related-title">Other Recommended Rooms</h3>
 			</div>
 		</div>
 		<div class="row">

 			<?php           
 			$data = mysqli_query($koneksi,"select * from kamar,kategori where kategori_id=kamar_kategori order by rand() limit 4");
 			while($d = mysqli_fetch_array($data)){
 				?>

 				<div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
 					<div class="product__item">
 						
 						<?php if($d['kamar_foto1'] == ""){ ?>

 							<ul class="product__hover">
 								<li>
 									<a href="kamar_detail.php?id=<?php echo $d['kamar_id']; ?>">
 										<img src="gambar/sistem/kamar.png">
 									</a>
 								</li>
 							</ul>
 						<?php }else{ ?>

 							<ul class="product__hover">
 								<li>
 									<a href="kamar_detail.php?id=<?php echo $d['kamar_id']; ?>">
 										<img src="gambar/kamar/<?php echo $d['kamar_foto1'] ?>">
 									</a>
 								</li>
 							</ul>

 						<?php } ?>



 						<div class="product__item__text">
 							<h6><?php echo $d['kamar_nama'] ?></h6>
 							<a href="kamar_detail.php?id=<?php echo $d['kamar_id']; ?>" class="add-cart"><i class="fa fa-eye"></i> View Room</a>
 							<small class="text-muted"><?php echo $d['kategori_nama'] ?></small>
 							<div class="rating">
 								
 								<?php 
 								$rata = bintang($d['kamar_id']);
 								?>

 								<?php if($rata >= 1){ ?>
 									<i class="fa fa-star text-warning"></i>
 								<?php }else{ ?>
 									<i class="fa fa-star-o"></i>
 								<?php } ?>
 								<?php if($rata >= 2){ ?>
 									<i class="fa fa-star text-warning"></i>
 								<?php }else{ ?>
 									<i class="fa fa-star-o"></i>
 								<?php } ?>
 								<?php if($rata >= 3){ ?>
 									<i class="fa fa-star text-warning"></i>
 								<?php }else{ ?>
 									<i class="fa fa-star-o"></i>
 								<?php } ?>
 								<?php if($rata >= 4){ ?>
 									<i class="fa fa-star text-warning"></i>
 								<?php }else{ ?>
 									<i class="fa fa-star-o"></i>
 								<?php } ?>
 								<?php if($rata >= 5){ ?>
 									<i class="fa fa-star text-warning"></i>
 								<?php }else{ ?>
 									<i class="fa fa-star-o"></i>
 								<?php } ?>

 							</div>
 							<h5><?php echo "Rp. ".number_format($d['kamar_harga']).",-"; ?></h5>
 							<div class="product__color__select">

 								<small class="text-muted"><?php echo $d['kategori_nama'] ?></small>

 							</div>
 						</div>

 					</div>
 				</div>

 				


 				<?php 
 			}
 			?>
 			
 			
 		</div>
 	</div>
 </section>
 <!-- Related Section End -->


 <?php include('footer.php'); ?>