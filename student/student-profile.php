<?php include('student-header.php') ?>

<?php 
    //For finding hostel name and room no
    $student_id = $_SESSION['roll'];
    $query = "SELECT * FROM student WHERE student_id = '$student_id'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    if(is_null($row['hostel_id'])) {
        $query = "SELECT status FROM application WHERE student_id = '$student_id'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        if(is_null($row)) {
            $hostel_name = "Not alloted";
            $room_no = "Not alloted";
        }
        else if($row['status'] == 0){
            $hostel_name = "Application Pending";
            $room_no ="Application Pending";
        }
    }
    else {
        $query = "SELECT hostel_name,room_no FROM student NATURAL JOIN room NATURAL JOIN hostel WHERE student_id = '$student_id'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $hostel_name = $row['hostel_name'];
        $room_no = $row['room_no'];
    }
    if($_SESSION['gender']==1) 
        $gender="Male";
    else
        $gender="Female";
?>

<br><br><br>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center" style="padding-left: 0px;">
            <div class="col-xl-6 col-md-12" style="padding-left: 0px;">
                <div class="card user-card-full" style="width: 700px;">
                    <div class="row m-l-0 m-r-0" style="width:700px;">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600" style="color: white;"><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></h6>
                                <p>Student</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Details</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600" style="color: black;">Roll No</p>
                                        <h6 class="text-muted f-w-400"><?php echo $_SESSION['roll']; ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600" style="color: black;">Year of Study</p>
                                        <h6 class="text-muted f-w-400"><?php echo $_SESSION['year_of_study'] ?></h6>
                                    </div>
                                </div>
                               <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600" style="color: black;">Gender</p>
                                        <h6 class="text-muted f-w-400"><?php echo $gender ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600" style="color: black;">Department</p>
                                        <h6 class="text-muted f-w-400" style="color: black;"><?php echo $_SESSION['department'] ?></h6>
                                    </div>
                                    
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600" style="color: black;">Hostel</p>
                                        <h6 class="text-muted f-w-400"><?php echo $hostel_name; ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600" style="color: black;">Room No</p>
                                        <h6 class="text-muted f-w-400"><?php echo $room_no; ?></h6>
                                    </div>
                                </div>
                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br><br>

<?php include('student-footer.php'); ?>