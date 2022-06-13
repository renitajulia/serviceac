<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-pizza"></i>
        </span> Merk AC
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
            <h4 class="card-title">Merk AC</h4>
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
                  <th scope="col"> Merk AC </th>
                  <th scope="col"> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($toping as $pizzas) { ?>
                  <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= $pizzas->nama_toping; ?></td>
                    <td><a href="<?= base_url(); ?>Admin/u_toping/<?= $pizzas->id_toping; ?>" class="btn btn-info btn-xs">Edit</a>&nbsp;<a href="<?= base_url(); ?>Admin/hapustoping/<?= $pizzas->id_toping; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Kamu yakin akan menghapus toping ?');">Hapus</a></td>
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
    <!-- Modal add toping -->
    <div class="modal fade" id="addProdukModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Merk AC baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form class="forms-sample" action="<?= base_url(); ?>admin/t_toping" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputName1">Merk AC</label>
                <input type="text" class="form-control" name="namaproduk" id="namaproduk" placeholder="Merk AC" required>
              </div>
              <div class="form-group">
                <label for="exampleInputName1">Deskripsi AC</label>
                <input type="text" class="form-control" name="deskripsi_toping" id="deskripsi_toping" placeholder="Deskripsi AC" required>
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