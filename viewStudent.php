<?php
include "process.php";
// session_start(); 
if (!isset($_SESSION['Username'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="style/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="style/dist/css/adminlte.min.css">
    
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="admin_dashboard.php" class="nav-link">Home</a>
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

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="index.php" class="brand-link">
                <img src="style/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">Admin Dashboard</span>
            </a>

            <div class="sidebar">
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
                            <a href="teacher_dashboard.php" class="nav-link active">
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
                            <a href="announcement.php" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>Watch Announcement</p>
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
                            <a href="#students" class="nav-link active">
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
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Admin Dashboard</h1>
                        </div>
                        <!-- <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="admin_dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    
            <!-- Students Table -->
              <div class="card" id="students">
                        <div class="card-header">
                            <h3 class="card-title">Students</h3>
                            <div class="card-tools">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#addStudentModal">Add Students</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>DepartmentID</th>
                                        <th>courseID</th>
                                        <th>ClassID</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- PHP code to fetch and display user data from the database -->
                                    <?php 
                                    $i = 1;
                                    foreach($students as $student) { ?>
                                        <tr>
                                          <td><?php echo $i++; ?></td>
                                          <td><?php echo $student['FirstName']; ?></td>
                                          <td><?php echo $student['LastName']; ?></td>
                                          <td><?=$student['Email']; ?></td>
                                          <td><?=$student['Phone']; ?></td>
                                          <td><?=$student['Gender']; ?></td>
                                          <td><?=$student['DepartmentID']; ?></td>
                                          <td><?=$student['CourseID']; ?></td>
                                          <td><?=$student['ClassID']; ?></td>
                                            <td>
                                            <button class="btn btn-info" data-toggle="modal" data-target="#editStudentModal<?=$student['StudentID']?>"><i class="nav-icon fas fa-edit"></i>
                                            </button>
                                                <button class="btn btn-danger"><a href="process.php?student_del=<?=$student['StudentID']?>"><i class="nav-icon fas fa-trash"></i></a></button>
                                            </td>
                                        </tr>

                                        <!-- Edit Student Modal -->
                                        <div class="modal fade" id="editStudentModal<?=$student['StudentID']?>" tabindex="-1" role="dialog" aria-labelledby="editTeacherModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editStudentModalLabel">Edit Student</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="process.php?up_s=<?=$student['StudentID']?>" method="POST">
                                                            <input type="hidden" name="studentID" value="<?=$student['StudentID']?>">
                                                            <div class="form-group">
                                                                <label for="username">First Name</label>
                                                                <input type="text" class="form-control" name="firstname" value="<?=$student['FirstName']?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="username">Last Name</label>
                                                                <input type="text" class="form-control" name="lastname" value="<?=$student['LastName']?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password">Email</label>
                                                                <input type="text" class="form-control" name="email" value="<?=$student['Email']?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password">Phone</label>
                                                                <input type="text" class="form-control" name="mobile" value="<?=$student['Phone']?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="role">Gender</label>
                                                                <select class="form-control" name="gender" required>
                                                                    <option value="<?=$student['Gender'];?>" ><?=$student['Gender'];?></option>
                                                                    
                                                                </select>
                                                                
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="department">Department ID</label>
                                                                <select class="form-control" name="department" required>
                                                                    <option value="<?=$student['DepartmentID']; ?>" ><?=$student['DepartmentID']; ?></</option>
                                                                    
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="course">Course ID</label>
                                                                <select class="form-control" name="course" required>
                                                                    <option value="<?=$student['CourseID']; ?>" ><?=$student['CourseID']; ?></option>
                                                                    
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="class">Class ID</label>
                                                                <select class="form-control" name="class" required>
                                                                    <option value="<?=$student['ClassID']; ?>" ><?=$student['ClassID']; ?></option>
                                                                    
                                                                </select>
                                                            </div>
                                                            <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
               <!-- add student modal -->
                    <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="process.php" method="POST">
                                        <!-- Add your form inputs for adding a new user here -->
                                        <div class="form-group">
                                        <label for="firstname">First name:</label>
                                            <input type="text" class="form-control" name="firstname" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="lastname">Last name:</label>
                                            <input type="text" class="form-control" name="lastname" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="text" >Mobile:</label>
                                            <input type="text" class="form-control" name="mobile" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select class="form-control" id="gender" name="gender" required>
                                             <option value="Male">Male</option>
                                             <option value="Female">Female</option>
                                             <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="course">Course:</label>
                                        <select class="form-control" id="course" name="course" required>
                                                 <!-- Replace with dynamic options from your database -->
                                                  <?php foreach($courses as $course){ ?>
                                                 <option value="<?=$course['CourseID']?>"><?=$course['CourseName']?></option>
                                                  <?php } ?>           
                                         </select>
                                         <div class="form-group">
                                         <label for="class">Class:</label>
                                            <select class="form-control"  id="class" name="class" required>
                                             <!-- Replace with dynamic options from your database -->
                                              <?php foreach($classes as $class){ ?>
                                             <option value="<?=$class['ClassID']?>"><?=$class['ClassName']?></option>
                                             <?php } ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label for="department">Department:</label>
                                             <select  class="form-control" id="department" name="department" required>
                                             <!-- Replace with dynamic options from your database -->
                                              <?php foreach($departs as $depart){ ?>

                                             <option value="<?=$depart['DepartmentID']?>"><?=$depart['DepartmentName']?></option>
                                             <?php } ?>
                                             </select>
                                        </div>
                                        <button type="submit" name="send" class="btn btn-primary">Add Student</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                
            </div>
            <strong>Copyright &copy; 2024 <a href="#">Announcement System</a>.</strong> All rights reserved.
        </footer>
        <!-- jQuery -->
        <script src="style/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="style/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="style/dist/js/adminlte.min.js"></script>
    </div>
</body>

</html>
