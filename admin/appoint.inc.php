<?php

if (isset($_POST['appoint-hm'])) {
  require 'config.inc.php';

  $username = $_POST['username'];
  $password = $_POST['password'];
  $f_name = $_POST['f_name'];
  $l_name = $_POST['l_name'];
  $hostel_name = $_POST['hostel_name'];
  $mobile = $_POST['mobile'];
  $ha_id= $_SESSION['ha_id'];

  if (empty($username) || empty($password) || empty($f_name) || empty($l_name) || empty($hostel_name) || empty($mobile)) {
    header("Location:appoint.php?error=emptyfields");
    exit();
  }
  else {
    $sql = "SELECT * FROM hostel WHERE hostel_name='$hostel_name';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $hostel_id= $row['hostel_id'];
    //echo $hostel_id;
    //echo $row;
    $sql = "INSERT INTO hostel_manager (hm_id, f_name, l_name, username, mobile, password, admin, hostel_id) VALUES (NULL, '$f_name', '$l_name', '$username', '$mobile', '$password', $ha_id, '$hostel_id');";
    $result = mysqli_query($conn, $sql);
  //  echo "<script type='text/javascript'>alert('Sucessfully Inserted!')</script>";
    header("Location:appoint.php");
    echo "<script type='text/javascript'>alert('Sucessfully Inserted!')</script>";
    exit();
  }
}

else {
  header("Location:appoint.php");
  exit();
}

?>
