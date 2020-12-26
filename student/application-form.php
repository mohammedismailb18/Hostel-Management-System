<?php include('student-header.php') ?>

<div class ="container application-container">

    <h2>Application Form</h2>
    <br>
    <form action="contact.php" method="post">
        <div class="row">

            <div class="col-md-6">
                <input type="text" class="form-control student-text" placeholder="Roll No" value = "B180437CS" readonly>   
                <input type="text" class="form-control student-text" placeholder ="Hostel Name" value = <?php echo $_GET['id'] ?> readonly>
            </div>

            <div class="col-md-6">
                <textarea class="form-control student-text-area" id="exampleFormControlTextarea1" rows="3" placeholder="Message..."></textarea>
                
            </div>
        </div>
        <h5 style ="margin: 20px auto 20px;">Select Room :</h5>
        <div class="row">
        <!--- Room booking set up ---------->
            
        <div class="container boxed">
                <?php for($x=100; $x<152; $x++) { ?> 
                    <input type="radio" id= <?php echo $x ?> name= "room_no" value=<?php echo $x ?>>
                    <label for=<?php echo $x ?> > <?php echo $x ?> </label>
                <?php } ?> 

                <br><br>
            </div>
        <!-------------------------------->
                <div class="col-md-5" style="padding-left: 540px; margin-bottom: 20px;">
                <button type="submit" name="contact-button"  class="btn-lg btn-primary" style="margin-top:10px;">Submit</button>
                </div>
        </div>
    </form>

</div>

<?php include('student-footer.php');