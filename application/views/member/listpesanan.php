<section id="products">
	<div class="container">
		<div class="row">
			<div class="block-heading ">
				<h2 style="background:gray; color:yellow; padding:0.25em; border-radius:0.3em;border-bottom:3px double yellow ">Daftar Pesanan Anda</h2>
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
						<table class="table table-bordered table-responsive table-striped">
							<thead>
								<tr>
									<th>Foto</th>
									<th>Produk</th>
									<th>Jumlah</th>
									<th>Total</th>
									<th>Tgl</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($pesan as $psn) {
									# code...

								?>

									<tr>
										<td><img src="<?= base_url('assets/uploads/member/') . $psn->buktitrf; ?>" style="width:150px; height:150px;" alt=""></td>
										<td><?= $psn->nama_produk ?></td>
										<td><?= $psn->jumlah ?></td>
										<td><?= $psn->total ?></td>
										<td><?= $psn->tgl_pesan ?></td>
										<td><?= $psn->status ?></td>
										<td><a href="<?= base_url() . 'pesanan/detail/' . $psn->kode_pesanan ?>" class="btn btn-sm btn-warning">Lihat</a></td>

									</tr>
								<?php
								} ?>
							</tbody>
						</table>
					</div> <!-- End of /.products -->
				</div> <!-- End of /.col-md-3 -->
			<?php } ?>
		</div>
</section>