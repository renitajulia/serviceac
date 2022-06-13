<!-- TOP HEADER Start
    ================================================== -->

<section id="top">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<p class="contact-action"><i class="fa fa-phone-square"></i>AC ANDA BERMASALAH ?, Telpon aja kesini: <strong>+62 13 2648 1439</strong></p>
			</div>
			<div class="col-md-3 clearfix">
				<ul class="login-cart">
					<li>
						<a href="<?= base_url(); ?>">
							<i class="fas fa-tachometer-alt"></i>
							Beranda
						</a>
					</li>

				</ul>
			</div>
		</div> <!-- End Of /.row -->
	</div> <!-- End Of /.Container -->
</section>

<section class="login">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="login-form" style="width: 350px;margin: 30px auto;text-align: center;">
					<?php
					$error_msg = $this->session->flashdata('error_msg');
					$sukses_msg = $this->session->flashdata('sukses_msg');
					if ($error_msg) { ?>
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Warning!</strong> <?= $error_msg; ?>.
						</div>
					<?php
					}
					if ($sukses_msg) { ?>
						<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Sukses!</strong> <?= $sukses_msg; ?>.
						</div>
					<?php
					}
					?>
					<form action="<?php echo base_url('member/aksi_login'); ?>" method="post">
						<h2 class="text-center">Login</h2>
						<div class="form-group has-error">
							<input type="text" class="form-control" name="username" placeholder="Username / Email" required="required">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Password" required="required">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fas fa-unlock"></i> Masuk</button>
						</div>
					</form>
					<p class="text-center small text-danger bg-primary">Belum punya akun? <a href="<?php echo base_url('member/daftar'); ?>"><b>Daftar disini!</b></a></p>
				</div>

			</div>
		</div>
	</div>
</section>