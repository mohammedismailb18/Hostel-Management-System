<?php

if (isset($_POST['remove-hm'])) {
  require 'config.inc.php';

  $username = $_POST['username'];
  $password = $_POST['password'];
  $hostel_name = $_POST['hostel_name'];
//  echo $username;
//  echo $password;
//  echo $hostel_name;

  if (empty($username) || empty($password) || empty($hostel_name) ) {
    header("Location:remove.php?error=emptyfields");
    exit();
  }
  else if($_SESSION['password']!=$password){
    header("Location:remove.php?error=wrongpwd");
  }
  else {
    $sql = "SELECT * FROM hostel WHERE hostel_name='$hostel_name';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $hostel_id= $row['hostel_id'];
    $sql = "DELETE FROM hostel_manager WHERE username='$username' and hostel_id='$hostel_id';";
    $result = mysqli_query($conn, $sql);
    header("Location: remove.php");
    echo "<script type='text/javascript'>alert('Sucessfully Deleted!')</script>";
    exit();
  }
}

else {
  header("Location: remove.php");
  exit();
}

?>
