<?php

include_once "../Controller/GetUser.php";

session_start();
$searchADM = "ADM";

    if(!isset($_SESSION['loggedIn']) )
        header('location:../../Front/View/login.html');
    else if($_SESSION['loggedIn'] != true)
        header('location:../../Front/View/login.html');
        
    if(isset($_POST['emailSubject']) && isset($_POST['emailContent'])){
        $adminEmail = $_SESSION['email'];
        $receiverEmail = $_GET['email'];
        $emailSubject = $_POST['emailSubject'];
        $emailContent = $_POST['emailContent'];
        $origin = $_GET['origin'];
        mail($receiverEmail,$emailSubject,$emailContent);
        
        if($origin=='stu')
            header("location:Showstudents.php");
        else if($origin=='tea')
            header('location:ShowTeachers.php');    
        //header ("Location: $_SERVER[HTTP_REFERER]" );
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduEasy </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- ============================NAV BAR BEGINS ====================================== -->


        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="images/favicon.png" alt="AdminLTELogo" height="100" width="150">
        </div>


        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
            </ul>


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <!-- <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a> -->
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="images/favicon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">EduEasy</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> Admin</a>
                    </div>
                </div>
                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="index.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-bars"></i>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>News
                                    <span class="right badge badge-danger">News</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Courses
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">11</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/layout/Mathematics.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Mathematics</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/Physics & Chemistry.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Physics & Chemistry </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/Biology.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Biology</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/French.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>French</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/English.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> English</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/German.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>German</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/Philosophy.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Philosophy</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/Human Sciences:.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Human Sciences</p>
                                    </a>
                                <li class="nav-item">
                                    <a href="pages/layout/Computer Science:.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Computer Sciences</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="pages/layout/History and Geography
                .html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>History and Geography
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/Mechanical and Electrical.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Mechanical and Electrical</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tree"></i>
                                <p>
                                    Forum
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/UI/general.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Private Messages</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/UI/icons.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Public Messages</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-user fa-lg fa-fw"></i>
                                <p>
                                    users
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="ShowTeachers.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Teachers
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="ShowStudents.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Students
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="ShowAdministrators.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Administrators</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Quiz
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/tables/simple.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Quiz 11</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/tables/data.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>DataQuiz</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/tables/jsgrid.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>jsGrid</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="../../Front/Controller/logoutControl.php" class="nav-link">
                                <i class="nav-icon"></i>
                                <p>
                                    Sign Out
                                    <i class="right fas fa-sign-out-alt nav-icon" aria-hidden="true"></i>
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- =======================================NAV BAR ENDS======================================= -->
        <div class="content-wrapper">
            <div class="card">
                <form action="" method="post"
                    style="margin-left: 5vw; margin-right: 5vw; padding-top: 5vw; padding-top: 5vw;">
                    <label for="emailSubject">
                        <h3>Subject :</h3>
                    </label> <input type="text" name="emailSubject" id="emailSubject" class="form-control">
                    <br>
                    <br>
                    <br>
                    <label for="emailContent">
                        <h3>Message :</h3>
                    </label> <textarea type="text" name="emailContent" id="emailContent" class="form-control"
                        style="height: 200px"></textarea>
                    <!-- ===========================SEND AND DISCARD BUTTONS STARTS=================================== -->
                    <div class="card-footer">
                        <div class="float-right">
                            <input type="submit" class="btn btn-block btn-primary btn-lg" value="send">
                        </div>


                        <a href="<?php 
                        if($_GET['origin']=='tea')
                            echo "ShowTeachers.php";
                            else if($_GET['origin']=="stu")
                                echo "ShowStudents.php";
                        ?>" class="btn btn-primary bg-gradient-secondary"><i class="fas fa-times"></i>
                            Discard</a>
                        <!-- ===========================SEND AND DISCARD BUTTONS STOPS=================================== -->
                </form>
            </div>
        </div>
    </div>



    <!-- ============================================================ -->

    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <!-- <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0-rc
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved. -->
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>
</body>

</html>