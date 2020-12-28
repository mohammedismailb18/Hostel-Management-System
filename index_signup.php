
<!DOCTYPE html>

<head>
    <title>HMS - Student SignUp</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Flat lay login form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <!-- CSS and Bootsrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="web/css/sign-up.css">
</head>

<body>
    <div class="bg-opacity">
        <div class="content container">

        <form action="student_backend/signup.inc.php" method="post" class="signup-form">
        <div class="row">

            <div class="col-md-8">
            <input type="text" name="username" class="form-control student-text" placeholder="Roll No">
                <input type="text" name="f_name" class="form-control student-text" placeholder="First Name">
                <input type="text" name="l_name" class="form-control student-text" placeholder="Last Name">

                <select class="custom-select student-text" style="margin-top: -1px;" name="gender">
                    <option selected>Gender</option>
                    <option value="1">Male</option>
                    <option value="0">Female</option>
                </select>

                <select class="custom-select student-text" name="year" style="margin-top: -1px;">
                    <option selected>Year of study</option>
                    <option value="1">1st year</option>
                    <option value="2">2nd year</option>
                    <option value="3">3rd year</option>
                    <option value="4">4th year</option>
                </select>

                <select class="custom-select student-text" name="dept" style="margin-top: -1px;">
                    <option selected>Department</option>
                    <option value="CSE">CSE</option>
                    <option value="ECE">ECE</option>
                    <option value="EEE">EEE</option>
                    <option value="ME">ME</option>
                    <option value="EP">EP</option>
                    <option value="CE">CE</option>
                </select>
                <input type="text" name="mobile" class="form-control student-text" placeholder="Mobile" style="margin-top: -1px;">
                <input type="password" name="password" class="form-control student-text" placeholder="Password">
                <input type="password" name="confpassword" class="form-control student-text" placeholder=" Re-enter Password">
            </div>
            <div class="col-md-10" style="padding-left: 540px;">
            <button type="submit" name="signup-student"  class="btn-lg btn-primary" style="margin-top:10px;">Submit</button>
            </div>
        </div>
    </form>

        </div>
    </div>
    <!-------------- Login Form ----------------------------------------------->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
