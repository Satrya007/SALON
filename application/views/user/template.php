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
  <title>J'LUXE</title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
  <!--
      CSS
      ============================================= -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/linearicons.css">
  <link href="<?= base_url(); ?>/asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="<?= base_url(); ?>/asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
  <header id="header">

    <div class="container main-menu">
      <div class="row align-items-center justify-content-between d-flex">
        <a href="<?= base_url(); ?>" style="color: white; font-size: 32px; font-weight: 900;">
          <strong>J'LUXE</strong>
         <!-- <img src="assets/img/logo.png" alt="Ikon"
            style="width: 50px; height: 50px; max-width: 50px; max-height: 50px;"-->
        </a>

        <nav id="nav-menu-container">
          <ul class="nav-menu">
         
            <?php
            $session = $this->session->userdata('id_pelanggan');
            ?>

            <li><a href="<?= base_url(!empty($session) ? 'user' : 'site'); ?>">Home</a></li>
            <li><a href="<?= base_url(!empty($session) ? 'user/about' : 'site/about'); ?>">Tentang Kami</a></li>
            <li><a href="<?= base_url(!empty($session) ? 'user/gallery' : 'site/gallery'); ?>">Gallery</a></li>
            <li><a href="<?= base_url(!empty($session) ? 'user/service' : 'site/service'); ?>">Layanan Kami</a></li>
            <?php if(empty($session)): ?>
                <li><a href="#" data-toggle="modal" data-target="#register">Register</a></li>
                <li><a href="#" data-toggle="modal" data-target="#login">Login</a></li>
            <?php else: ?>
                <li><a href="<?= base_url('user/pesanan'); ?>">Pesanan Saya</a></li>
                <li><a href="<?= base_url('login/logout'); ?>">Logout</a></li>
            <?php endif; ?>

          </ul>
        </nav><!-- #nav-menu-container -->
      </div>
    </div>
  </header>


  <?= !empty($modal) ? $modal : ''; ?>




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
        <p class="col-lg-8 col-sm-12 footer-text m-0">
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;
          <script>document.write(new Date().getFullYear());</script> All rights reserved | Developed by xxxx
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
        <div class="col-lg-4 col-sm-12 footer-social">
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-dribbble"></i></a>
          <a href="#"><i class="fa fa-behance"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <!-- End footer Area -->

  <script src="<?= base_url(); ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
  <script src="<?= base_url(); ?>/asset/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>/asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url(); ?>/asset/js/demo/datatables-demo.js"></script>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <script>
    $(function () {
      $('#dataTable2').DataTable()
    })
  </script>
</body>

</html>