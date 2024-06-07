<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/vendor/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/vendor/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/vendor/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/vendor/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/vendor/adminlte/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/vendor/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/team" class="brand-link">
            <span class="brand-text font-weight-light">Inicio</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a href="/team" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p> Equipos </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php
        include_once $this->view . '.php'
        ?>
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">

    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/vendor/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/vendor/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/vendor/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/vendor/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/vendor/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/vendor/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/vendor/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<!-- Select2 -->
<script src="/vendor/adminlte/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="/vendor/adminlte/plugins/moment/moment.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/vendor/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- jquery-validation -->
<script src="/vendor/adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/vendor/adminlte/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="/vendor/adminlte/dist/js/adminlte.min.js"></script>

<!-- Page specific script -->
<script src="<?= '/js/' . $this->view . '.js' ?>"></script>
</body>
</html>
