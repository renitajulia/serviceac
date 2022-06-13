<section id="products">
	<div class="container">
		<div class="row">
			<div class="block-heading ">
				<h2 style="background:gray; color:yellow; padding:0.25em; border-radius:0.3em;border-bottom:3px double yellow ">MY PROFIL</h2>
			</div>
		</div>
		<?php
		$ermsg_addprod = $this->session->flashdata('ermsg_addprod');
		$sucmsg_addprod = $this->session->flashdata('sucmsg_addprod');
		if ($ermsg_addprod) { ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Warning!</strong> <br><?= $ermsg_addprod; ?>.
			</div>
		<?php	}
		if ($sucmsg_addprod) { ?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Sukses!</strong> <br><?= $sucmsg_addprod; ?>.
			</div>
		<?php	}	?>
		<div class="row">
			<?php foreach ($profil as $profils) { ?>
				<div class="col-md-12">
					<div class="products">
						<img src="<?= base_url(); ?>assets/uploads/member/<?= $profils->image; ?>" style="width:280px; height:240px;" alt="">
						<h4>Nama s: <?= $profils->nama; ?></h4>
						<h6>Email : <?= $profils->email; ?></h6>
						<h6>Alamat: <?= $profils->alamat; ?></h6>
						<p class="numeric">No.Telp :<?= $profils->no_telp; ?></p>
						<a class="view-link shutter" style="width:280px; margin:0 auto;" href="<?= base_url(); ?>member/u_profil/<?= $profils->id; ?>"><i class=""></i>Ubah</a>
					</div> <!-- End of /.products -->
				</div> <!-- End of /.col-md-3 -->
			<?php } ?>
		</div>
</section>