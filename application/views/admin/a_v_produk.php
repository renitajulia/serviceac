<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-pizza"></i>
        </span> Produk GO ~ AC Service
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
            <h4 class="card-title">Produk Jasa GO ~ AC Service</h4>
            <p class="card-description"></p>
            <button class="btn btn-gradient-success btn-icon-text mb-3" data-toggle="modal" data-target="#addProdukModal">
              <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah </button>
            <?php
            $ermsg_addprod = $this->session->flashdata('ermsg_addprod');
            $sucmsg_addprod = $this->session->flashdata('sucmsg_addprod');
            if ($ermsg_addprod) { ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Warning!</strong> <br><?= $ermsg_addprod; ?>.
              </div>
            <?php  }
            if ($sucmsg_addprod) { ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sukses!</strong> <br><?= $sucmsg_addprod; ?>.
              </div>
            <?php  }  ?>

            <table class="table datatable-simple table-striped">
              <thead>
                <tr>
                  <th scope="col"> No. </th>
                  <th scope="col"> Gambar </th>
                  <th scope="col"> Nama Jasa Service </th>
                  <th scope="col"> Type AC </th>
                  <th scope="col"> Merk AC </th>
                  <th scope="col"> Deskripsi </th>
                  <th scope="col"> Harga </th>
                  <th scope="col"> Stok </th>
                  <th scope="col"> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($pizza as $pizzas) { ?>
                  <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><img src="<?= base_url() ?>assets/uploads/pizza/<?= $pizzas->image; ?>" class="img-md rounded-circle mr-3" alt="image"></td>
                    <td><?= $pizzas->nama_produk; ?></td>
                    <td><?= $pizzas->ukuran; ?></td>
                    <td><?= $pizzas->nama_toping; ?></td>
                    <td><?= $pizzas->deskripsi; ?></td>
                    <td><?= $pizzas->harga; ?></td>
                    <td><?= $pizzas->stok; ?></td>
                    <td><a href="<?= base_url(); ?>admin/u_produk/<?= $pizzas->id_produk; ?>" class="btn btn-info btn-xs">Edit</a>&nbsp;<a href="<?= base_url(); ?>Admin/hapusproduk/<?= $pizzas->id_produk; ?>" onclick="return confirm('Kamu yakin akan hapus produk ?');" class="btn btn-danger btn-xs">Hapus</a></td>
                  </tr>
                <?php
                  $no++;
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal add produk -->
    <div class="modal fade" id="addProdukModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah produk GO ~ AC Service</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form class="forms-sample" action="<?= base_url(); ?>admin/t_produk" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputName1">Nama Produk</label>
                <input type="text" class="form-control" name="namaproduk" id="namaproduk" placeholder="Nama produk pizza" required>
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Type AC</label>
                <select class="form-control-lg js-example-basic-single" name="ukuran" id="ukuran" style="width:100%" required>
                  <option value="I-PK">1-PK</option>
                  <option value="II-PK">2-PK</option>
                  <option value="All-varian">all</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Merk</label>
                <select class="form-control js-example-basic-single" name="toping" id="toping" style="width:100%" required>
                  <?php foreach ($toping as $topings) { ?>
                    <option value="<?= $topings->kode_toping; ?>"><?= $topings->nama_toping; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi produk" rows="4" required></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Harga</label>
                <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Stok Awal</label>
                <input type="number" class="form-control" name="stok" id="stok" placeholder="Stok" required>
              </div>
              <div class="form-group">
                <label>Upload gambar</label>
                <input type="file" name="img" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image" required>
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                  </span>
                </div>
                <code>Rekomendasi ukuran gambar: <br /># 350px X 220px (gambar Feature)<br /># 280px X 240px (gambar Produk pilihan)</code>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Tambah</button>
            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal Ends -->