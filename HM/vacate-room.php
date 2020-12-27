<?php include('hm-header.php') ?>

<?php
   $hostel_id = $_SESSION['hostel_id'];
   $query1 = "SELECT * FROM hostel WHERE hostel_id = '$hostel_id'";
   $result1 = mysqli_query($conn,$query1);
   $row1 = mysqli_fetch_assoc($result1);
   $hostel_name = $row1['hostel_name'];
?>

<div class ="container contact-container">

    <h2 style="text-align: center;">Enter the details</h2>
    <br>
    <form action="vacate-room.php" method="post">
        <div class="row">

            <div class="col-md-8" style="padding-left:400px ;">
                <input type="text" class="form-control student-text" placeholder="Hostel Name" name="hostel" value="<?php echo $row1['hostel_name']?>">   
                <input type="text" class="form-control student-text" name="roll_no" placeholder ="Roll No" >
                <input type="number" class="form-control student-text" name="room_no" placeholder ="Room No" >
              
            </div>

           
            <div class="col-md-10" style="padding-left: 540px;">
            <button type="submit" name="contact-button"  class="btn-lg btn-primary" style="margin: 8px auto 0px;; padding: 3px 25px 3px;">Submit</button>
            </div>
        </div>
    </form>

</div>
<br>
<br>

<?php
if(isset($_POST['contact-button'])){
     $roll = $_POST['roll_no'];
     $hostel = $_POST['hostel'];
     $room_number =(int)$_POST['room_no'];

    $query2 = "SELECT * FROM room WHERE hostel_id = '$hostel_id' and room_no = '$room_number'";
    $result2 = mysqli_query($conn,$query2);
    if(mysqli_num_rows($result2)==0){
        echo "<script type='text/javascript'>alert('Incorrect Details')</script>";
        exit();
    }
    $row2 = mysqli_fetch_assoc($result2);
    if($row2['allocated']=='0'){
    	echo "<script type='text/javascript'>alert('Room Not Allocated')</script>";
    	exit();
    }
    $room_id = (int)$row2['room_id'];
    /*echo "<script type='text/javascript'>alert('<?php echo $room_id ?>')</script>";*/
	$query3 = "SELECT * FROM Student WHERE student_id = '$roll' and hostel_id = '$hostel_id' and room_id = '$room_id'";
	$result3 = mysqli_query($conn,$query3);
    if(mysqli_num_rows($result3)==0){
        echo "<script type='text/javascript'>alert('Incorrect Details 2')</script>";
        exit();
    }
    $row3 = mysqli_fetch_assoc($result3);
    if($result3){
    	$query4 = "UPDATE student SET hostel_id = NULL, room_id = NULL WHERE student_id = '$roll'";
    	$result4 = mysqli_query($conn,$query4);
    	if($result4){
    		$query5 = "UPDATE room SET allocated = '0' WHERE room_id = '$room_id'";
    		$result5 = mysqli_query($conn,$query5);
    		if($result5){
    			$query6 = "DELETE FROM Application WHERE student_id = '$roll'";
    			$result6 = mysqli_query($conn,$query6);
    			if($result6){
    			    echo "<script type='text/javascript'>alert('Vacated Successfully')</script>";	
    			}
    			
    		}
    	}
    }
}
?>

<?php include('hm-footer.php');