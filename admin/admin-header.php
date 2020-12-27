<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<?php require 'config.inc.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Hotels a Hotels Category Responsive Web Template | Home : W3layouts</title>

    <link href="assets/css/student-font.css" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link rel="stylesheet" href="assets/css/styles-nav.css">
  </head>
  <body>
    <div style = "height: 75px;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
              <!-- <img src="/images/logo.svg" class="img-logo">
              <a class="navbar-brand brand" href="#">OLYMPICS DATABASE</a> -->
              <a href="home.php" class="navbar-brand brand"><img src="assets/images/nitc-logo.jpg" class = "logo-image" style="height: 50px;">HOSTEL MANAGEMENT</a>
              <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="appoint.php">Appoint Hostel Managers</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="remove.php"> Remove Hostel Managers</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="students.php">Students</a>
                </li>
                <li class="dropdown nav-item">
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Account<!-- <?php echo $_SESSION['roll']; ?> --->
                    <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu agile_short_dropdown">
                    <li>
                      <a href="profile.php">My Profile</a>
                    </li>
                    <li>
                      <a href="logout.inc.php">Logout</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </div>
<!-- //w3l-header -->
