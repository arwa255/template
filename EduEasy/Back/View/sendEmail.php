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
        <!-- =======================================NAV BAR STARTS======================================= -->
        <?php include "adminSideBar.php" ?>
        <!-- =======================================NAV BAR ENDS======================================= -->


        <div class="content-wrapper">
            <div class="card">
            <div class="card-header">
                    <center>
                        <h3>
                            <img src="images/favicon.png" alt="EduEasyLogo" style="length: 7vw; width: 7vw">
                            Send An Email
                        </h3>
                    </center>
                </div>
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

    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>

    <footer class="main-footer">
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

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