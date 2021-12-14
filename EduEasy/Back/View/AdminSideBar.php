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
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
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
    <a href="#" class="brand-link">
        <img src="images/favicon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">EduEasy</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="images/feature-user.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="updateAdministrator.php" class="d-block"> <?php echo $_SESSION['userName'] ?></a>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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
                        <p>
                            News
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="NewsModule/admin/categories.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="NewsModule/admin/new-article.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Publish Article</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="NewsModule/admin/articles.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Manage Article</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="courses.php" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Courses
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
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
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Private Messages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
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
                            Users
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
                            <a href="createQuiz.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Quiz</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="result.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Results</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="CartModule/Views/backend/afficher_commande.php" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Sales
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../Controller/logoutControl.php" class="nav-link">
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

<!-- ==================================NAV BAR ENDS============================= -->