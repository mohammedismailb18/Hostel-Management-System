<?php include('student-header.php') ?>

<div class ="container contact-container">

    <h2>Contact Us</h2>
    <br>
    <form action="contact.php contact-form" method="post">
        <div class="row">

            <div class="col-md-6">
                <input type="text" class="form-control student-text" placeholder="Hostel Name">   
                <input type="text" class="form-control student-text" placeholder ="Roll No" value="B180444CS">
                <input type="text" class="form-control student-text" placeholder="Name">
                <input type="text" class="form-control student-text" placeholder="Subject">
            </div>

            <div class="col-md-6">
                <textarea class="form-control student-text-area" id="exampleFormControlTextarea1" rows="6" placeholder="Message..."></textarea>
                
            </div>
            <div class="col-md-5" style="padding-left: 540px;">
            <button type="submit" name="contact-button"  class="btn-lg btn-primary" style="margin-top:10px;">Submit</button>
            </div>
        </div>
    </form>

</div>

<?php include('student-footer.php');