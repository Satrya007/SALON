<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/asset/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="<?= base_url(); ?>/asset/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/asset/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <script src="<?= base_url('') ?>asset/vendor/apexcharts/apexcharts.min.js"></script>

    <!-- Tambahkan CSS untuk dashboard -->
    <style>
        .dashboard-card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            margin-bottom: 20px;
            min-height: 120px;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .konfirmasi-card {
            background: linear-gradient(135deg, #7F53AC 0%, #647DEE 100%);
            color: white;
        }

        .pembayaran-card {
            background: linear-gradient(135deg, #45B649 0%, #DCE35B 100%);
            color: white;
        }

        .kedatangan-card {
            background: linear-gradient(135deg, #FFB75E 0%, #ED8F03 100%);
            color: white;
        }

        .dikerjakan-card {
            background: linear-gradient(135deg, #4568DC 0%, #B06AB3 100%);
            color: white;
        }

        .selesai-card {
            background: linear-gradient(135deg, #43CEA2 0%, #185A9D 100%);
            color: white;
        }

        .card-title {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .card-value {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .card-body {
            padding: 20px;
        }

        .dashboard-icon {
            position: absolute;
            right: 20px;
            bottom: 20px;
            font-size: 40px;
            opacity: 0.4;
        }
    </style>

</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
        <!-- <div class="sidebar-brand-text mx-3"><img  src="<?= base_url(); ?>/assets/img/logo.png" alt="..." width="100%"></div-->
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i> <!-- Ikon Dashboard -->
            <span>Dashboard</span>
        </a>
    </li>

    <div class="modal fade" id="lapkeuangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Laporan Transaksi Keuangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo validation_errors();
                    echo form_open('admin/laporan_keuangan'); ?>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Dari</label>
                        <input type="date" class="form-control" name="dari">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sampai</label>
                        <input type="date" class="form-control" name="sampai">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" class="btn btn-primary btn-pill" value="Submit">
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Nav Item - Booking Service -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/transaksi'); ?>">
            <i class="fas fa-fw fa-calendar-check"></i> <!-- Ikon Booking -->
            <span>Booking Service</span>
        </a>
    </li>

    <!-- Nav Item - Master Data -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#master" aria-expanded="true"
            aria-controls="master">
            <i class="fas fa-fw fa-cogs"></i> <!-- Ikon Master Data -->
            <span>Master Data</span>
        </a>
        <div id="master" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data</h6>
                <a class="collapse-item" href="<?= base_url('admin/kategori'); ?>"><i class="fas fa-fw fa-tags"></i> Kategori</a>
                <a class="collapse-item" href="<?= base_url('admin/karyawan'); ?>"><i class="fas fa-fw fa-users"></i> Karyawan</a>
                <a class="collapse-item" href="<?= base_url('admin/pelanggan'); ?>"><i class="fas fa-fw fa-user"></i> Pelanggan</a>
                <a class="collapse-item" href="<?= base_url('admin/gallery'); ?>"><i class="fas fa-fw fa-images"></i> Gallery</a>
                <a class="collapse-item" href="<?= base_url('admin/testimoni'); ?>"><i class="fas fa-fw fa-comment-alt"></i> Testimoni</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Service -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/service'); ?>">
            <i class="fas fa-fw fa-hands-helping"></i> <!-- Ikon Service -->
            <span>Service</span>
        </a>
    </li>

    <!-- Nav Item - Pesan -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/pesan'); ?>">
            <i class="fas fa-fw fa-envelope"></i> <!-- Ikon Pesan -->
            <span>Pesan</span>
        </a>
    </li>

    <!-- Nav Item - Laporan -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan"
            aria-expanded="true" aria-controls="laporan">
            <i class="fas fa-fw fa-chart-line"></i> <!-- Ikon Laporan -->
            <span>Laporan</span>
        </a>
        <div id="laporan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data</h6>
                <a class="collapse-item" href="<?= base_url('admin/laporan_pelanggan'); ?>"><i class="fas fa-fw fa-users"></i> Pelanggan</a>
                <a class="collapse-item" href="<?= base_url('admin/laporan_karyawan'); ?>"><i class="fas fa-fw fa-users-cog"></i> Karyawan</a>
                <a class="collapse-item" href="<?= base_url('admin/laporan_service'); ?>"><i class="fas fa-fw fa-tools"></i> Service</a>
                <a class="collapse-item" href="#" data-toggle="modal" data-target="#lapkeuangan"><i class="fas fa-fw fa-wallet"></i> Keuangan</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">







                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url(); ?>asset/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">


                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?= $contents ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih Logout untuk keluar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/asset/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/asset/js/sb-admin-2.min.js"></script>
    <script src="<?= base_url(); ?>/asset/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>/asset/js/demo/datatables-demo.js"></script>
    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>/asset/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>/asset/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url(); ?>/asset/js/demo/chart-pie-demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="<?= base_url(); ?>/asset/select2/js/select2.full.min.js"></script>
    <script>
        $(function () {

            $('.select2').select2()
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
    <script>
        $(function () {
            $('#dataTable2').DataTable()
        })
    </script>
</body>

</html>