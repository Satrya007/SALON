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
  <!-- user Title -->
  <title>J'LUXE</title>

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
        <a href="index.html" style="color: white; font-size: 32px; font-weight: 900;">
          <strong>J'LUXE</strong>
          <!--<img src="assets/img/logo.png" alt="Ikon"
            style="width: 50px; height: 50px; max-width: 50px; max-height: 50px;"-->
        </a>
        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li><a href="<?= base_url('user'); ?>">Home</a></li>
            <li><a href="<?= base_url('user/about'); ?>">Tentang Kami</a></li>
            <li><a href="<?= base_url('user/gallery'); ?>">Gallery</a></li>
            <li><a href="<?= base_url('user/service'); ?>">Layanan Kami</a></li>
            <li><a href="<?= base_url('user/pesanan'); ?>">Pesanan Saya</a></li>
            <li><a href="<?= base_url('login/logout'); ?>">Logout</a></li>



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
          <h6 class="text-white">Hi
            <?=
              $this->session->userdata('nama'); ?>
          </h6>
          <h1 class="text-white">J'LUXe</h1>
          <p class="text-white">
            Kami berikan pelayanan terbaik untuk anda
          </p>
          <a href="<?= base_url('user/service'); ?>" class="primary-btn text-uppercase">Booking Sekarang</a>
        </div>

      </div>
    </div>
  </section>
  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalFormTitle">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php
        echo validation_errors();
        echo form_open('login/auth_action'); ?>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="mb-3">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" name="username" required>

          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control" name="password" required>

          </div>
          <div class="modal-footer">

            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <input type="submit" name="submit" class="btn btn-info btn-pill" value="Login">

          </div>
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
        echo form_open('user/register'); ?>

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
            <input type="password" class="form-control" name="password" required>

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
  <script src="<?= base_url(); ?>assets/js/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>

</html>