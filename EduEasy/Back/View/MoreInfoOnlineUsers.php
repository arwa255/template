<?php

include_once "../config.php";
include_once "../Controller/GetUser.php";


    function getOnlineUsers(){
        $db = config::getconnexion();

        try {
            $query = $db->query(
            "SELECT * FROM onlineusers"
            );//"SELECT onlineusers.userId,onlineusers.loginTime,student.userName,teacher.userName FROM onlineusers,student,teacher where onlineusers.userId=student.userId,teacher.userId=onlineusers"
            return $query;

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    $searchADM = "ADM";
    session_start();
    if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true || !preg_match("/{$searchADM}/i", $_SESSION['userId'])){    
        header('location:../../Front/View/login.html');
    }
    else{
        $onlineUsersList = getOnlineUsers();
    }
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduEasy | Dashboard</title>

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


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="plugins/fullcalendar/main.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- =======================================NAV BAR STARTS======================================= -->
        <?php include "adminSideBar.php" ?>
        <!-- =======================================NAV BAR ENDS======================================= -->

        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Online Users DataTable</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <!-- Main content -->
                        <section class="content">
                            <div class="card-header">
                                <center>
                                    <!-- <h3 class="card-title">Student DataTable</h3> -->
                                    <h3>
                                        <img src="images/favicon.png" alt="EduEasyLogo" style="length: 7vw; width: 7vw">
                                        Online Users DataTable
                                    </h3>
                                </center>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Online Users List</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>User Id</th>
                                                            <th>Login Date and Time</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($onlineUsersList as $onlineUser){ ?>
                                                        <tr>
                                                            <td><?php echo $onlineUser['userId']?></td>
                                                            <td><?php echo $onlineUser['loginTime']?></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->

                                        </div>
                                        <!-- /.card -->


                                    </div>
                                    <!-- /.col -->

                                </div>

                            </div><!-- /.container-fluid -->
                        </section>


                    </div>
                    <!-- /.row -->
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
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
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>