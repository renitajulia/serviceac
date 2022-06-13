<!-- partial -->
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-cart"></i>
                </span> Anggota</h3>
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
                    <h4 class="card-title">Data Anggota Pizza Hommade</h4>
                    <table class="table datatable-simple table-striped">
                      <thead>
                        <tr>
                          <th> No. </th>
                          <th> Nama </th>
                          <th> Alamat </th>
                          <th> Email </th>
                          <th> No. Telp </th>
                          <th> Gambar</th>
                          <th> Hapus</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $no = 1;
                      foreach ($membuser as $member) { ?>
                        <tr>
                          <th scope="row"><?= $no; ?></th>
                          <th> <?= $member->nama; ?> </th>
                          <th> <?= $member->alamat; ?>  </th>
                          <th> <?= $member->email; ?>  </th>
                          <th> <?= $member->no_telp; ?>  </th>
                          <th>
                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img src="<?= base_url('assets/uploads/member/') . $member->image; ?>" class="img-fluid img-thumbnail" alt="..." style="width:60px;height:80px;">
                            </picture>                                                                            
                          </th>                                   
                          <th><a href="<?= base_url(); ?>admin/hapus_member/<?= $member->id_user; ?> " onclick="return confirm('Kamu yakin akan hapus member ?');" class="btn btn-sm btn-danger">Hapus</a></th>                                           
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