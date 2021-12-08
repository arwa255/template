<?php

include_once "../Controller/GetUser.php";


function checkTeacher($userId){
    $db = config::getconnexion();

    try {
        $query = $db->query(
            "SELECT * FROM teacher where userId = '$userId' "
        );
        return $query->fetch();

    } catch (PDOException $e) {
        $e->getMessage();
    }
}

function getCourses($userId){
    
        $db = config::getconnexion();

        try {
            $query = $db->query(
            "SELECT * FROM courses where teacher = '$userId'"
            );
            return $query;

        } catch (PDOException $e) {
            $e->getMessage();
        }
}

session_start();
if(!isset($_SESSION['loggedIn']) )
    header('location:../../Front/View/login.html');
else if($_SESSION['loggedIn'] != true)
    header('location:../../Front/View/login.html');
else{
    // $userId=$_SESSION['data'];
    $userId = '2021TEA0';
    $teacher = checkTeacher($userId);
    $_SESSION['data']=NULL;

    $cousesCreated = getCourses($userId);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduEasy | Teachers DataTables</title>

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
    <!-- jsGrid -->
    <link rel="stylesheet" href="plugins/jsgrid/jsgrid.min.css">
    <link rel="stylesheet" href="plugins/jsgrid/jsgrid-theme.min.css">
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
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <div class="card" style="margin: 2rem;">
                <div class="card-header">
                    <center>
                        <!-- <h3 class="card-title">Student DataTable</h3> -->
                        <h3>
                            <img src="images/favicon.png" alt="EduEasyLogo" style="length: 7vw; width: 7vw">
                            Teacher Detailed View
                        </h3>
                    </center>
                </div>
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <!-- <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="/dist/img/user4-128x128.jpg"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">Nina Mcintire</h3>

                            <p class="text-muted text-center">Software Engineer</p> -->

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>UserId</b> <span class="float-right"><?php echo $teacher['userId']?></span>
                            </li>
                            <li class="list-group-item">
                                <b>User Name</b> <span class="float-right"><?php echo $teacher['userName']?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Number of courses Created</b> <span
                                    class="float-right"><?php echo $teacher['nbCoursesCreated']?></span>
                            </li>
                        </ul>

                        <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>

            <section class="content" style="margin: 2rem;">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Courses Created</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="margin-bottom: 1rem;">
                        <div>
                            <ul class="list-group list-group-unbordered mb-3">
                                <?php foreach($cousesCreated as $course){ ?>
                                <li style="margin-top:1rem;margin-bottom:1rem;">
                                    <ul>
                                        <li class="list-group-item">
                                            <b>Course Number:</b> <span
                                                class="float-right"><?php echo $course['id']?></span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Course Name:</b> <span
                                                class="float-right"><?php echo $course['name']?></span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Category:</b> <span
                                                class="float-right"><?php echo $course['category']?></span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Status:</b> <span class="float-right"><?php 
                                        if($course['free']==1)
                                            echo "FREE";
                                        else if($course['free']==0)
                                            echo "PAID";
                                        ?>
                                            </span>
                                    </ul>

                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>


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
    <!-- jsGrid -->
    <script src="plugins/jsgrid/demos/db.js"></script>
    <script src="plugins/jsgrid/jsgrid.min.js"></script>
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

    <!-- <script>
    $(function() {
        $("#jsGrid1").jsGrid({
            height: "100%",
            width: "100%",

            sorting: true,
            paging: true,

            data: ,

            fields: [{
                    name: "Course Name",
                    type: "text",
                    width: 100
                },
                {
                    name: "Number of Registered Students",
                    type: "number",
                    width: 50
                }

            ]
        });
    });
    </script> -->
</body>

</html>