<?php include('hm-header.php') ?>

<div class ="container contact-container">

    <h2>Search By Roll Number</h2>
    <br>
    <form action="alloted-rooms.php" method="post">
        <div class="row">

            <div class="col-md-6">
                <input type="text" class="form-control student-text" name="search_box" placeholder="Roll Number">   
                
            </div>

            <div class="col-md-6">
                <button type="submit" name="contact-button"  class="btn-lg btn-primary" style="margin-top: 5px;">Submit</button>
            </div>
        </div>
    </form>
<br>
    <?php
   if (isset($_POST['contact-button'])) {
   	   $search_box = $_POST['search_box'];
   	   /*echo "<script type='text/javascript'>alert('<?php echo $search_box; ?>')</script>";*/
   	   $hostel_id = $_SESSION['hostel_id'];
   	   $query_search = "SELECT * FROM student WHERE student_id like '$search_box%' and hostel_id = '$hostel_id'";
   	   $result_search = mysqli_query($conn,$query_search);

   	   //select the hostel name from hostel table
       $query6 = "SELECT * FROM hostel WHERE hostel_id = '$hostel_id'";
       $result6 = mysqli_query($conn,$query6);
       $row6 = mysqli_fetch_assoc($result6);
       $hostel_name = $row6['hostel_name'];
   	   ?>
   	   <div class="container">
   	   <table class="table table-hover">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Student ID</th>
        <th>Contact Number</th> 
        <th>Hostel</th>
        <th>Room Number</th>
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
            $room_id = $row_search['room_id']; 
            $query7 = "SELECT * FROM room WHERE room_id = '$room_id'";
            $result7 = mysqli_query($conn,$query7);
            $row7 = mysqli_fetch_assoc($result7);
            $room_no = $row7['room_no'];
            //student name
            $student_name = $row_search['f_name']." ".$row_search['l_name'];
            
      		echo "<tr><td>{$student_name}</td><td>{$row_search['student_id']}</td><td>{$row_search['mobile']}</td><td>{$hostel_name}</td><td>{$room_no}</td></tr>\n";
   	   }
   }
   ?>
   </tbody>
  </table>
  <?php
}
  ?>
<br>
<h2 > Rooms Allotted </h2>
<br>
<?php
   $hostel_id = $_SESSION['hostel_id'];
   $query1 = "SELECT * FROM student where hostel_id = '$hostel_id'";
   $result1 = mysqli_query($conn,$query1);
   //select the hostel name from hostel table
   $query6 = "SELECT * FROM hostel WHERE hostel_id = '$hostel_id'";
   $result6 = mysqli_query($conn,$query6);
   $row6 = mysqli_fetch_assoc($result6);
   $hostel_name = $row6['hostel_name'];


?>
        
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Student ID</th>
        <th>Contact Number</th> 
        <th>Hostel</th>
        <th>Room Number</th>
      </tr>
    </thead>
    <tbody>
    <?php
      if(mysqli_num_rows($result1)==0){
         echo '<tr><td colspan="4">No Rooms have been Allocated</td></tr>';
      }
      else{
      	while($row1 = mysqli_fetch_assoc($result1)){
      		//get the room_no of the student from room_id in room table
            $room_id = $row1['room_id']; 
            $query7 = "SELECT * FROM room WHERE room_id = '$room_id'";
            $result7 = mysqli_query($conn,$query7);
            $row7 = mysqli_fetch_assoc($result7);
            $room_no = $row7['room_no'];
            //student name
            $student_name = $row1['f_name']." ".$row1['l_name'];
            
      		echo "<tr><td>{$student_name}</td><td>{$row1['student_id']}</td><td>{$row1['mobile']}</td><td>{$hostel_name}</td><td>{$room_no}</td></tr>\n";
      	}
      }
    ?>
    </tbody>
  </table>
          </div>
</div>

<?php include('hm-footer.php');