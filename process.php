<?php
session_start();

include "connection.php";


//retrieve data from department table
$sql1="SELECT * FROM Departments";
$departs=mysqli_query($conn,$sql1);


//retrieve data afrom course table
$sql2="SELECT * FROM courses";
$courses=mysqli_query($conn,$sql2);


//retrieve data from classes 
$sql3="SELECT * FROM  classes";
$classes=mysqli_query($conn,$sql3);


//retrieve data from users table 
 $sql4="SELECT * FROM users";
 $users=mysqli_query($conn,$sql4);




 //get data from student registration form

 if(isset($_POST['send'])){

 $fname=$_POST['firstname'];
 $lname=$_POST['lastname'];
 $email=$_POST['email'];
 $phon=$_POST['mobile'];
 $gender=$_POST['gender'];
 $course=$_POST['course'];
 $class=$_POST['class'];
 $depart=$_POST['department'];


 //default password

$password=12345;
$roleID=2;
$username=strtolower($fname . '_' . $lname);
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

$sql=" INSERT INTO users(Username,Password,RoleID) VALUES('$username', '$hashedPassword','$roleID') ";
mysqli_query($conn,$sql);

// Get the inserted UserID
$userID = mysqli_insert_id($conn);

//insert student data into database

 $sql5="INSERT INTO students(FirstName,LastName,Email,Phone,Gender,DepartmentID,CourseID,ClassID,UserID) VALUES 
 ('$fname','$lname','$email','$phon','$gender','$depart','$course','$class','$userID')";
mysqli_query($conn,$sql5);


// header("location:viewStudent.php");
 }


//collect data from techer registration form
 if(isset($_POST['tsend'])){

    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $email=$_POST['email'];
    $phon=$_POST['mobile'];
    $gender=$_POST['gender'];
    $depart=$_POST['department'];


//default password

$password=12345;
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

//GIVE USER ROLE
$roleID=1;
//SET USER NAME
$username=strtolower($fname . '_' . $lname);

//INSERT DATA TO USER TABLE
$sql=" INSERT INTO users(Username,Password,RoleID) VALUES('$username', '$hashedPassword','$roleID') ";
$users=mysqli_query($conn,$sql);

//Get the inserted ID
$userID=mysqli_insert_id($conn);

//insert studentr data into database
 $sql5="INSERT INTO teachers(FirstName,LastName,Email,Phone,Gender,DepartmentID,UserID) VALUES 
 ('$fname','$lname','$email','$phon','$gender','$depart',$userID)";
mysqli_query($conn,$sql5);
// header("location:viewTeacher.php");

 }
 
 //collect data from techer registration form
 if(isset($_POST['asend'])){

  $fname=$_POST['firstname'];
  $lname=$_POST['lastname'];
  $email=$_POST['email'];
  
//default password
$password=54321;
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

//GIVE USER ROLE
$roleID=3;

//SET USER NAME
$username=strtolower($fname . '_' . $lname);

//INSERT DATA TO USER TABLE
$sql=" INSERT INTO users(Username,Password,RoleID) VALUES('$username', '$hashedPassword','$roleID') ";
$admins=mysqli_query($conn,$sql);

//Get the inserted ID
$userID=mysqli_insert_id($conn);

//insert studentr data into database
$sql5="INSERT INTO admins(FirstName,LastName,Email,UserID) VALUES 
('$fname','$lname','$email',$userID)";
mysqli_query($conn,$sql5);


}

 //collect data from add department form
 if(isset($_POST['add_department'])){
   echo $depart=$_POST['departmentName'];
    
    //insert department data into database
    
     $sql_add_department="INSERT INTO departments(DepartmentName) VALUES ('$depart')";
    mysqli_query($conn,$sql_add_department);
    header("location:viewDepartment.php");
  }

 //collect data from add course form
 if(isset($_POST['add_course'])){
   $course=$_POST['courseName'];
   $depart=$_POST['department'];
   
   //insert course data into database
   
    $sql_add_course="INSERT INTO courses(CourseName,DepartmentID) VALUES ('$course','$depart')";
   mysqli_query($conn,$sql_add_course);
   header("location:viewCourse.php");
 }
 
 //collect data from add subject form
 if(isset($_POST['add_subject'])){
  $subject=$_POST['subjectName'];
  $course=$_POST['course'];
  $teacher=$_POST['teacher'];
  
  //insert subject data into database
  
   $sql_add_subject="INSERT INTO subjects(SubjectName,CourseID,TeacherID) VALUES ('$subject','$course','$teacher')";
  mysqli_query($conn,$sql_add_subject);
  header("location:viewSubject.php");
}

