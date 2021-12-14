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
    $userId = $_GET['teacher'];
    $teacher = checkTeacher($userId);
    $cousesCreated = getCourses($userId);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduEasy Admin</title>

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


        <!-- =======================================NAV BAR STARTS======================================= -->
        <?php include "adminSideBar.php" ?>
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
                                            echo '<span class="badge bg-success">FREE</span>';
                                        else if($course['free']==0)
                                            echo '<span class="badge bg-danger">Paid</span>';
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

    <!-- /.content-wrapper -->
    <footer class="main-footer">
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
    <!-- jsGrid -->
    <script src="plugins/jsgrid/demos/db.js"></script>
    <script src="plugins/jsgrid/jsgrid.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
</body>

</html>