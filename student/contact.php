<?php include('student-header.php') ?>

<?php 
    //For retrieving hostel name using hostel id from student

    $hostel_id = $_SESSION['hostel_id'];
    $sql = "SELECT hostel_name FROM hostel WHERE hostel_id = $hostel_id";
    $result = mysqli_query($conn, $sql);
    if($result) {
        if($result->num_rows!=0) {
            if($row = mysqli_fetch_assoc($result)){
                $hostel_name = $row['hostel_name'];
            }
        }
    }
    else {
        $hostel_name ="not alloted";
    }

?>

<div class ="container contact-container">

    <h2>Contact Us</h2>
    <br>
    <form action="contact.php" method="post">
        <div class="row">

            <div class="col-md-6">
                <input type="text" class="form-control student-text" placeholder="Hostel Name" value= "<?php echo $hostel_name; ?>" readonly>   
                <input type="text" class="form-control student-text" placeholder ="Roll No" value= <?php echo $_SESSION['roll']; ?> readonly>
                <input type="text" class="form-control student-text" placeholder="Name" value= "<?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?>" readonly>
                <input type="text" class="form-control student-text" name="subject" placeholder="Subject">
            </div>

            <div class="col-md-6">
                <textarea class="form-control student-text-area" id="exampleFormControlTextarea1" rows="7" placeholder="Message..." name="message"></textarea>
                
            </div>
            <div class="col-md-5" style="padding-left: 540px;">
            <button type="submit" name="submit"  class="btn-lg btn-primary" style="margin-top:10px;">Submit</button>
            </div>
        </div>
    </form>

</div>

<?php include('student-footer.php'); ?>

<?php
if(isset($_POST['submit'])){
	// echo "<script type='text/javascript'>alert('hello');</script>";
	$subject = $_POST['subject'];
    $message = $_POST['message'];

    $query6 = "SELECT * FROM hostel_manager WHERE hostel_id = '$hostel_id'";
    $result6 = mysqli_query($conn,$query6);
    $row6 = mysqli_fetch_assoc($result6);
    $hm_id = $row6['hm_id'];

    echo $hm_id;

	$roll = $_SESSION['roll'];
    date_default_timezone_set('Asia/Calcutta');
    $t=time();
    $time_stamp = date('Y-m-d H:i:s',$t);

    if(empty($message) || empty($subject) || strlen(trim($message)) == 0 || strlen(trim($subject)) == 0) {
        echo "<script type='text/javascript'>alert('column empty!')</script>";
        exit();
    }
    else if($hostel_name =="not alloted") {
        echo "<script type='text/javascript'>alert('Hostel not alloted!')</script>";
        exit();
    }

	$query = "INSERT INTO messages (hm_id,student_id,subject,message,time_stamp,sender) VALUES ('$hm_id','$roll','$subject','$message','$time_stamp','1')";
    $result = mysqli_query($conn,$query);
    if($result){
         echo ("<script LANGUAGE='JavaScript'>
        window.alert('Message sent to hostel manager Successfully!');
        window.location.href='home.php';
        </script>");
        exit();
         
    }
    else{
         echo "<script type='text/javascript'>alert('Error in sending message!!! Please try again.')</script>";
         exit();
   }
  }


?>