<?php include('admin-header.php') ?>

<div class ="container contact-container">

    <h2 style="text-align: center;">Enter the details</h2>
    <br>
    <form action="appoint.php" method="post">
        <div class="row">

            <div class="col-md-8" style="padding-left:400px ;">
            <input type="text" name="username" class="form-control student-text" placeholder="User Name">
                <input type="text" name="f_name" class="form-control student-text" placeholder="First Name">
                <input type="text" name="l_name" class="form-control student-text" placeholder="Last Name">
                <input type="password" name="password" class="form-control student-text" placeholder="Password">
                <select class="custom-select" name="hostel_name">
                    <option selected>Hostel Name</option>
                    <option value="A">A Hostel</option>
                    <option value="B">B Hostel</option>
                    <option value="C">C Hostel</option>
                    <option value="D">D Hostel</option>
                    <option value="E">E Hostel</option>
                    <option value="F">F Hostel</option>
                </select>
                <input type="text" name="mobile" class="form-control student-text" placeholder="Mobile">
            </div>
            <div class="col-md-10" style="padding-left: 540px;">
            <button type="submit" name="appoint-hm"  class="btn-lg btn-primary" style="margin-top:10px;">Submit</button>
            </div>
        </div>
    </form>

</div>

<?php include('admin-footer.php'); ?>

<?php

if (isset($_POST['appoint-hm'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $f_name = $_POST['f_name'];
  $l_name = $_POST['l_name'];
  $hostel_name = $_POST['hostel_name'];
  $mobile = $_POST['mobile'];
  $ha_id= $_SESSION['ha_id'];

  if (empty($username) || empty($password) || empty($f_name) || empty($l_name) || empty($hostel_name) || empty($mobile)) {
    echo "<script type='text/javascript'>alert('Empty Feild!')</script>";
    exit();
  }
  else {
    $sql = "SELECT * FROM hostel WHERE hostel_name='$hostel_name';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $hostel_id= $row['hostel_id'];
    //echo $hostel_id;
    //echo $row;
    $sql = "INSERT INTO hostel_manager (f_name, l_name, username, mobile, password, admin, hostel_id) VALUES ('$f_name', '$l_name', '$username', '$mobile', '$password', '$ha_id', '$hostel_id');";
    $result = mysqli_query($conn, $sql);
  //  echo "<script type='text/javascript'>alert('Sucessfully Inserted!')</script>";
    if($result) {
        echo "<script type='text/javascript'>alert('Hostel Manager insertion Success!')</script>";
        exit(); 
    }
    else {
        echo "<script type='text/javascript'>alert('Hostel Manager insertion Failed!')</script>";
        exit(); 
    }
  }
}

?>

