<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="<?= base_url(); ?>assets/images/Logo/logo_Kelom.png">
              </div>
              <h4>Hello GO ~ AC Service !</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <?php
              $error_msg = $this->session->flashdata('error_msg');
              $sukses_msg = $this->session->flashdata('sukses_msg');
              if ($error_msg) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Warning!</strong> <br><?= $error_msg; ?>.
                </div>
              <?php
              }
              if ($sukses_msg) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Sukses!</strong> <br><?= $sukses_msg; ?>.
                </div>
              <?php
              }
              ?>
              <form action="<?php echo base_url('admin/aksi_login'); ?>" method="post">
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username or Email" required>
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">MASUK</button>
                </div>
                <div class="text-center mt-4 font-weight-light"> Gak punya akun? <code>Tanya sama yang buat ya! </code>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>