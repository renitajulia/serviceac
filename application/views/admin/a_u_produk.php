<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-pizza"></i>
                </span> Ubah Produk  </h3>
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
                    <h4 class="card-title">Ubah Produk Go ~ AC Service</h4>
                    <?php if (validation_errors()) { ?>
                      <div class="alert alert-danger" role="alert">
                          <?= validation_errors(); ?>
                      </div>
                    <?php } ?>
                    <?= $this->session->flashdata('pesan'); ?>
                    <?php foreach ($produk as $p) { ?>
                    <form class="forms-sample" action="<?= base_url(); ?>admin/u_produk" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                      <label for="exampleInputName1">Nama Produk</label>
                      <input type="hidden" name="id_produk" id="id_produk" value="<?php echo $p['id_produk']; ?>">
                      <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama produk" value="<?= $p['nama_produk']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="harga" name="harga" placeholder="Masukkan Harga Produk" value="<?= $p['harga']; ?>">
                    </div>
                 
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal stok" value="<?= $p['stok']; ?>">
                    </div>
                    <div class="form-group">
                        <?php
                        if (isset($p['image'])) { ?>

                            <input type="hidden" name="old_pict" id="old_pict" value="<?= $p['image']; ?>">
                            <input type="hidden" name="id_produk" id="id_produk" value="<?= $p['id_produk']; ?>">

                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img src="<?= base_url('assets/uploads/pizza/') . $p['image']; ?>" class="rounded mx-auto mb-3 d-blok" alt="...">
                            </picture>

                        <?php } ?>

                        <input type="file" class="form-control form-control-user" id="image" name="image">
                    </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Ubah</button>
                    <a href="<?= base_url(); ?>admin/v_produk" class="btn btn-light" data-dismiss="modal">Cancel</a>
                  </div>
                    </form>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div> 
            </div>         
           