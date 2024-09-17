<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../style/dist/css/adminlte.min.css">
    <style>

.container{
    width: max-content;
    margin: auto;
    padding: 1em 1em 1em 1em;
    border-radius: 1em;
    box-shadow: 1px 1px 5px;
    /* display:flex;
    justify-content:center; */
}
.registration-option a{
 background-color: rgb(233, 232, 232);
color:black;
border-radius: 1em;
height: 50px;
padding: 1em 1em 1em 1em;
display:flex;
justify-content:center;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="registration-option">
            <h2>Register as a Student</h2>
            <p>To access student features and your dashboard, register here:</p>
            <a href="../student/student_register.php" class="register-link">Student Registration</a>
        </div>

        <div class="registration-option">
            <h2>Register as a Teacher</h2>
            <p>To access teacher features and your dashboard, register here:</p>
            <a href="../teacher/teacher_register.php" class="register-link">Teacher Registration</a>
        </div>
    </div>
</body>
</html>
