
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

  if (empty($student_id) || empty($password) || empty($f_name) || empty($l_name) || empty($confpassword) || empty($mobile) || empty($gender) || empty($year) || empty($dept)) {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Empty Feilds!!');
        window.location.href='../index_signup.php';
        </script>");
        exit();
  }
  else {
    if($confpassword!=$password)
    {
    //  echo "<script type='text/javascript'>alert('Please Enter same password!')</script>";
    echo ("<script LANGUAGE='JavaScript'>
      window.alert('Passwords not matching');
      window.location.href='../index_signup.php';
      </script>");
      exit();
    }
    if(substr($student_id,0,1) != "B" || !is_numeric(substr($student_id,1,6)) || !is_string(substr($student_id,-2,2)) ) {
      echo ("<script LANGUAGE='JavaScript'>
      window.alert('Enter proper Roll No');
      window.location.href='../index_signup.php';
      </script>");
      exit();
    }

    $sql = "SELECT* FROM student WHERE student_id = '$student_id';";
    $result = mysqli_query($conn, $sql);
    if($result) {
      $row = mysqli_fetch_assoc($result);
        if(!empty($row)) {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('User Already exist');
        window.location.href='../index_signup.php';
        </script>");
          exit();
      } 
    }

    if(substr($student_id,0,1) != "B" || !is_numeric(substr($student_id,1,6)) || !is_string(substr($student_id,-2,2)) ) {
      echo ("<script LANGUAGE='JavaScript'>
      window.alert('Enter proper Roll No');
      window.location.href='../index_signup.php';
      </script>");
      exit();
    }
    $sql = "INSERT INTO student VALUES ('$student_id','$f_name', '$l_name', '$year','$dept', '$password', NULL ,NULL,$gender,'$mobile');";
    $result = mysqli_query($conn, $sql);
    if($result) {
      echo ("<script LANGUAGE='JavaScript'>
      window.alert('Your account created Successfully');
      window.location.href='../index.php';
      </script>");
      exit();
    }
    else {
      echo ("<script LANGUAGE='JavaScript'>
      window.alert('Sign up error Please try agin Later');
      window.location.href='../index_signup.php';
      </script>");
      exit();
    }
  }
}

?>
