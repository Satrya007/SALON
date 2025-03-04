<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/fav.png">
  <!-- Author Meta -->
  <meta name="author" content="colorlib">
  <!-- Meta Description -->
  <meta name="description" content="">
  <!-- Meta Keyword -->
  <meta name="keywords" content="">
  <!-- meta character set -->
  <meta charset="UTF-8">
  <!-- Site Title -->
  <title>J'Luxe</title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
  <!--
            CSS
            ============================================= -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/linearicons.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/magnific-popup.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/jquery-ui.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/nice-select.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/animate.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.carousel.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/main.css">
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body>
  <header id="header">

    <div class="container main-menu">
      <div class="row align-items-center justify-content-between d-flex">
        <a href="<?= base_url(); ?>" style="color: white; font-size: 32px; font-weight: 900;"><strong>J'LUXE</strong>
          <!--<img src="assets/img/logo.png" alt="logo" style="width: 50px; height: 50px;"-->
        </a>
        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li><a href="<?= base_url('site'); ?>">Home</a></li>
            <li><a href="<?= base_url('site/about'); ?>">Tentang Kami</a></li>
            <li><a href="<?= base_url('site/gallery'); ?>">Gallery</a></li>
            <li><a href="<?= base_url('site/service'); ?>">Layanan Kami</a></li>
            <li><a href="#" data-toggle="modal" data-target="#register">Register</a></li>
            <li><a href="#" data-toggle="modal" data-target="#login">Login</a></li>
          </ul>
        </nav><!-- #nav-menu-container -->
      </div>
    </div>
  </header><!-- #header -->

  <!-- start banner Area -->
  <section class="banner-area relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
      <div class="row fullscreen align-items-center justify-content-between">
        <div class="col-lg-6 col-md-6 banner-left">

          <h1 class="text-white">J'Luxe</h1>
          <p class="text-white">
            Layanan Treatment Lengkap Dari Ujung Kepala Hingga Ujung Kaki
          </p>
          <a href="<?= base_url('site/service'); ?>" class="primary-btn text-uppercase">BOOKING NOW!</a>
        </div>

      </div>
    </div>
  </section>
  <!-- Login Modal -->
  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php 
        if($this->session->flashdata('message')): 
            echo "<script>alert('".$this->session->flashdata('message')."');</script>";
        endif; 
        ?>
        <?php echo form_open('login/auth_action'); ?>
        <div class="modal-body">
          <div class="mb-3">
            <label>Username</label>
            <input type="text" class="form-control" name="username" required>
          </div>
          <div class="mb-3">
            <label>Password</label>
              <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" id="password" required>
              <div class="input-group-append">
                <span class="input-group-text">
                  <a href="javascript:void(0);" class="text-dark" id="showPassword">
                    <i class="fa fa-eye" id="visible"></i>
                    <i class="fa fa-eye-slash" id="invisible"></i>
                  </a>
                </span>
              </div>
              </div>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <a href="#" class="text-decoration-none" data-toggle="modal" data-target="#forgotPasswordModal" data-dismiss="modal">
              Reset Password?
            </a>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info btn-pill">Login</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Reset Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
       
        <div class="modal-body">
          <form action="<?= base_url('login/forgot_password'); ?>" method="post">
          <div class="mb-3">
            <label>Username</label>
            <input type="text" class="form-control" name="username" required>
          </div>
          <div class="mb-3">
            <label>Password Baru</label>
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="new_password" id="password2" required>
              <div class="input-group-append">
                <span class="input-group-text">
                  <a href="javascript:void(0);" class="text-dark" id="showPassword2">
                    <i class="fa fa-eye" id="visible2"></i>
                    <i class="fa fa-eye-slash" id="invisible2"></i>
                  </a>
                </span>
              </div>
              </div>
            <small class="text-muted">
              Masukkan password baru untuk akun Anda
            </small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info btn-pill">Update Password</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalFormTitle">Register</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php
        echo validation_errors();
        echo form_open('site/register'); ?>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="mb-3">
            <label for="exampleInputEmail1">Nama pelanggan</label>
            <input type="text" class="form-control" name="nama_pelanggan" required>

          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1">JK</label>

            <select class="form-control" name="jk">

              <option>--Pilih JK--</option>

              <option value="L">L</option>
              <option value="P">P</option>

            </select>

          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" required>

          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1">Tgl Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" required>

          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1">Alamat</label>
            <input type="text" class="form-control" name="alamat" required>

          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1">No Telp</label>
            <input type="text" class="form-control" name="no_telp" required>

          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" name="username" required>

          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1">Password</label>
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" id="password3" required>
              <div class="input-group-append">
                <span class="input-group-text">
                  <a href="javascript:void(0);" class="text-dark" id="showPassword3">
                    <i class="fa fa-eye" id="visible3"></i>
                    <i class="fa fa-eye-slash" id="invisible3"></i>
                  </a>
                </span>
              </div>
              </div>

          </div>
          <div class="modal-footer">

            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <input type="submit" name="submit" class="btn btn-info btn-pill" value="Register">

          </div>
        </div>


        </form>
       
      </div>
    </div>
  </div>

  <?= $contents ?>

  <footer class="footer-area section-gap">
    <div class="container">

      <div class="row">
        <div class="col-lg-3  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>About Agency</h6>
            <p>
              Industri salon berkembang begitu pesat sehingga pelanggan tidak lagi memiliki kesabaran untuk menunggu
              konsultasi yang panjang, mereka lebih memilih pengalaman yang cepat dan efisien di mana hasilnya dapat
              terlihat langsung. Sudah sampai pada titik di mana waktu dan kenyamanan menjadi kunci.
            </p>
          </div>
        </div>



      </div>

      <div class="row footer-bottom d-flex justify-content-between align-items-center">
        
       
      </div>
    </div>
  </footer>
  <!-- End footer Area -->

  <script src="<?= base_url(); ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/vendor/bootstrap.min.js"></script>
  <script
    src="<?= base_url(); ?>assets/https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  <script src="<?= base_url(); ?>assets/js/jquery-ui.js"></script>
  <script src="<?= base_url(); ?>assets/js/easing.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/hoverIntent.js"></script>
  <script src="<?= base_url(); ?>assets/js/superfish.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/jquery.ajaxchimp.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/jquery.nice-select.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/owl.carousel.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/mail-script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="<?= base_url(); ?>assets/js/main.js"></script>
  <script>
  $(document).ready(function(){
      <?php if($this->session->flashdata('message')){ ?>
          // Auto hide alert setelah 3 detik
          window.setTimeout(function() {
              $(".alert").fadeTo(500, 0).slideUp(500, function(){
                  $(this).remove(); 
              });
            //   Swal.fire({
            //     title: 'Berhasil!',
            //     text: 'Anda harus login terlebih dahulu untuk melakukan pemesanan.',
            //     icon: 'success',
            //     confirmButtonColor: '#ff4757',
            //     confirmButtonText: 'OK'
            // });
          }, 3000);
      <?php } ?>
  });
  </script>
  <script>
  $(document).ready(function(){
     $('#visible').hide();
     $('#visible2').hide();
     $('#visible3').hide();
      $('#showPassword').click(function(){
          var password = $('#password');
          var passwordType = password.attr('type');
          var visible = $('#visible');
          var invisible = $('#invisible');
          if(passwordType == 'password'){
              password.attr('type', 'text');
              visible.show();
              invisible.hide();
          } else {
              password.attr('type', 'password');
              visible.hide();
              invisible.show();
  }});
      $('#showPassword2').click(function(){
          var password = $('#password2');
          var passwordType = password.attr('type');
          var visible = $('#visible2');
          var invisible = $('#invisible2');
          if(passwordType == 'password'){
              password.attr('type', 'text');
              visible.show();
              invisible.hide();
          } else {
              password.attr('type', 'password');
              visible.hide();
              invisible.show();
  }});
      $('#showPassword3').click(function(){
          var password = $('#password3');
          var passwordType = password.attr('type');
          var visible = $('#visible3');
          var invisible = $('#invisible3');
          if(passwordType == 'password'){
              password.attr('type', 'text');
              visible.show();
              invisible.hide();
          } else {
              password.attr('type', 'password');
              visible.hide();
              invisible.show();
  }});
  });
  $(document).ready(function(){
  
      <?php if($this->session->flashdata('message')){ ?>
          $('#login').modal('show');
      <?php } ?>
  });
  </script>
  <script>
  $(document).ready(function(){
      <?php if($this->session->flashdata('message')){ ?>
          $('#login').modal('show');
      <?php } ?>
  });
  </script>
</body>

</html>