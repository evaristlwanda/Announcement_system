

<?php
include "process.php";

 //users and admin login

 if(isset($_POST['login'])){
      
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * FROM users WHERE UserName='$username'";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)==1){

    $user=mysqli_fetch_assoc($result);
    // Hashed password stored in the database
    $hashed_password = $user['Password'];

     // Verify the entered password against the stored hashed password
     if (password_verify($password, $hashed_password)) {
    $_SESSION['Username']=$user['Username'];
    $_SESSION['UserID']=$user['UserID'];
    $_SESSION['RoleID'] = $user['RoleID'];

    // Redirect based on role
    if ($user['RoleID'] == 1) {
        // teacher role
        header('Location:teacher_dashboard.php');
    } elseif ($user['RoleID'] == 2) {
        // student role
        header('Location:student_dashboard.php');
    } elseif ($user['RoleID'] == 3) {
        // Admin role
        header('Location: admin.php');
    }
    else {
        // Invalid role
        $error1 = 'Invalid user role';
        header("Location:index.php?error=$error1");
  }
}
  else{
    $error1='incorrect Password ';
    header("location:index.php?error=$error1");
  }
   exit();
}
    else{
        $error1='incorrect user name ';
        header("location:index.php?error=$error1");
    }
 }
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="style/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="style/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
 <div class="card">
   <div class="card-body login-card-body">
      <?php 
        if(isset($_REQUEST['error'])){
             echo '<span class="error" style="color:red">'.$_REQUEST['error'].'</span>';
             }
      ?><br>
    <h1>Login</h1>
    <form action="index.php" method="POST">
        <div class=form-group>
        <label for="username">User Name</label>
        <input type="text"  class="form-control" name="username" required>
        </div>
        <div class=form-group>
        <label for="password">Password</label>
        <input type="password" class="form-control"  name="password" required>
        </div>
        <button type="submit" class="btn btn-primary" name="login">Sign Up</button>
    </form>
    </div>
  </div>
 </div>
         <!-- jQuery -->
         <script src="style/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="style/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="style/dist/js/adminlte.min.js"></script>
</body>
</html>