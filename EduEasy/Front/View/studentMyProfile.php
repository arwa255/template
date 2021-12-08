<?php

session_start();
if(!isset($_SESSION['loggedIn']) )
    header('location:login.html');
else if($_SESSION['loggedIn'] != true)
    header('location:login.html');
    
// $sessionId = session_id();
// if($sessionId==NULL)
//     header('location:login.html');

?>


<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>EduEasy</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="css/slick.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="css/animate.css">

    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="css/nice-select.css">

    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="css/jquery.nice-number.min.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="css/style.css">

    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body onload="onLoad()">

    <!--====== HEADER PART START ======-->

    <header id="header-part" style="padding-top: 1rem;">
        <div class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent"
                                style="margin-left: 10rem;">
                                <div class="col-lg-2 col-md-2 col-sm-3 col-6">
                                    <div class="logo">
                                        <a href="#">
                                            <img src="images/logo.png" alt="Logo">
                                        </a>
                                    </div>
                                </div>
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a href="#" style="font-size: 1.5rem;">Courses</a>
                                        <ul class="sub-menu">
                                            <li><a href="#">Premium Courses</a></li>
                                            <li><a href="#">Free Courses</a></li>
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#" style="font-size: 1.5rem;">Forum</a>
                                        <ul class="sub-menu">
                                            <li><a href="#">Forum</a></li>
                                            <li><a href="#">Private Forum</a></li>
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#" style="font-size: 1.5rem;">News</a>

                                    </li>

                                    <div class="col-lg-5 col-md-2 col-sm-3 col-6">
                                        <div class="right-icon text-right">
                                            <ul>
                                                <li><a href="#" id="search"><i class="fa fa-search"
                                                            style="font-size: 1.5rem;"></i></a></li>
                                                <li style=""><a href="#" class="right-icon"><i
                                                            class="fa fa-shopping-bag"
                                                            style="font-size: 1.5rem;"></i><span>0</span></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <li class="nav-item text-right">
                                        <a href="#"><img src="../View/images/feature-user.png" alt="userImage"
                                                style="border: solid 1px black; padding: 2rem; border-radius: 50%; margin-left: 1em; background-color: whitesmoke;" /></a>
                                        <ul class="sub-menu">
                                            <li><a href="#">My Profile</a></li>
                                            <li><a href="#">My Courses</a></li>
                                            <li><a href="../Controller/logoutControl.php">Sign out</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                    <!-- <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                        <div class="right-icon text-right">
                            <ul>
                            </ul>
                        </div>  right icon 
                    </div> -->
                </div> <!-- row -->
            </div> <!-- container -->
        </div>

    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== SEARCH BOX PART START ======-->

    <div class="search-box">
        <div class="serach-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="#">
                <input type="text" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- serach form -->
    </div>

    <!--====== SEARCH BOX PART ENDS ======-->


    <div class="pt-105 pb-110 bg_cover" class="row">

        <center>
            <h2>My Profile</h2>
        </center>
        <br>
        <!------      ============FORM PART STARTS=========== ---------->
        <div class="main-form pt-45">
            <form id="userNameForm" action="../Controller/UpdateUser.php" method="post"
                style="border: solid black; border-radius: 9em; padding-bottom: 2rem; padding-top: 2rem; margin-right: 20vw; margin-left: 5vw; background-color: whitesmoke">

                <center>
                    <h3>Your User Name</h3>
                </center>
                <br>
                <div class="col-md-6">
                    <div class="singel-form form-group">
                        <!-- <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i> -->

                        <label for="actualUserName" style="font-weight: bold; font-size: 1.5em;">Current User
                            Name:</label>
                        <center><input type="text" name="actualUserName" id="actualUserName"
                                placeholder="<?php echo $_SESSION['userName']?>"
                                style="height: 3.25rem; width: 33vw; border-radius: 5px;" readonly></center>
                        <br>
                        <!-- <br> -->
                        <label for="newUsername" style="font-weight: bold; font-size: 1.5em;"> New User Name : </label>
                        <center><input type="text" name="newUsername" id="newUsername" placeholder="New User Name"
                                style="height: 3.25rem; width: 33vw; border-radius: 5px;">
                            <br><span id="error_newUserName" style="color: red; font-size: 0.75em;"></span>
                        </center>
                        <br>
                        <!-- <br> -->

                        <center><input type="submit" value="Change My User Name" id="submitButtonUserName"
                                class="main-btn">
                        </center>

                    </div>
                </div>
            </form>
            <br>
            <!-- <br> -->
            <form id="emailForm" action="../Controller/UpdateUser.php" method="post"
                style="border: solid black; border-radius: 9em; padding-bottom: 2rem; padding-top: 2rem; margin-right: 20vw; margin-left: 5vw; background-color: whitesmoke">

                <center>
                    <h3>Your Email</h3>
                </center>
                <br>
                <div class="col-md-6">
                    <div class="singel-form form-group">
                        <!-- <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i> -->
                        <label for="actualEmail" style="font-weight: bold; font-size: 1.5em;">Current Email:</label>
                        <center><input type="email" name="actualEmail" id="actualEmail"
                                placeholder="<?php echo $_SESSION['email']?>"
                                style="height: 3.25rem; width: 33vw; border-radius: 5px;" readonly></center>
                        <br>
                        <!-- <br> -->
                        <label for="newEmail" style="font-weight: bold; font-size: 1.5em;"> New Email : </label>
                        <center><input type="email" name="newEmail" id="newEmail" placeholder="New Email"
                                style="height: 3.25rem; width: 33vw; border-radius: 5px;">
                            <br><span id="error_newEmail" style="color: red; font-size: 0.75em;"></span>
                        </center>
                        <br>
                        <!-- <br> -->
                        <center><input type="submit" value="Change My Email" id="submitButtonEmail" class="main-btn">
                        </center>

                    </div>
                </div>

            </form>
            <br>
            <!-- <br> -->
            <form id="passwordForm" action="../Controller/UpdateUser.php" method="post"
                style="border: solid black; border-radius: 9em; padding-bottom: 2rem; padding-top: 2rem; margin-right: 20vw; margin-left: 5vw; background-color: whitesmoke">

                <center>
                    <h3>Your Password</h3>
                </center>
                <br>
                <div class="col-md-6">
                    <div class="singel-form form-group">
                        <label for="oldPassword" style="font-weight: bold; font-size: 1.5em;">Old password :</label>
                        <center><input type="password" name="oldPassword" id="oldPassword" placeholder="Old password"
                                style="height: 3.25rem; width: 33vw; border-radius: 5px;">
                            <br><span id="error_oldPassword" style="color: red; font-size: 0.75em;"></span>
                        </center>
                        <br>
                        <!-- <br> -->
                        <label for="newPassword" style="font-weight: bold; font-size: 1.5em;"> New Password : </label>
                        <center><input type="password" name="newPassword" id="newPassword" placeholder="New Password"
                                style="height: 3.25rem; width: 33vw; border-radius: 5px;">
                            <br><span id="error_newPassword" style="color: red; font-size: 0.75em;"></span>
                        </center>
                        <br>
                        <!-- <br> -->
                        <label for="newEmail" style="font-weight: bold; font-size: 1.5em;"> Confirm Password : </label>
                        <center><input type="password" name="confirmPassword" id="confirmPassword"
                                placeholder="Confirm Password"
                                style="height: 3.25rem; width: 33vw; border-radius: 5px;">
                            <br><span id="error_confirmPassword" style="color: red; font-size: 0.75em;"></span>
                        </center>
                        <br>
                        <!-- <br> -->
                        <center><input type="submit" value="Change My Password" id="submitButtonPassword"
                                class="main-btn">
                        </center>

                    </div>
                </div>

            </form>
            <br>
            <div style="margin-left: 20vw;">
                <a href="../Controller/DeleteUser.php"><input type="button" class="main-btn" name="delateAccount" value="Delete My Account"></a>
            </div>
            <br>
            <br>
            <!--====== FOOTER PART START ======-->

            <footer id="footer-part">
                <div class="footer-top pt-40 pb-70">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 col-md-1">
                                <div class="footer-about mt-40">
                                    <div class="logo">
                                        <a href="#"><img src="images/logo-2.png" alt="Logo"></a>
                                    </div>
                                    <ul class="mt-20">
                                        <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div> <!-- footer about -->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer-link mt-40">
                                    <div class="footer-title pb-25">
                                        <h6>Sitemap</h6>
                                    </div>
                                    <ul>
                                        <li><a href="index.html"><i class="fa fa-angle-right"></i>Home</a></li>
                                        <li><a href="about.html"><i class="fa fa-angle-right"></i>About us</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Courses</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>News</a></li>
                                    </ul>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Gallery</a></li>
                                        <li><a href="teachers.html"><i class="fa fa-angle-right"></i>Teachers</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Support</a></li>
                                        <li><a href="contact.html"><i class="fa fa-angle-right"></i>Contact</a></li>
                                    </ul>
                                </div> <!-- footer link -->
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6">
                                <div class="footer-link support mt-40">
                                    <div class="footer-title pb-25">
                                        <h6>Support</h6>
                                    </div>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>FAQS</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Privacy</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Policy</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Support</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Documentation</a></li>
                                    </ul>
                                </div> <!-- support -->
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="footer-address mt-40">
                                    <div class="footer-title pb-25">
                                        <h6>Contact Us</h6>
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="icon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <div class="cont">
                                                <p>143 castle road 517 district, kiyev port south Canada</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <div class="cont">
                                                <p>+2165285125499</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <i class="fa fa-envelope-o"></i>
                                            </div>
                                            <div class="cont">
                                                <p>info@yourmail.com</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div> <!-- footer address -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- container -->
                </div> <!-- footer top -->
                <!-- 
                <div class="footer-copyright pt-10 pb-25">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="copyright text-md-left text-center pt-15">
                                  <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a> </p> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="copyright text-md-right text-center pt-15">
                                </div>
                            </div>
                        </div>  row 
                    </div>  container 
                </div> footer copyright -->
            </footer>

            <!--====== FOOTER PART ENDS ======-->

            <!--====== BACK TO TP PART START ======-->

            <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

            <!--====== BACK TO TP PART ENDS ======-->





            <script>
            var changeUserName = document.getElementById('submitButtonUserName');
            var changePassword = document.getElementById('submitButtonPassword');
            var changeEmail = document.getElementById('submitButtonEmail');
            var emailRegex =
                /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var newEmail = document.getElementById('newEmail');
            var newUserName = document.getElementById('newUsername');
            var oldpassword = document.getElementById('oldPassword');
            var newPassword = document.getElementById('newPassword');
            var newPasswordConfirm = document.getElementById('confirmPassword');
            var error_newUserName = document.getElementById('error_newUserName');
            var error_newEmail = document.getElementById('error_newEmail');
            var error_newPassword = document.getElementById('error_newPassword');
            var error_confirmPassword = document.getElementById('error_confirmPassword');
            var error_oldPassword = document.getElementById('error_oldPassword');

            changeUserName.addEventListener('click', (event) => {

                if (newUserName.value.length == 0)
                    error_newUserName.innerHTML = "Enter a new UserName";
                else
                    error_newUserName.innerHTML = "";

                if (error_newUserName.innerHTML != "")
                    event.preventDefault();
            });

            changeEmail.addEventListener('click', (event) => {
                if (newEmail.value.length == 0 || !emailRegex.test(newEmail.value))
                    error_newEmail.innerHTML = "Enter a new valid email address";
                else
                    error_newEmail.innerHTML = "";

                if (error_newEmail.innerHTML != "")
                    event.preventDefault();
            });

            changePassword.addEventListener('click', (event) => {

                error_newPassword.innerHTML = "";
                error_confirmPassword.innerHTML = "";
                error_oldPassword.innerHTML = "";

                if (oldPassword.value.length == 0)
                    error_oldPassword.innerHTML = "Enter your old password";
                else if (oldPassword.value.length > 0 && oldPassword.value.length < 8)
                    error_oldPassword.innerHTML = "old password cannot have less than 8 characters";

                if (newPassword.value.length == 0)
                    error_newPassword.innerHTML = "Enter a new Password";
                else if (newPassword.value.length > 0 && newPassword.value.length < 8)
                    error_newPassword.innerHTML = "Your new password must contain at least 8 characters";

                if (newPassword.value.length >= 8 && newPasswordConfirm.value.length == 0)
                    error_confirmPassword.innerHTML = "Confirm your new password";
                else if (newPassword.value.length >= 8 && newPasswordConfirm.value != newPassword.value)
                    error_confirmPassword.innerHTML =
                    "new password confirmation is different from new password";


                if (error_newPassword.innerHTML != "" || error_confirmPassword.innerHTML != "" ||
                    error_oldPassword.innerHTML != "")
                    event.preventDefault();
            });

            function onLoad() {

                var url = window.location.href;
                var regexError3 = /error=3/;


                if (regexError3.test(url)) {
                    error_oldPassword.innerHTML = "Wrong password";
                } else
                    loginError.innerHTML = "";
            }
            </script>


            <!--====== jquery js ======-->
            <script src="js/vendor/modernizr-3.6.0.min.js"></script>
            <script src="js/vendor/jquery-1.12.4.min.js"></script>

            <!--====== Bootstrap js ======-->
            <script src="js/bootstrap.min.js"></script>

            <!--====== Slick js ======-->
            <script src="js/slick.min.js"></script>

            <!--====== Magnific Popup js ======-->
            <script src="js/jquery.magnific-popup.min.js"></script>

            <!--====== Counter Up js ======-->
            <script src="js/waypoints.min.js"></script>
            <script src="js/jquery.counterup.min.js"></script>

            <!--====== Nice Select js ======-->
            <script src="js/jquery.nice-select.min.js"></script>

            <!--====== Nice Number js ======-->
            <script src="js/jquery.nice-number.min.js"></script>

            <!--====== Count Down js ======-->
            <script src="js/jquery.countdown.min.js"></script>

            <!--====== Validator js ======-->
            <script src="js/validator.min.js"></script>

            <!--====== Ajax Contact js ======-->
            <script src="js/ajax-contact.js"></script>

            <!--====== Main js ======-->
            <script src="js/main.js"></script>

            <!--====== Map js ======-->
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
            <script src="js/map-script.js"></script>

</body>

</html>