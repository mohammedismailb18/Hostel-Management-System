<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<?php
 require '../backend/db-connect.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Hostel-Management-System</title>

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
              <a href="index.php" class="navbar-brand brand"><img src="assets/images/nitc-logo.jpg" class = "logo-image" style="height: 50px;">HOSTEL MANAGEMENT</a> 
              <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="room-allocation.php">Room Allocation</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="hm-messages.php">Messages</a>
                </li>
                <li class="dropdown nav-item">
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Rooms
                    <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu agile_short_dropdown">
                    <li>
                      <a href="alloted-rooms.php">Allocated Rooms</a>
               
                    </li>
                    <li>
                      <a href="empty-rooms.php">Empty Rooms</a>
                    </li>
                    <li>
                      <a href="vacate-room.php">Vacate Rooms</a>
                    </li>
                  </ul>
                </li>
                <li class="dropdown nav-item">
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['username']; ?> 
                    <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu agile_short_dropdown">
                    <li>
                      <a href="profile.php">My Profile</a>
                    </li>
                    <li>
                      <a href="../backend/logout-hm.php">Logout</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </div>
<!-- //w3l-header -->