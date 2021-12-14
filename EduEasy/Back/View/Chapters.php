<?php

include_once('../Controller/CourseC.php');

function getChapters($couse_id){
    $db = config::getconnexion();

    try {
        $query = $db->query(
        "SELECT * FROM chapter where course_id='$couse_id'"
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
else
    $Chapters = getChapters($_GET['id']);
?>


<?php
ob_start();
$error='';
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
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
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

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include "AdminSideBar.php" ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Chapters</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <!-- <div><a href="addCourse.php" class="btn btn-primary">Add Course</a></div><br>
                                    <div><a href="addchapter.php" class="btn btn-primary">Add chapter</a></div><br> -->
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <!-- <th>Teacher</th>
                                                <th>Type</th>
                                                <th>Chapters</th> -->
                                                <!-- <th>Actions</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($Chapters as $Chapter){?>
                                                <td><?php echo $Chapter['id'] ?></td>
                                                <td><?php echo $Chapter['nom'] ?></td>
                                                <td><?php echo $Chapter['category'] ?></td>
                                                <?php } ?>
                                            <button class="btn btn-primary" onclick="print('courses.php')">Imprimer le
                                                PDF</button>
                                        </tbody>

                                    </table>

                                </div>

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
                            <script src="../plugins/jquery/jquery.min.js"></script>
                            <!-- Bootstrap 4 -->
                            <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                            <!-- AdminLTE App -->
                            <script src="../dist/js/adminlte.min.js"></script>
                            <!-- AdminLTE for demo purposes -->
                            <script src="../dist/js/demo.js"></script>
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




?>
<script>
function print(pdf) {
    // Créer un IFrame.
    var iframe = document.createElement('iframe');
    // Cacher le IFrame.    
    iframe.style.visibility = "hidden";
    // Définir la source.    
    iframe.src = pdf;
    // Ajouter le IFrame sur la page Web.    
    document.body.appendChild(iframe);
    iframe.contentWindow.focus();
    iframe.contentWindow.print(); // Imprimer.
}
</script>