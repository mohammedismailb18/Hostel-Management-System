<?php include('hm-header.php') ?>

<div class ="container contact-container">

    <h2>Applications</h2>
    <br>
    <form action="room-allocation.php" method="post">
        <div class="row">

            <div class="col-md-6">
                <input type="text" class="form-control student-text" name="search_box" placeholder="Roll Number">   
                
            </div>

            <div class="col-md-6">
                <button type="submit" name="contact-button"  class="btn-md btn-primary" style="margin-top:10px;  padding: 5px 25px 5px;">Submit</button>
            </div>
        </div>
    </form>
<br>
    <?php
   if (isset($_POST['contact-button'])) {
   	   $search_box = $_POST['search_box'];
   	   /*echo "<script type='text/javascript'>alert('<?php echo $search_box; ?>')</script>";*/
   	   $hm_id = $_SESSION['hm_id'];
   	   $query_search = "SELECT * FROM application WHERE student_id like '$search_box%' and hm_id = '$hm_id'";
   	   $result_search = mysqli_query($conn,$query_search);

   	   //select the hostel name from hostel table
       $query6 = "SELECT * FROM hostel_manager,hostel WHERE hostel_manager.hostel_id=hostel.hostel_id and hostel_manager.hm_id = '$hm_id'";
       $result6 = mysqli_query($conn,$query6);
       $row6 = mysqli_fetch_assoc($result6);
       $hostel_name = $row6['hostel_name'];

     
   	   ?>
   	   <div >
   	   <table class="table table-hover">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Student ID</th>
        <th>Hostel</th>
        <th>Room Number</th>
        <th>Message</th>
      </tr>
    </thead>
    <tbody>

    <?php
   	   if(mysqli_num_rows($result_search)==0){
   	   	  echo '<tr><td colspan="4">No Rows Returned</td></tr>';
   	   }
   	   else{
   	   	  while($row_search = mysqli_fetch_assoc($result_search)){
      		//get the name of the student to display
            $student_id = $row_search['student_id'];
            $room_id=$row_search['room_id'];

            $query7 = "SELECT * FROM Student WHERE student_id = '$student_id'";
            $result7 = mysqli_query($conn,$query7);
            $row7 = mysqli_fetch_assoc($result7);
            $student_name = $row7['f_name']." ".$row7['l_name'];
            
            //get room_no
            $query10 = "SELECT * FROM room WHERE room_id = '$room_id'";
            $result10 = mysqli_query($conn,$query10);
            $row10 = mysqli_fetch_assoc($result10);
            $room_no = $row10['room_no'];


              echo "<tr><td>{$student_name}</td>
              <td>{$row_search['student_id']}</td>
              <td>{$hostel_name}</td>
              <td>{$room_no}</td>
              <td>{$row_search['message']}</td>
              </tr>\n";
   	   }
   }
   ?>
   </tbody>
  </table>
</div>
<?php } ?>



<div>
<h2 class="heading text-capitalize mb-sm-5 mb-4"> Applications Received </h2>
<?php
  $hm_id = $_SESSION['hm_id'];
  $query1 = "SELECT * FROM application WHERE hm_id = '$hm_id' and status='0'";
  $result1 = mysqli_query($conn,$query1);

  //select the hostel name from hostel table
$query12 = "SELECT * FROM hostel_manager,hostel WHERE hostel_manager.hostel_id=hostel.hostel_id and hostel_manager.hm_id = '$hm_id'";
$result12 = mysqli_query($conn,$query12);
$row12 = mysqli_fetch_assoc($result12);
$hostel_name1 = $row12['hostel_name'];
?>
        
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Student ID</th>
        <th>Hostel</th>
        <th>Room Number</th>
        <th>Message</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
      if(mysqli_num_rows($result1)==0){
         echo '<tr><td colspan="4">No Applications have been found</td></tr>';
      }
      else{
      	while($row1 = mysqli_fetch_assoc($result1)){
      		//get the name of the student to display
            $student_id = $row1['student_id']; 
            $room_id=$row1['room_id'];

            $query7 = "SELECT * FROM student WHERE student_id = '$student_id'";
            $result7 = mysqli_query($conn,$query7);
            $row7 = mysqli_fetch_assoc($result7);
            $student_name = $row7['f_name']." ".$row7['l_name'];

             //get room_no
             $query14 = "SELECT * FROM room WHERE room_id = '$room_id'";
             $result14 = mysqli_query($conn,$query14);
             $row14 = mysqli_fetch_assoc($result14);
             $room_no1 = $row14['room_no'];
            //    
              echo "<tr><td>{$student_name}</td>
              <td>{$row1['student_id']}</td>
              <td>{$hostel_name1}</td>
              <td>{$room_no1}</td>
              <td>{$row1['message']}</td>
              <td>
              <form action='room-allocation.php' method='get'>
               <button type='submit' style='margin-top: 0px;' name='alloc' value='{$row1['student_id']}' class='btn-md btn-primary' style='margin-top:10px; margin-left: -10px; padding: 8px 25px 8px;''>Allocate</button>
               </form>
               </td></tr>\n";
      	}
      }
    ?>
 
    </tbody>
  </table>
</div>

<?php
if(isset($_GET['alloc'])){
  
  //header("Location:room-allocation.php");
    $roll=$_GET['alloc'];

    $que = "SELECT * FROM application WHERE student_id = '$roll'";
    $res = mysqli_query($conn,$que);
    $rows = mysqli_fetch_assoc($res);

     //select the hostel name from hostel table
     $que4 = "SELECT * FROM hostel_manager,hostel WHERE hostel_manager.hostel_id=hostel.hostel_id and hostel_manager.hm_id = '$hm_id'";
     $res4 = mysqli_query($conn,$que4);
     $rows2 = mysqli_fetch_assoc($res4);
     $hostel_id = $rows2['hostel_id'];

    
    $que2="UPDATE application SET status = '1' WHERE student_id = '$roll'";
    $res2 = mysqli_query($conn,$que2);

        $que3="UPDATE student SET room_id = '$rows[room_id]',hostel_id='$hostel_id' WHERE student_id = '$roll'";
        $res3 = mysqli_query($conn,$que3);
 
            $que4="UPDATE room SET allocated='1' WHERE  room_id = '$rows[room_id]'";
            $res4 = mysqli_query($conn,$que4);
        
}
?>

<br>
<br>
</div>


<?php include('hm-footer.php');
