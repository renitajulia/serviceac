<body>


	<!-- TOP HEADER Start
    ================================================== -->

	<section id="top">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<p class="contact-action"><i class="fa fa-phone-square"></i>AC ANDA BERMASALAH ?, Telpon aja kesini: <strong>+62 13 2648 1439</strong></p>
				</div>
				<div class="col-md-4 clearfix">
					<ul class="login-cart">
						<li>
							<?php if ($this->session->userdata('status_member') != "login") { ?>
								<a data-toggle="modal" data-target="#myModal" href="#">
									<i class="fa fa-user"></i>
									Login
								</a>
							<?php } else { ?>
								<a data-toggle="modal" data-target="#myModal" href="#">
									<i class="fa fa-user"></i>
									Hai, <?= $namaUser; ?>
								</a>

							<?php } ?>


						</li>
						<li>
							<div class="cart dropdowns">
								<a data-toggle="dropdowns" href="<?= base_url() ?>pesanan/list/"><i class="fa fa-shopping-cart"></i>Cart (<?php
																																			if (!empty($countcart)) {
																																				echo $countcart;
																																			} else {
																																				echo '0';
																																			}
																																			?>)</a>
								<div class="dropdown-menu dropup">
									<span class="caret"></span>
									<ul class="media-list">
										<li class="media">
											<img class="pull-left" src="images/product-item.jpg" alt="">
											<div class="media-body">
												<h6>
													<span></span>
												</h6>
											</div>
										</li>
									</ul>
									<button class="btn btn-primary btn-sm">Checkout</button>
								</div>
							</div>
						</li>
					</ul>
				</div>

			</div> <!-- End Of /.row -->
		</div> <!-- End Of /.Container -->


		<!-- MODAL Start
    	================================================== -->

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content sm">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body clearfix text-center">
						<?php if ($this->session->userdata('status_member') != "login") { ?>
							<a href="<?= base_url(); ?>member/login" class="btn btn-primary"><i class="fas fa-user"></i> Login</a>
							<a href="<?= base_url(); ?>member/daftar" class="btn btn-success"><i class="fas fa-user-plus"></i> Daftar</a>
						<?php } else { ?>
							<a href="<?= base_url(); ?>member/logout" onclick="return confirm('Kamu yakin akan keluar ?');" class="btn btn-warning"><i class="fas fa-unlock"></i> Signout</a>
							<a href="<?= base_url(); ?>member/profil" class="btn btn-warning"><i class="fas fa-user"></i> My Profil</a>
						<?php } ?>
					</div>

				</div>
			</div>
		</div>
	</section> <!-- End of /Section -->



	<!-- LOGO Start
    ================================================== -->

	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="#">
						<img src="<?= base_url(); ?>assets/images/Logo/service.png" alt="logo">
					</a>
				</div> <!-- End of /.col-md-12 -->
			</div> <!-- End of /.row -->
		</div> <!-- End of /.container -->
	</header> <!-- End of /Header -->




	<!-- MENU Start
    ================================================== -->

	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div> <!-- End of /.navbar-header -->

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav nav-main">
					<li><a href="<?= base_url(); ?>Home">HOME</a></li>
					<li><a href="<?= base_url(); ?>daftar_produk">DAFTAR PRODUK</a></li>
					<li><a href="<?= base_url(); ?>tentang">TENTANG</a></li>
					<li><a href="<?= base_url(); ?>kontak">KONTAK</a></li>
				</ul> <!-- End of /.nav-main -->
			</div> <!-- /.navbar-collapse -->
		</div> <!-- /.container-fluid -->
	</nav> <!-- End of /.nav -->