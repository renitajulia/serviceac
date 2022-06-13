<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-pizza"></i>
        </span> Ubah Toping
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Toping Pizza</h4>
            <?php if (validation_errors()) { ?>
              <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
              </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <?php foreach ($toping as $b) { ?>
              <form class="forms-sample" action="<?= base_url(); ?>admin/u_toping" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputName1">Nama Toping</label>
                  <input type="hidden" name="id_toping" id="id_toping" value="<?php echo $b['id_toping']; ?>">
                  <input type="text" class="form-control" name="nama_toping" id="nama_toping" placeholder="Nama produk pizza" value="<?= $b['nama_toping']; ?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail3">Deskripsi</label>
                  <textarea class="form-control" name="deskripsi_toping" id="deskripsi_toping" placeholder="Deskripsi produk" rows="4" required><?= $b['deskripsi']; ?></textarea>
                </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Ubah</button>
            <a href="<?= base_url(); ?>admin/v_toping" class="btn btn-light" data-dismiss="modal">Cancel</a>
          </div>
          </form>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>