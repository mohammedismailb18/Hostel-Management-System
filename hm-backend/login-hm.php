<?php

if (isset($_POST['login-submit'])) {

  require 'db-connect.php';

  $username = $_POST['username'];
  $password = $_POST['pwd'];

  if (empty($username) || empty($password)) {
    header("Location: ../index_hm.php?error=emptyfields");
    exit();
  }
  else {
    $sql = "SELECT *FROM hostel_manager WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result)){
     
      if($password != $row['password']){
        header("Location:../index_hm.php?error=$row[password]");
        exit();
      }
      else {

       // session_start();
        $_SESSION['hm_id'] = $row['hm_id'];
        $_SESSION['fname'] = $row['f_name'];
        $_SESSION['lname'] = $row['l_name'];
        $_SESSION['mob_no'] = $row['mobile'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['hostel_id'] = $row['hostel_id'];
      //  $_SESSION['isadmin'] = $row['admin'];
        $_SESSION['PSWD'] = $row['password'];

        //Just for checking if session variables are working properly
        if(isset($_SESSION['username'])){
            echo "<script type='text/javascript'>alert(' SET')</script>";
        }
        else {
          echo "<script type='text/javascript'>alert('Not SET')</script>";
        }
        echo $_SESSION['lname'];
        header("Location: ../HM/home.php?login=$row[username]");
        exit();
      }
      
      }
    
    else{
      header("Location: ../index_hm.php?error=nouser");
      exit();
    }
  }
}
else {
  header("Location: ../index_hm.php");
  exit();
}
