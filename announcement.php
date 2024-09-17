<?php
include "process.php";
// session_start(); 
if (!isset($_SESSION['Username'])) {
    header('Location: index.php');
    exit();
}



// Query to fetch announcements posted by this teacher
// $query = "SELECT AnnouncementID, Title, PostedDate, AttachmentPath FROM announcements  ORDER BY PostedDate DESC";
// $announces = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="style/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="style/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="style/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="style/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="style/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="style/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="style/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="style/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../style/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="student_login.php" class="nav-link">Home</a>
                </li> -->
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                
                
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="style/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Student dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="style/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?=$_SESSION['Username']?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <?php if ($_SESSION['RoleID'] == 1): ?>
                        <li class="nav-item">
                            <a href="teacher_dashboard.php" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Teacher Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="teacher_change_password.php" class="nav-link">
                                <i class="nav-icon fas fa-key"></i>
                                <p>Teacher Change Password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view_students.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p> Registered Students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="post_announcement.php" class="nav-link">
                                <i class="nav-icon fas fa-bullhorn"></i>
                                <p>Post Announcement</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Log Out</p>
                            </a>
                        </li>
                        <?php elseif ($_SESSION['RoleID'] == 2): ?>
                        <li class="nav-item">
                            <a href="student_dashboard.php" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Student Profile </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="student_change_password.php" class="nav-link">
                                <i class="nav-icon fas fa-key"></i>
                                <p>Student Change Password</p>
                            </a>
                        </li>
                    
                        <li class="nav-item">
                            <a href="announcement.php" class="nav-link active">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p> Announcements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Log Out</p>
                            </a>
                        </li>
                        <?php elseif ($_SESSION['RoleID'] == 3): ?>
                       <li class="nav-item">
                            <a href="admin.php#users" class="nav-link ">
                                <i class="nav-icon fas fa-users"></i>
                                <p> Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="viewTeacher.php#teachers" class="nav-link ">
                                <i class="nav-icon fas fa-users"></i>
                                <p> Teachers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="viewStudent.php#students" class="nav-link ">
                                <i class="nav-icon fas fa-users"></i>
                                <p> Students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="viewCourse.php#courses" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p> Courses</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="viewDepartment.php#departments" class="nav-link">
                                <i class="nav-icon fas fa-building"></i>
                                <p> Departments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="viewClass.php#classes" class="nav-link ">
                                <i class="nav-icon fas fa-building"></i>
                                <p>Classes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="viewSubject.php#subjects" class="nav-link">
                                <i class="nav-icon fas fa-book-reader"></i>
                                <p> Subjects</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Log Out</p>
                            </a>
                        </li>
                        <?php endif; ?>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Announcements</h1>
                        </div><!-- /.col -->
                        <!-- <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="student_login.php">Home</a></li>
                                <li class="breadcrumb-item active">Announcements</li>
                            </ol>
                        </div>/.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Announcements -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Latest Announcements</h3>
                                </div><!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                       <th>Title</th>
                                       <th>Category</th>
                                      <th>Posted By</th>
                                       <th>Posted Date</th>
                                       <th>Attachment</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach($announces as $announcement) { ?>
                                        <tr>
                                            <td><?=$announcement['Title']?></td>
                                            <td><?=$announcement['CategoryName']?></td> <!-- Category -->
                                             <td><?=$announcement['PostedByName']?></td> <!-- Posted By -->
                                            <td><?=$announcement['PostedDate']?></td>
                                            <td><a href='<?=$announcement['AttachmentPath'] ?>' target='_blank'>View Announcement</a></td>
                                            
                                            
                                        </tr>
                                      <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                    
                                <!-- card-body  -->
                    </div><!-- /.card -->
                </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                
            </div>
            <strong>Copyright &copy; 2024 <a href="#">Announcement System</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="style/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="style/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="style/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="style/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="style/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="style/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="style/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="style/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="style/plugins/moment/moment.min.js"></script>
    <script src="style/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="style/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="style/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="style/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="style/dist/js/adminlte.js"></script>
</body>
</html>