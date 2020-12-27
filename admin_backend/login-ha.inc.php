<?php

if (isset($_POST['admin-login'])) {
  require 'config.inc.php';
  $ha_id = $_POST['ha_id'];
  $password = $_POST['password'];

  if (empty($ha_id) || empty($password)) {
    header("Location: ../index.php?error=emptyfields");
    exit();
  }
  else {
    $sql = "SELECT * FROM administrator WHERE ha_id = '$ha_id'";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result)){
      // $pwdCheck = password_verify($password, $row['password']);
      // if($pwdCheck == false){
      //   header("Location: ../index.php?error=wrongpwd");
      //   exit();
      // }
//      echo $row;
      if($password == $row['password']) {

        //session_start();
        $_SESSION['ha_id'] = $row['ha_id'];
        $_SESSION['f_name'] = $row['f_name'];
        $_SESSION['l_name'] = $row['l_name'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['mobile'] = $row['mobile'];
        $_SESSION['password'] = $row['password'];


        if(isset($_SESSION['username'])){
          echo "<script type='text/javascript'>alert('success')</script>";
        }
        else {
          echo "<script type='text/javascript'>alert('Not SET')</script>";
        }
         echo $_SESSION['$username'];

        header("Location: ../admin/home.php?login=success");
        exit();
      }
      else {
        header("Location: ../index_ha.php?error=strangeerr");
        exit();
      }
    }
    else{
      header("Location: ../index_ha.php?error=nouser");
      exit();
    }
  }
}

else {
  header("Location: ../index.php");
  exit();
}

?>
