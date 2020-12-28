
<?php

if (isset($_POST['signup-student'])) {//

  require 'config.inc.php';

  $student_id = $_POST['username'];//
  $password = $_POST['password'];
  $confpassword =$_POST['confpassword'];
  $f_name = $_POST['f_name'];
  $l_name = $_POST['l_name'];
  $mobile = $_POST['mobile'];
  $gender = $_POST['gender'];
  $year = $_POST['year'];
  $dept = $_POST['dept'];

  /*echo $year;
  echo $dept;
  echo $gender;
  exit();*/
  //


  if (empty($student_id) || empty($password) || empty($f_name) || empty($l_name) || empty($confpassword) || empty($mobile) || empty($gender) || empty($year) || empty($dept)) {
    header("Location: ../index_signup.php?error=emptyfields");
    exit();
  }
  else {
    if($confpassword!=$password)
    {
    //  echo "<script type='text/javascript'>alert('Please Enter same password!')</script>";
      header("Location: ../index_signup.php?error=password_mismatch");
      exit();
    }
    $_SESSION['roll']=$student_id;
    $_SESSION['fname']=$f_name;
    $_SESSION['lname']=$l_name;
    $_SESSION['year_of_study']=$year;
    $_SESSION['department']=$dept;
    $_SESSION['password']=$password;
    $_SESSION['gender']=$gender;
    $_SESSION['hostel_id']=NULL;
    $_SESSION['room_id']=NULL;

    $sql = "INSERT INTO student VALUES ('$student_id','$f_name', '$l_name', '$year','$dept', '$password', NULL ,NULL,$gender,'$mobile');";
    $result = mysqli_query($conn, $sql);//
    header("Location: ../student/home.php");
    exit();
  }
}

?>
