<?php
if (isset($_COOKIE['email'])) {
    // header("Location:app.php");
} else {
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Created By B.Yu23</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php include_once 'teamplate/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include_once 'teamplate/sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Selamat Datang Admin</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Admin</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <?php
            if (isset($_GET['page'])) {
                if ($_GET['page'] == "pelanggan") {
                    include_once('pelanggan/list_pelanggan.php');
                } else if ($_GET['page'] == "TambahData") {
                    include_once('pelanggan/index.php');
                } else if ($_GET['page'] == "editpelanggan") {
                    include_once('pelanggan/edit.php');
                } else if ($_GET['page'] == "viewpelanggan") {
                    include_once('pelanggan/view.php');
                    //produk
                } else if ($_GET['page'] == "produk") {
                    include_once('produk/index.php');
                } else if ($_GET['page'] == "TambahDataProduk") {
                    include_once('produk/create_produk.php');
                } else if ($_GET['page'] == "editProduk") {
                    include_once('produk/edit.php');
                } else if ($_GET['page'] == "viewProduk") {
                    include_once('produk/view.php');
                    //kartu
                } else if ($_GET['page'] == "kartu") {
                    include_once('kartu/index.php');
                } else if ($_GET['page'] == "TambahDataKartu") {
                    include_once('kartu/create_kartu.php');
                } else if ($_GET['page'] == "editKartu") {
                    include_once('kartu/edit.php');
                } else if ($_GET['page'] == "viewKartu") {
                    include_once('kartu/view.php');
                    //pembelian
                } else if ($_GET['page'] == "pembelian") {
                    include_once('pembelian/index.php');
                } else if ($_GET['page'] == "TambahDataPembelian") {
                    include_once('pembelian/create_pembelian.php');
                } else if ($_GET['page'] == "editPembelian") {
                    include_once('pembelian/edit.php');
                } else if ($_GET['page'] == "viewPembelian") {
                    include_once('pembelian/view.php');
                    //vendor
                } else if ($_GET['page'] == "vendor") {
                    include_once('vendor/index.php');
                } else if ($_GET['page'] == "TambahDataVendor") {
                    include_once('vendor/create_vendor.php');
                } else if ($_GET['page'] == "editVendor") {
                    include_once('vendor/edit.php');
                } else if ($_GET['page'] == "viewVendor") {
                    include_once('vendor/view.php');
                } else {
                    include_once 'teamplate/content.php';
                }
            } else {
                include_once 'teamplate/content.php';
            }
            ?>
        </div>
        <!-- /.content-wrapper -->

        <?php include_once('teamplate/footer.php'); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>