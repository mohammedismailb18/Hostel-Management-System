<?php include('student-header.php') ?>

<div class ="container application-container">

    <h2>Application Form</h2>
    <br>
    <form action="application-form.php?id=<?php echo $_GET['id']?>" method="post">
        <div class="row">

            <div class="col-md-6">
                <input type="text" class="form-control student-text" placeholder="Roll No" value = <?php echo $_SESSION['roll']; ?> readonly>   
                <input type="text" class="form-control student-text" placeholder ="Hostel Name" value = <?php echo $_GET['id'] . " Hostel"; ?> readonly>

            </div>

            <div class="col-md-6">
                <textarea class="form-control student-text-area" id="exampleFormControlTextarea1" rows="3" placeholder="Message..." name="message"></textarea>
                
            </div>
        </div>
        <h5 style ="margin: 20px auto 20px;">Select Room :</h5>
        <div class="row">
        <!--- Room booking set up ---------->
            
        <div class="container boxed">
                <?php
                    $hostel_name = $_GET['id'];
                    $query = "SELECT * FROM room NATURAL JOIN hostel WHERE hostel_name='$hostel_name' ORDER BY room_no ASC";
                    $result = mysqli_query($conn,$query);
                    
                    // Checking wheather someone applied
                    $query2 = "SELECT room_id FROM application WHERE status='0' OR status ='1'";
                    $result2 = mysqli_query($conn,$query2);
                    $room_set = array();
                    while($row2 = mysqli_fetch_array($result2))
                    {
                        array_push($room_set,$row2['room_id']);
                    }

                    while($row = mysqli_fetch_assoc($result)) {
                        if($row['allocated'] == 1 || in_array($row['room_id'], $room_set)) {
                            continue;
                        }
                        $x = $row['room_no'];
                ?>
                    <input type="radio" id= <?php echo $x ?> name= "room_no" value=<?php echo $x ?>>
                    <label for=<?php echo $x ?> > <?php echo $x ?> </label>
                <?php } ?> 

                <br><br>
            </div>
        <!-------------------------------->
                <div class="col-md-5" style="padding-left: 540px; margin-bottom: 20px;">
                <button type="submit" name="application"  class="btn-lg btn-primary" style="margin-top:10px;margin-bottom: 30px;">Submit</button>
                </div>
        </div>
    </form>

</div>

<?php include('student-footer.php'); ?>

<?php 
    if(isset($_POST['application'])){
        // echo "<script type='text/javascript'>alert('hello');</script>";
        $message = $_POST['message'];
        $room_no = $_POST['room_no'];
        $student_id = $_SESSION['roll'];
        $hostel_name = $_GET['id'];

        //verifying wheather student already alloted
        $query = "SELECT room_id FROM student WHERE student_id = '$student_id'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        if(!empty($row['room_id'])) {
            echo "<script type='text/javascript'>alert('Already room is alloted for you')</script>";
            exit();
        }

        //verifying wheather student already applied
        $query = "SELECT * FROM application WHERE student_id = '$student_id'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        if(!empty($row['student_id'])) {
            echo "<script type='text/javascript'>alert('You have already applied')</script>";
            exit();
        }

        //Year of study and hostel verifying
        if($hostel_name=='A' && $_SESSION['year_of_study']!='1') {
            echo "<script type='text/javascript'>alert('only 1st year students permitted in Hostel A')</script>";
            exit();
        }
        else if($hostel_name=='B' && $_SESSION['year_of_study']!='2') {
            echo "<script type='text/javascript'>alert('only 2nd year student permitted in Hostel B')</script>";
            exit();
        }
        else if(($hostel_name=='C' || $hostel_name=='D' ) && $_SESSION['year_of_study']!='3') {
            echo "<script type='text/javascript'>alert('Only 3rd year student permitted in this Hostel')</script>";
            exit();
        }
        else if(($hostel_name=='E' || $hostel_name=='F' ) && $_SESSION['year_of_study']!='4') {
            echo "<script type='text/javascript'>alert('Only 4th year students permitted in this Hostel')</script>";
            exit();
        }
        

        //hostel manager id selecting
        $query = "SELECT * FROM hostel_manager NATURAL JOIN hostel WHERE hostel_name = '$hostel_name'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $hm_id = $row['hm_id'];
        $hostel_id = $row['hostel_id'];
        
        echo "Room No : " . $room_no;
        echo "Hostel id : " . $hostel_id;

        //room_id selecting
        $query = "SELECT * FROM room WHERE hostel_id = '$hostel_id' AND room_no='$room_no'";
        $result = mysqli_query($conn,$query);
        if($result) {
            if(mysqli_num_rows($result) == 0) {
                echo "rows are empty";
            }
            else {
                $row = mysqli_fetch_assoc($result);
                echo "success Room id : " . $row['room_id'];
                $room_id = $row['room_id'];
            }
        }
        else {
            echo "fail";
        }
        
        //application form submission
        $query = "INSERT INTO application (student_id,room_id,hm_id,message,status) VALUES ('$student_id','$room_id','$hm_id','$message','0')";
        $result = mysqli_query($conn,$query);
        if($result){
         echo ("<script LANGUAGE='JavaScript'>
        window.alert('Application sent Successfully!');
        window.location.href='home.php';
        </script>");
        exit();
        }
        else{
            echo "<script type='text/javascript'>alert('Error in sending Application!!! Please try again.')</script>";
            exit();
        }

    }
?>