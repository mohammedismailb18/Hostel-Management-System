<?php include('hm-header.php') ?>
<br><br><br>
<?php
$hm_id=$_SESSION['hm_id'];
$query1 = "SELECT * FROM hostel_manager WHERE hm_id = '$hm_id'";
$result1 = mysqli_query($conn,$query1);
$row1 = mysqli_fetch_assoc($result1);
$name=$row1['f_name']." ".$row1['l_name'];

$query2 = "SELECT * FROM administrator WHERE ha_id = '$row1[admin]'";
$result2 = mysqli_query($conn,$query2);
$row2 = mysqli_fetch_assoc($result2);
$name2=$row2['f_name']." ".$row2['l_name'];

$query3 = "SELECT * FROM hostel WHERE hostel_id = '$row1[hostel_id]'";
$result3 = mysqli_query($conn,$query3);
$row3 = mysqli_fetch_assoc($result3);

?>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center" style="padding-left: 0px;">
            <div class="col-xl-6 col-md-12" style="padding-left: 0px;">
                <div class="card user-card-full" style="width: 700px;">
                    <div class="row m-l-0 m-r-0" style="width:700px;">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600" style="color: white;"><?php echo $name;?></h6>
                                <p>Hostel Manager</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600" style="color: black;">Username</p>
                                        <h6 class="text-muted f-w-400"><?php echo $row1['username'];?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600" style="color: black;">Admin Incharge</p>
                                        <h6 class="text-muted f-w-400"><?php echo $name2;?></h6>
                                    </div>
                                </div>
                               <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600" style="color: black;">Phone</p>
                                        <h6 class="text-muted f-w-400" style="color: black;"><?php echo $row1['mobile'];?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600" style="color: black;">Hostel</p>
                                        <h6 class="text-muted f-w-400"><?php echo $row3['hostel_name'];?></h6>
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
<?php include('hm-footer.php');