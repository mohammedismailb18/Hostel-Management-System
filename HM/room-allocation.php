<?php include('hm-header.php') ?>

<div class ="container contact-container">

    <h2>Applications</h2>
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
        <th>Roll Number</th>
        <th>Hostel</th>
        <th>Room Number</th>
        <th>Message</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="5">info</td>
        </tr>
    </tbody>
    </table>

    <div class="col-md-6">
                <button type="submit" name="contact-button"  class="btn-lg btn-primary" style="margin-top:10px;">Confirm Allocation</button>
            </div>
    
</div>

<br>
<br>


<?php include('hm-footer.php');