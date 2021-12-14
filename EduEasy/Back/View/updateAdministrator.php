<?php

session_start();
if(!isset($_SESSION['loggedIn']) )
    header('location:../../Front/View/login.html');
else if($_SESSION['loggedIn'] != true)
    header('location:../../Front/View/login.html');
 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <title>Add a New Administrator</title>
</head>

<body onload=onLoad()>
    <div class="wrapper">

        <!-- =======================================NAV BAR STARTS======================================= -->
        <?php include "adminSideBar.php" ?>
        <!-- =======================================NAV BAR ENDS======================================= -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <center>
                        <!-- <h3 class="card-title">Student DataTable</h3> -->
                        <h3>
                            <img src="images/favicon.png" alt="EduEasyLogo" style="height: 7vw; width: 7vw">
                            My Profile
                        </h3>
                    </center>
                </div>

                <!-- /.card-header -->
                <!-- <div class="card-body"> -->
                <div class="card card-primary" style=" margin-left:3rem; margin-top:2rem; margin-right:3rem;">

                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="card-header">
                        <center>
                            <h2 class="card-title" style="font-weight: bold;">User Id</h2>
                        </center>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="userId">User Id</label>
                            <input type="text" class="form-control" id="userId"
                                placeholder="<?php echo $_SESSION['userId']; ?>"
                                value="<?php echo $_SESSION['userId']; ?>" name="userId" readonly>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="card card-primary" style=" margin-left:3rem;  margin-right:3rem;">
                    <div class="card-header">
                        <center>
                            <h2 class="card-title" style="font-weight: bold;">Update Your User Name </h2>
                        </center>
                    </div>
                    <div class="card-body">
                        <form action="../Controller/UpdateAdministrator.php" method="post">
                            <!--border-top: solid black 1px;-->

                            <!--old user Name-->
                            <div class="form-group">
                                <label for="userName">Current User name</label>
                                <input type="text" class="form-control" id="olduserName"
                                    placeholder="<?php echo $_SESSION['userName']; ?>"
                                    value="<?php echo $_SESSION['userName']; ?>" name="olduserName" readonly>
                                <br>
                            </div>
                            <!---->

                            <!--New user Name-->
                            <div class="form-group">
                                <label for="userName">New User name</label>
                                <input type="text" class="form-control" id="userName" placeholder="Enter user Name"
                                    name="userName">
                                <br>
                                <span id="error_userName" style="color: red; font-size: 0.75em;"></span>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Update User Name"
                                    id="UpdateUserName">
                            </div>

                        </form>
                    </div>
                </div>

                <div class="card card-primary" style=" margin-left:3rem;  margin-right:3rem;">
                    <div class="card-header">
                        <center>
                            <h2 class="card-title" style="font-weight: bold;">Update Your Email </h2>
                        </center>
                    </div>
                    <div class="card-body">

                        <form action="../Controller/UpdateAdministrator.php" method="post">
                            <div class="form-group">
                                <label for="oldemail">Current Email address</label>
                                <input type="email" class="form-control" id="oldemail"
                                    placeholder="<?php echo $_SESSION['email']; ?>"
                                    value="<?php echo $_SESSION['email']; ?>" name="oldemail" readonly>
                                <br>
                            </div>
                            <div class="form-group">
                                <label for="email">New Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                    name="email">
                                <br>
                                <span id="error_email" style="color: red; font-size: 0.75em;"></span>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Update Email" id="UpdateEmail">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card card-primary" style=" margin-left:3rem;  margin-right:3rem;">
                    <div class="card-header">
                        <center>
                            <h2 class="card-title" style="font-weight: bold;">Update Your Password </h2>
                        </center>
                    </div>
                    <div class="card-body">
                        <form action="../Controller/UpdateAdministrator.php" method="post">
                            <!-- old password -->
                            <div class="form-group">
                                <label for="exampleInputPassword1">Old Password</label>
                                <input type="password" class="form-control" id="oldpassword" placeholder="Old Password"
                                    name="oldpassword">
                                <br>
                                <span id="error_oldpassword" style="color: red; font-size: 0.75em;"></span>
                            </div>
                            <!--  -->

                            <!-- new password -->
                            <div class="form-group">
                                <label for="exampleInputPassword1">New Password</label>
                                <input type="password" class="form-control" id="newpassword" placeholder="New Password"
                                    name="newpassword">
                                <br>
                                <span id="error_newpassword" style="color: red; font-size: 0.75em;"></span>
                            </div>
                            <!--  -->

                            <!-- confirm new password -->
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmpassword"
                                    placeholder="Confirm Password" name="confirmpassword">
                                <br>
                                <span id="error_confirmpassword" style="color: red; font-size: 0.75em;"></span>
                            </div>
                            <!--  -->
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Update Password"
                                    id="UpdatePassword">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <!-- </div> -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->


    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script>
    var emailRegex =
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var userName = document.getElementById('userName');
    var error_userName = document.getElementById('error_userName');
    var UpdateUserName = document.getElementById('UpdateUserName');
    var email = document.getElementById('email');
    var error_email = document.getElementById('error_email');
    var oldpassword = document.getElementById('oldpassword');
    var newpassword = document.getElementById('newpassword');
    var confirmpassword = document.getElementById('confirmpassword');
    var error_oldpassword = document.getElementById('error_oldpassword');
    var error_newpassword = document.getElementById('error_newpassword');
    var error_confirmpassword = document.getElementById('error_confirmpassword');
    var UpdateEmail = document.getElementById('UpdateEmail');
    var UpdatePassword = document.getElementById('UpdatePassword');


    UpdateUserName.addEventListener('click', (event) => {
        if (userName.value.length == 0)
            error_userName.innerHTML = "You have to enter a new User Name";
        else
            error_userName.innerHTML = "";

        if (error_userName.innerHTML != "")
            event.preventDefault();
    });

    UpdateEmail.addEventListener('click', (event) => {
        if (email.value.length == 0)
            error_email.innerHTML = 'Enter your new email';
        else if (!emailRegex.test(email.value) && email.value.length > 0)
            error_email.innerHTML = 'Enter a valid email adress';
        else
            error_email.innerHTML = "";

        if (error_email.innerHTML != "")
            event.preventDefault();
    });

    UpdatePassword.addEventListener('click', (event) => {
        if (oldpassword.value.length == 0)
            error_oldpassword.innerHTML = "Enter your old password";
        else if (oldpassword.value.length > 0 && oldpassword.value.length < 8)
            error_oldpassword.innerHTML = "Your old password has at least 8 characters";
        else
            error_oldpassword.innerHTML = "";


        if (newpassword.value.length == 0 && oldpassword.value.length >= 8)
            error_newpassword.innerHTML = "Enter your new password";
        else if (newpassword.value.length > 0 && newpassword.value.length < 8 && oldpassword.value.length >= 8)
            error_newpassword.innerHTML = "Your new password MUST have atleast 8 characters";
        else
            error_newpassword.innerHTML = "";

        if (confirmpassword.value.length == 0 && oldpassword.value.length >= 8 && newpassword.value.length >= 8)
            error_confirmpassword.innerHTML = "Confirm your new password";
        else if (confirmpassword.value.length > 0 && confirmpassword.value != newpassword.value && oldpassword
            .value.length >= 8 && newpassword.value.length >= 8)
            error_confirmpassword.innerHTML = "new pasword and password confirmation are different";
        else
            error_confirmpassword.innerHTML = "";

        if (error_oldpassword.innerHTML != "" || error_newpassword.innerHTML != "" || error_confirmpassword
            .innerHTML != "")
            event.preventDefault();
    });

    function onLoad() {

        var url = window.location.href;
        var regexError1 = /error=1/;
        var regexError2 = /error=2/;
        var error_oldpassword = document.getElementById('error_oldpassword');

        if (regexError1.test(url)) {
            error_oldpassword.innerHTML = "Wrong password";
            alert('Wrong Password');
        } else
            loginError.innerHTML = "";
    }
    </script>

</body>

</html>