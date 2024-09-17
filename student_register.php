<?php
include "process.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>

    
    <style>
        .evan{
    width: max-content;
    margin: auto;
    padding: 1em 1em 1em 1em;
    border-radius: 1em;
    box-shadow: 1px 1px 5px;

    
}
input, select{
    width: 100%;
    height: 30px;
    border: 0 solid;
    border-radius: 4px;
    background-color: rgb(233, 232, 232);
    padding-left: 1em;
    
    
}
input:focus{
    outline: none;
}
.evan button{
   
    width: 50%;
    height: 30px;
    border: 1px solid aquamarine;
    border-radius: 4px;
}
a{
    text-decoration:none;
}

</style>
</head>
<body>
 <div class="evan">
    <h1>Registration Form</h1>
    <form action="process.php" method="POST">
        <label for="firstname">First name:</label>
        <input type="text" name="firstname" required><br>
        <label for="lastname">Last name:</label>
        <input type="text" name="lastname" required><br>
        <label for="email">Email</label>
        <input type="email" name="email" required><br>
        <label type="text" id="phone">Mobile:</label>
         <input type="text" name="mobile" placeholder="0700000000"><br>
         <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
       </select><br>
         <label for="course">Course:</label>
         <select id="course" name="course" required>
        <!-- Replace with dynamic options from your database -->
         <?php foreach($courses as $course){ ?>
        <option value="<?=$course['CourseID']?>"><?=$course['CourseName']?></option>
        <?php } ?>
        </select><br>
        <label for="class">Class:</label>
        <select id="class" name="class" required>
        <!-- Replace with dynamic options from your database -->
         <?php foreach($classes as $class){ ?>
        <option value="<?=$class['ClassID']?>"><?=$class['ClassName']?></option>
        <?php } ?>
       </select><br>
       <label for="department">Department:</label>
        <select id="department" name="department" required>
        <!-- Replace with dynamic options from your database -->
         <?php foreach($departs as $depart){ ?>

        <option value="<?=$depart['DepartmentID']?>"><?=$depart['DepartmentName']?></option>
        <?php } ?>
        </select>
       <br><br>
        <button type="submit" name="send">submit</button><br>
        <P>If you have an account</P>
        <a href="student_login.php">Log in</a>
        
    </form>
 </div>
    
</body>
</html>
