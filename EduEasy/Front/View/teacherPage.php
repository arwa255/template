<?php
include_once "../config.php";

session_start();
if(!isset($_SESSION['loggedIn']) )
    header('location:login.html');
else if($_SESSION['loggedIn'] != true)
    header('location:login.html');

    function getTeacherCourses($userId){
        $db = config::getconnexion();

    try {
        $query = $db->query(
        "SELECT * FROM courses where teacher='$userId'"
        );
        return $query;

    } catch (PDOException $e) {
        $e->getMessage();
        }
    }

    $courseList = getTeacherCourses($_SESSION['userId']);


    
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

<body>

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>

    <!--====== PRELOADER PART START ======-->

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
                                style="margin-left: 1rem;">
                                <div class="col-lg-2 col-md-2 col-sm-3 col-6">
                                    <div class="logo">
                                        <a href="#">
                                            <img src="images/logo.png" alt="Logo">
                                        </a>
                                    </div>
                                </div>
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a href="#" style="font-size: 1.5rem;">Teacher's Space</a>
                                        <ul class="sub-menu">
                                            <!-- <li><a href="#">Add a New Course</a></li>
                                            <li><a href="#">View my courses</a></li> -->
                                        </ul>
                                    </li>

                                    <div class="col-lg-3 col-md-2 col-sm-3 col-6">
                                        <div class="">
                                            <!-- <ul>
                                                <li><a href="#" id="search"><i class="fa fa-search"
                                                            style="font-size: 1.5rem;"></i></a></li>
                                                <li style=""><a href="#" class="right-icon"><i
                                                            class="fa fa-shopping-bag"
                                                            style="font-size: 1.5rem;"></i><span>0</span></a></li>
                                            </ul> -->
                                        </div>
                                    </div>
                                    <div class="button ">
                                        <a href="NewCourse.php" class="main-btn"
                                            style="margin-top:1rem;margin-right:2rem;">New
                                            Course</a>
                                    </div>
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

                                    <li class="nav-item text-right">
                                        <a href="#"><img src="../View/images/feature-user.png" alt="userImage"
                                                style="border: solid 1px black; padding: 2rem; border-radius: 50%; margin-left: 1em; background-color: whitesmoke;" /></a>
                                        <ul class="sub-menu">
                                            <li><a href="teacherMyProfile.php">My Profile</a></li>
                                            <!-- <li><a href="#">My Courses</a></li> -->
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

    <div class="tab-content" id="myTabContent" style="margin:2rem;">
        <div class="tab-pane fade show active" id="courses-grid" role="tabpanel" aria-labelledby="courses-grid-tab">
            <div class="row">
                <?php foreach($courseList as $Course){ ?>
                <div class="col-lg-3 col-md-4">
                    <div class="singel-course mt-30">
                        <div class="thum">
                            <div class="image">
                                <img src="images/course/<?php echo $Course['image'] ?>" alt="Course" style="height:10rem;">
                            </div>
                        </div>
                        <div class="cont">
                            <a href="singleCoursePage.php?id=<?php echo $Course['id'] ?>">
                                <h4><?php echo $Course['name']; ?>
                                </h4>
                            </a>
                            <div class="course-teacher">
                                <div class="thum">
                                    <a><img src="images/course/teacher/<?php echo $Course['teacher_image'] ?>"
                                            alt="teacher"></a>
                                </div>
                                <div class="name">
                                    <a>
                                        <h6><?php echo $_SESSION['userName']; ?></h6>
                                    </a>
                                </div>
                                <div class="admin">
                                    <ul>
                                        <li><a><i
                                                    class="fa fa-user"></i><span><?php echo $Course['numberOfStudentsRegistered']; ?></span></a>
                                        </li>
                                        <li><a><i
                                                    class="fa fa-heart"></i><span><?php echo $Course['numberOfLikes']; ?></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- singel course -->
                </div>
                <?php } ?>

            </div>
        </div>
    </div>



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
                                <li><a href="#"><i class="fa fa-angle-right"></i>News</a></li>
                                <li><a href="PaidCourses.php"><i class="fa fa-angle-right"></i>Premuim Courses</a></li>
                                <li><a href="FreeCourses.php"><i class="fa fa-angle-right"></i>Free Courses</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-link support mt-40">
                            <div class="footer-title pb-25">
                                <h6>Support</h6>
                            </div>
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Privacy</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Policy</a></li>
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
                                        <p>1140 Rue Amir Abedelkader, Tunis</p>
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
                                        <p>EduEasyinfo@gmail.com</p>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- footer address -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer top -->

        <div class="footer-copyright pt-10 pb-25">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright text-md-left text-center pt-15">
                            <!-- <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a> </p> -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="copyright text-md-right text-center pt-15">

                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TP PART START ======-->

    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!--====== BACK TO TP PART ENDS ======-->








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