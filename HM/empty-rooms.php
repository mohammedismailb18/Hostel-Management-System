<?php include('hm-header.php') ?>

<div class ="container contact-container">

    <h2>Search By Room Number</h2>
    <br>
    <form action="contact.php contact-form" method="post">
        <div class="row">

            <div class="col-md-6">
                <input type="text" class="form-control student-text" placeholder="Room Number">   
                
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
        <th>Hostel Name</th>
        <th>Room Number</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2">info</td>
        </tr>
    </tbody>
    </table>
    
</div>
<br>
<br>


<?php include('hm-footer.php');