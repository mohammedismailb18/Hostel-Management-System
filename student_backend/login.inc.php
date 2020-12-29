<?php 

if (isset($_POST['student-login'])) {
  require 'config.inc.php';
  $roll = $_POST['student_roll_no'];
  $password = $_POST['pwd'];

  if (empty($roll) || empty($password)) {
    echo ("<script LANGUAGE='JavaScript'>
      window.alert('Empty Feild');
      window.location.href='../index.php';
      </script>");
      exit();
  }
  else {
    $sql = "SELECT *FROM student WHERE student_id = '$roll'";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result)){
      // $pwdCheck = password_verify($password, $row['password']);
      // if($pwdCheck == false){
      //   header("Location: ../index.php?error=wrongpwd");
      //   exit();
      // }
      if($password == $row['password']) {

        //session_start();
        $_SESSION['roll'] = $row['student_id'];
        $_SESSION['fname'] = $row['f_name'];
        $_SESSION['lname'] = $row['l_name'];
        $_SESSION['department'] = $row['dept'];
        $_SESSION['year_of_study'] = $row['year'];
        $_SESSION['hostel_id'] = $row['hostel_id'];
        $_SESSION['room_id'] = $row['room_id'];
        $_SESSION['gender'] = $row['gender'];

        if(isset($_SESSION['roll'])){
          echo "<script type='text/javascript'>alert('success')</script>";
        }
        else {
          echo "<script type='text/javascript'>alert('Not SET')</script>";
        }
         echo $_SESSION['roll'];

        header("Location: ../student/home.php?login=success");
        exit();
      }
      else {
        echo ("<script LANGUAGE='JavaScript'>
      window.alert('Password is incorrect');
      window.location.href='../index.php';
      </script>");
      exit();
      }
    }
    else{
      echo ("<script LANGUAGE='JavaScript'>
      window.alert('No user exist');
      window.location.href='../index.php';
      </script>");
      exit();
    }
  }

}
else {
  header("Location: ../index.php");
  exit();
}

?>