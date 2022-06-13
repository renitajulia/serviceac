<!-- CATAGORIE Start
    ================================================== -->



<!-- PRODUCTS Start
    ================================================== -->

<section id="products">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="products-heading">
					<h2>PRODUK JASA PILIHAN</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($prodpil as $prodpils) { ?>
				<div class="col-md-3">
					<div class="products">
						<a href="<?= base_url(); ?>daftar_produk/detail_produk/<?= $prodpils->id_produk; ?>">
							<img src="<?= base_url(); ?>assets/uploads/pizza/<?= $prodpils->image; ?>" style="width:280px; height:240px;" alt="">
						</a>
						<a href="<?= base_url(); ?>daftar_produk/detail_produk/<?= $prodpils->id_produk; ?>">
							<h4><?= $prodpils->nama_produk; ?></h4>
						</a>
						<p class="price">Rp. <?= $prodpils->harga; ?></p>
						<a class="view-link shutter" href="<?= base_url(); ?>daftar_produk/detail_produk/<?= $prodpils->id_produk; ?>"><i class="fas fa-eye"></i>Lihat</a>
					</div> <!-- End of /.products -->
				</div> <!-- End of /.col-md-3 -->
			<?php } ?>
		</div> <!-- End of /.row -->
	</div> <!-- End of /.container -->
</section> <!-- End of Section -->




<!-- CALL TO ACTION Start
    ================================================== -->

<section id="call-to-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block">
					<div class="block-heading">
						<h2>Our Partners</h2>
					</div>
				</div> <!-- End of /.block -->
				<div id="owl-example" class="owl-carousel">
					<div> <img src="<?= base_url(); ?>assets/images/company/company-1.jpg" alt=""></div>
					<div> <img src="<?= base_url(); ?>assets/images/company/company-3.jpg" alt=""></div>
					<div> <img src="<?= base_url(); ?>assets/images/company/company-6.png" alt=""></div>
				</div> <!-- End of /.Owl-Slider -->
			</div> <!-- End of /.col-md-12 -->
		</div> <!-- End Of /.Row -->
	</div> <!-- End Of /.Container -->
</section> <!-- End of Section -->