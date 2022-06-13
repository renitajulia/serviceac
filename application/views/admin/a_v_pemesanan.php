<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-cart"></i>
        </span> Pesanan Masuk
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
            <h4 class="card-title">Data Pesanan Pelanggan</h4>
            <p class="card-description"> Periode <code>1 Bulan terakhir</code>
            </p>
            <table class="table datatable-simple table-striped">
              <thead>
                <tr>
                  <th> No</th>
                  <th> Tanggal</th>
                  <th> Status</th>
                  <th> Nama </th>
                  <th> Alamat</th>
                  <th> No. Telp. </th>
                  <th> Nama Produk </th>
                  <th> Jumlah</th>
                  <th> Total </th>
                  <th> Bukti Bayar</th>
                  <th> #</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($pesanan as $ps) { ?>
                  <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= $ps->tgl_pesan; ?></td>
                    <td><?= $ps->status; ?></td>
                    <td><?= $ps->nama; ?></td>
                    <td><?= $ps->alamat; ?></td>
                    <td><?= $ps->notelp; ?></td>
                    <td><?= $ps->nama_produk; ?></td>
                    <td><?= $ps->jumlah; ?></td>
                    <td><?= $ps->total; ?></td>
                    <td><img src="<?= base_url('assets/uploads/member/') . $ps->buktitrf; ?>" alt="" style="height: 60px;"> </td>
                    <td><a href="<?= base_url(); ?>Admin/u_pemesanan/<?= $ps->id_pesan; ?>" class="btn btn-info btn-xs">Edit</a>&nbsp;<a href="<?= base_url(); ?>Admin/h_pemesanan/<?= $ps->id_pesan; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Kamu yakin akan menghapus toping ?');">Hapus</a></td>
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