// collect data from add class form
if(isset($_POST['add_class'])){
  $class=$_POST['className'];
  $course=$_POST['course'];
  
  //insert class data into database
  
   $sql_add_class="INSERT INTO classes(ClassName,CourseID) VALUES ('$class','$course')";
  mysqli_query($conn,$sql_add_class);
  header("location:viewClass.php");
}

 //retrieve data from course table 

 $sql6="SELECT * FROM courses ";
 $courses=mysqli_query($conn,$sql6);

 //retrieve data from subject table
 $sql7="SELECT * FROM subjects";
 $subjects=mysqli_query($conn,$sql7);

 //retrieve data from department table 
 $sql8="SELECT * FROM departments";
 $departments=mysqli_query($conn,$sql8);


 //retrieve data drom teacher table 
 $sql9="SELECT * FROM teachers";
 $teachers=mysqli_query($conn,$sql9);

 //retrieve data from students 
 $sql_student="SELECT * FROM students";
 $students=mysqli_query($conn,$sql_student);

 //retrieve data from announcement category table 

 $sql_ann="SELECT * FROM announcementcategories ";
 $annCategories=mysqli_query($conn,$sql_ann);

 //delete user
 if(isset($_REQUEST['user_del'])){
$id=$_REQUEST['user_del'];

$sql="DELETE FROM users WHERE UserID='$id' ";
 $result=mysqli_query($conn,$sql);
if($result){
    header("location:admin.php#users");
}
 }
//delete teacher
if(isset($_REQUEST['teacher_del'])){
    $id=$_REQUEST['teacher_del'];
    $sql="DELETE FROM teachers WHERE TeacherID='$id' ";
     $result=mysqli_query($conn,$sql);
    if($result){
        header("location:viewTeacher.php#teachers");
    }
     }
     //delete student
 if(isset($_REQUEST['student_del'])){
    $id=$_REQUEST['student_del'];
    $sql="DELETE FROM students WHERE StudentID='$id' ";
     $result=mysqli_query($conn,$sql);
    if($result){
        header("location:viewStudent.php#students");
    }
     }

//delete courses
if(isset($_REQUEST['coz_del'])){
    $id=$_REQUEST['coz_del'];
    
    $sql_del="DELETE FROM courses WHERE CourseID='$id' ";
     $result=mysqli_query($conn,$sql_del);
        header("location:viewCourse.php#courses");
    
}

 //delete departments
 if(isset($_REQUEST['dep_del'])){
    $id=$_REQUEST['dep_del'];
    
    $sql_del_dep="DELETE FROM departments WHERE DepartmentID='$id' ";
     $result=mysqli_query($conn,$sql_del_dep);
        header("location:viewDepartment.php#departments");

 }

 //delete classes
if(isset($_REQUEST['del_class'])){
    $id=$_REQUEST['del_class'];
    
    $sql_del_class="DELETE FROM classes WHERE ClassID='$id' ";
     $result=mysqli_query($conn,$sql_del_class);
        header("location:viewClass.php#classes");
    
}

//delete subject
if(isset($_REQUEST['sub_del'])){
  $id=$_REQUEST['sub_del'];
  
  $sql_del="DELETE FROM subjects WHERE SubjectID='$id' ";
   $result=mysqli_query($conn,$sql_del);
      header("location:viewSubject.php#subjects");
  
}


//update courses
 if(isset($_POST['update_course']) && isset($_REQUEST['updateID'])){
$id=$_REQUEST['updateID'];
$courseName=$_POST['course_name'];
$departmentID=$_POST['department_id'];

 $sql_update="UPDATE courses SET CourseName='$courseName',DepartmentID='$departmentID' WHERE CourseID='$id'";
 mysqli_query($conn,$sql_update);
 header("location:viewCourse.php#courses");
 }

//update departments
 if(isset($_POST['update_department']) && isset($_REQUEST['dep_ID'])){
$ID=$_REQUEST['dep_ID'];
$departmentName=$_POST['department_name'];
$sql_update_depart="UPDATE departments SET DepartmentName='$departmentName' WHERE DepartmentID='$ID'";
mysqli_query($conn,$sql_update_depart);
header("location:viewDepartment.php#departments");
 }

 //update classes
 if(isset($_POST['update_class']) && isset($_REQUEST['up_class'])){
   $id=$_REQUEST['up_class'];
   $className=$_POST['class_name'];
   $courseID=$_POST['course_id'];
    
     $sql_update_class="UPDATE classes SET ClassName='$lassName',CourseID='$courseID' WHERE ClassID='$id'";
     mysqli_query($conn,$sql_update_class);
     header("location:viewClass.php#classes");
     }

    
  //update subject
