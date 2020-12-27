<?php include('hm-header.php') ?>

<div class ="container contact-container">

    <h2>Search By Room Number</h2>
    <br>
    <form action="empty-rooms.php" method="post">
        <div class="row">

            <div class="col-md-6">
                <input type="text" name="search_box" class="form-control student-text" placeholder="Room Number">   
                
            </div>

            <div class="col-md-6">
                <button type="submit" name="contact-button"  class="btn-lg btn-primary" style="margin-top:8px; padding: 3px 25px 3px;">Submit</button>
            </div>
        </div>
    </form>
<br><br>   

<?php 
    if(isset($_POST['contact-button']))
    {
        $search_box = $_POST['search_box'];
        /*echo "<script type='text/javascript'>alert('<?php echo $search_box; ?>')</script>";*/
        $hostel_id = $_SESSION['hostel_id'];
        $query_search = "SELECT * FROM room WHERE room_no like '$search_box%' and hostel_id = '$hostel_id' and allocated = '0'";
        $result_search = mysqli_query($conn,$query_search);

        //select the hostel name from hostel table
     $query6 = "SELECT * FROM hostel WHERE hostel_id = '$hostel_id'";
     $result6 = mysqli_query($conn,$query6);
     $row6 = mysqli_fetch_assoc($result6);
     $hostel_name = $row6['hostel_name'];
    ?>
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Hostel Name</th>
        <th>Room Number</th>
      </tr>
    </thead>
    <tbody>
    <?php
   	   if(mysqli_num_rows($result_search)==0){
   	   	  echo '<tr><td colspan="4">No Empty Rooms</td></tr>';
   	   }
   	   else{
   	   	  while($row_search = mysqli_fetch_assoc($result_search)){
         
      		echo "<tr><td>{$hostel_name}</td><td>{$row_search['room_no']}</td></tr>\n";
   	   }
   }
   ?>
    </tbody>
    </table>
    <?php }?>
    <br>
    <h2>Empty Rooms</h2>
<br>
    <?php
   $hostel_id = $_SESSION['hostel_id'];
   $query1 = "SELECT * FROM room where hostel_id = '$hostel_id' and allocated = '0'";
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
        <th>Hostel Name</th>
        <th>Room Number</th>
      </tr>
    </thead>
    <tbody>
    <?php
      if(mysqli_num_rows($result1)==0){
         echo '<tr><td colspan="4">No Empty Rooms</td></tr>';
      }
      else{
      	while($row1 = mysqli_fetch_assoc($result1)){
      		echo "<tr><td>{$hostel_name}</td><td>{$row1['room_no']}</td></tr>\n";
      	}
      }
    ?>
    </tbody>
  </table>
</div>
<?php include('hm-footer.php');