<?php include('admin-header.php') ?>

<div class ="container contact-container">

    <h2>Search By Roll Number</h2>
    <br>
    <form action="students.php" method="post">
        <div class="row">

            <div class="col-md-6">
                <input type="text" name="search_box" class="form-control student-text" placeholder="Roll Number">   
                
            </div>

            <div class="col-md-6">
                <button type="submit" name="contact-button"  class="btn-lg btn-primary" style="margin-top:10px;">Submit</button>
            </div>
        </div>
    </form>
    <br><br>

    <?php 
    if(isset($_POST['contact-button']))
    {
        $search_box = $_POST['search_box'];
        
        //select the hostel name from hostel table
     $query6 = "SELECT * FROM student WHERE student_id like '$search_box%'";
     $result6 = mysqli_query($conn,$query6);
    
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
   	   if(mysqli_num_rows($result6)==0){
   	   	  echo '<tr><td colspan="4">No Student Found</td></tr>';
   	   }
   	   else{
   	   	  while($row6 = mysqli_fetch_assoc($result6)){

            $name=$row6['f_name']." ".$row6['l_name'];

            $query7 = "SELECT * FROM hostel WHERE hostel_id = '$row6[hostel_id]'";
            $result7 = mysqli_query($conn,$query7);
            $row7 = mysqli_fetch_assoc($result7);
        
            $query8 = "SELECT * FROM room WHERE room_id = '$row6[room_id]'";
            $result8 = mysqli_query($conn,$query8);
            $row8 = mysqli_fetch_assoc($result8);
            
            if(!isset($row7['hostel_name'])) {
                $hostel_name = "not alloted";
                $room_no = "not alloted";
            }
            else {
                $hostel_name = $row7['hostel_name'];
                $room_no = $row8['room_no'];
            }
      		echo "<tr><td>{$name}</td><td>{$row6['student_id']}</td><td>{$row6['mobile']}</td><td>{$hostel_name}</td><td>{$room_no}</td></tr>\n";
   	   }
   }
   ?>
    </tbody>
    </table>
    <?php }?>


</div>
<br>
<br>

<br><br><br><br><br><br><br>
<?php include('admin-footer.php');
