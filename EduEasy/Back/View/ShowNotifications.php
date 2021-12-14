<?php
include_once "../config.php";
function getAllNotifications(){
    
        $db = config::getconnexion();

        try {
            $query = $db->query(
            "SELECT * FROM notification"
            );
            return $query;

        } catch (PDOException $e) {
            $e->getMessage();
        }
}

function getUnreadNotifications(){
    
    $db = config::getconnexion();

    try {
        $query = $db->query(
        "SELECT * FROM notification"
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
    $notificationList = getAllNotifications();
    
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

        <!-- =======================================NAV BAR STARTS======================================= -->
        <?php include "adminSideBar.php" ?>
        <!-- =======================================NAV BAR ENDS======================================= -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <div class="card" style="margin: 0.5rem;">
                <div class="card-header">
                    <center>
                        <!-- <h3 class="card-title">Student DataTable</h3> -->
                        <h3>
                            <img src="images/favicon.png" alt="EduEasyLogo" style="length: 7vw; width: 7vw">
                            Notifications
                        </h3>
                    </center>
                </div>
                <!-- /.content-wrapper -->
                <!-- Control Sidebar -->

                <div class="table-responsive mailbox-messages" style="margin-top:3rem;">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Date Received</th>
                            <th>Actions</th>
                        </tr>
                        <?php foreach($notificationList as $notification){ ?>
                        <tr>
                            <td class="mailbox-subject"><a><?php echo $notification['type']?></a></td>
                            <td class="mailbox-name"><?php echo $notification['message']?></td>
                            <td class="mailbox-attachment">
                                <?php 
                                if($notification['status']=='unread')
                                    echo '<span class="badge bg-danger">Unread</span>';
                                else if($notification['status']=='read')
                                    echo '<span class="badge bg-success">Read</span>';
                            ?>
                            </td>
                            <td class="mailbox-date"><?php echo $notification['dateReceived']?></td>
                            <td><a href="../Controller/updateNotificationStatus.php?number=<?php echo $notification['number']?>&status=<?php echo $notification['status']?>"
                                    class="btn btn-block btn-outline-<?php if($notification['status']=='unread')echo "success"; else if($notification['status']=='read')echo "primary";?> btn-xs"
                                    style="width:7rem;"><?php if($notification['status']=='unread') echo "Mark as Read"; else if($notification['status']=='read')echo "Mark as Unread"?></a>
                                <a href="../Controller/updateNotificationStatus.php?number=<?php echo $notification['number']?>"
                                    class="btn btn-block btn-outline-danger btn-xs">Delete</a>
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>
                <!-- Control sidebar content goes here -->

                <!-- /.control-sidebar -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

    <!-- /.content-wrapper -->
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

</body>

</html>