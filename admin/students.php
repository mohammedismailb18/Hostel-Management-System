<?php include('admin-header.php') ?>

<div class ="container contact-container">

    <h2>Search By Roll Number</h2>
    <br>
    <form action="contact.php contact-form" method="post">
        <div class="row">

            <div class="col-md-6">
                <input type="text" class="form-control student-text" placeholder="Roll Number">   
                
            </div>

            <div class="col-md-6">
                <button type="submit" name="contact-button"  class="btn-lg btn-primary" style="margin-top:10px;">Submit</button>
            </div>
        </div>
    </form>
<br><br>   
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
        <tr>
            <td colspan="5">info</td>
        </tr>
    </tbody>
    </table>
    
</div>
<br>
<br>


<?php include('admin-footer.php');