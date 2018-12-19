<?php include 'connection.php' ;
session_start();
$teamID = $_SESSION["teamID"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Irish Fantasy Rugby</title>
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/bootstrap-grid.css"/>
    <link rel="stylesheet" href="css/bootstrap-reboot.css"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
  <a class="navbar-brand" href="#">
      <img id="brand-image" src="images/rugbylogo.png" alt="Irish Fantasy Rugby">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="team.php">Team</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="GameFront.php">Play Now</a>
      </li>
        <li class="nav-item">
            <a class="nav-link" href="Market.php">Market</a>
        </li>
    </ul>
  </div>
</nav>

<br>

    <div class="row">
        <div class="col-lg-2 col-md-12  third" id="account">
            <div id="accountinfo"  align="center">
                <h2>Welcome <?php echo $_SESSION['username']?></h2>
            </div>

        </div>
        <div class="col-lg-5 col-md-12 players third" id="League">
            <?php include "Tests/League.php"?>
        </div>

        <div class="col-lg-5 col-md-12 players third" id="backs">
            <?php include 'Tests/twittertest.php'?>
        </div>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>