//  if(isset($_POST['update_subject']) && isset($_REQUEST['subID'])){
//   $id=$_REQUEST['subID'];
//   $subjectName=$_POST['subject_name'];
//   $courseID=$_POST['course_id'];
//  $teacherID=$_POST['teacher_id'];
  
//   $sql_update="UPDATE subjects SET SubjectName='$subjectName',CourseID='$courseID',TeacherID='teacherID' WHERE SubjectID='$id'";
//    mysqli_query($conn,$sql_update);
//   header("location:viewSubject.php#subjects");
//    }

 //update teachers
 if(isset($_POST['update_teacher']) && isset($_REQUEST['up_t'])){
   echo $id=$_REQUEST['up_t'];
  $firstName=$_POST['firstname'];
    $lastName=$_POST['lastname'];
    $email=$_POST['email'];
  $phone=$_POST['mobile'];
   $gender=$_POST['gender'];
 $departmentID=$_POST['department'];
    
     $sql_update="UPDATE teachers SET FirstName='$firstName',LastName='$lastName',Email='$email',Phone='$phone',Gender='$gender',DepartmentID='$departmentID' WHERE TeacherID='$id'";
     mysqli_query($conn,$sql_update);
     header("location:viewTeacher.php");
     }
    
     //update students
 if(isset($_POST['update_student']) && isset($_REQUEST['up_s'])){
    $id=$_REQUEST['up_s'];
 $firstName=$_POST['firstname'];
     $lastName=$_POST['lastname'];
     $email=$_POST['email'];
  $phone=$_POST['mobile'];
  $gender=$_POST['gender'];
 $departmentID=$_POST['department'];
  $course=$_POST['course'];
   $class=$_POST['class'];
     
      $sql_update="UPDATE students SET FirstName='$firstName',LastName='$lastName',Email='$email',Phone='$phone',Gender='$gender',DepartmentID='$departmentID',CourseID='$course',ClassID='$class' WHERE StudentID='$id'";
      mysqli_query($conn,$sql_update);
      header("location:viewStudent.php");
      }


      //collect data from post announcement form
if(isset($_POST['announcement'])){ 
      $title = $_POST['announcementTitle'];
     echo $category = $_POST['category'];
      $postedBy = $_SESSION['UserID'];  // teacher ID is stored in session
      $postedDate = date('Y-m-d H:i:s');
  

      // Handling the file upload
    $target_dir = "uploads/";  // Directory to store files //Specifies the directory on the server where uploaded files will be stored.
    $file_name = basename($_FILES["announcementFile"]["name"]);//RETRIEVING AND EXTRACTING THE ORIGINAL NAME OF EXTRACTED FILE
    $target_file = $target_dir . $file_name; //CREATE FULL PATH THAT THE FILE WILL BE STORED
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));//pathinfo() Function: Retrieves information about a file path. PATHINFO_EXTENSION: Extracts the file extension (e.g., pdf, jpg).
    
    // Check if file is a valid type
    $allowed_types = array('pdf', 'jpg', 'jpeg', 'png', 'docx', 'xlsx');
    if (in_array($file_type, $allowed_types)) {
        if (move_uploaded_file($_FILES["announcementFile"]["tmp_name"], $target_file)) {
            // File uploaded successfully
            $attachmentPath = $target_file;
            $attachmentType = $file_type;

            // Insert announcement data into the database
            $query = "INSERT INTO announcements (Title, CategoryID, PostedBy, PostedDate, AttachmentPath, AttachmentType) 
                      VALUES ('$title', '$category', '$postedBy', '$postedDate', '$attachmentPath', '$attachmentType')";
         mysqli_query($conn,$query);
         header("location:post_announcement.php");
        } else {
           echo "Error uploading file.";
        }
   } else {
        echo "Invalid file type. Only PDF, JPG, JPEG, PNG, DOCX, and XLSX are allowed.";
  }
}



$query = "
    SELECT a.Title, a.PostedDate, a.AttachmentPath, c.CategoryName,
           CONCAT(t.FirstName, ' ', t.LastName) AS PostedByName
    FROM announcements As a
    JOIN announcementcategories As c ON a.CategoryID = c.CategoryID
    JOIN users As u ON a.PostedBy = u.UserID
    JOIN teachers As t ON u.UserID = t.UserID ORDER BY PostedDate DESC ";
    $announces = mysqli_query($conn, $query);
      




