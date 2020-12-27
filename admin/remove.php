<?php include('admin-header.php') ?>

<div class ="container contact-container">

    <h2 style="text-align: center;">Enter the details</h2>
    <br>
    <form action="remove.php" method="post">
        <div class="row">

            <div class="col-md-8" style="padding-left:400px ;">
            <input type="text" name='username' class="form-control student-text" placeholder="User Name">
            <select class="custom-select" name="hostel_name">
                    <option selected>Hostel Name</option>
                    <option value="A">A Hostel</option>
                    <option value="B">B Hostel</option>
                    <option value="C">C Hostel</option>
                    <option value="D">D Hostel</option>
                    <option value="E">E Hostel</option>
                    <option value="F">F Hostel</option>
            </select>
             <input type="password" name='password' class="form-control student-text" placeholder="Admin Password">
            </div>
            <div class="col-md-10" style="padding-left: 540px;">
            <button type="submit" name="remove-hm"  class="btn-lg btn-primary" style="margin-top:10px;">Submit</button>
            </div>
        </div>
    </form>

</div>
<br>
<br>
<?php include('admin-footer.php'); ?>

<?php

if (isset($_POST['remove-hm'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $hostel_name = $_POST['hostel_name'];
//  echo $username;
//  echo $password;
//  echo $hostel_name;

  if (empty($username) || empty($password) || empty($hostel_name) ) {
    echo "<script type='text/javascript'>alert('Empty Feild!')</script>";
    exit();
  }
  else if($_SESSION['password']!=$password){
    echo "<script type='text/javascript'>alert('Wrong Password!')</script>";
    exit();
  }
  else {
    $sql = "SELECT * FROM hostel WHERE hostel_name='$hostel_name'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $hostel_id= $row['hostel_id'];
    $sql = "DELETE FROM hostel_manager WHERE username='$username' and hostel_id='$hostel_id'";
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        echo "<script type='text/javascript'>alert('Sucessfully Deleted!')</script>";
        exit();
    }
    else {
        echo "<script type='text/javascript'>alert('Deletion Failed!')</script>";
        exit();
    }
  }
}

?>
