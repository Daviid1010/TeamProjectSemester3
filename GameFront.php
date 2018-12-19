<?php
/**
 * Created by PhpStorm.
 * User: x16440304
 * Date: 19/12/2018
 * Time: 10:44
 */
include "connection.php";




?>
<?php include 'connection.php' ;
session_start();
$teamID = 1;//$_SESSION["teamID"];
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
        <img id="brand-image" src="images/rugbylogo.png" alt="Italian Trulli">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="team.php">Team</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="market.php">Market</a>
            </li>

        </ul>
    </div>
</nav>

<br>

<div class="row">
    <div class="col-lg-2 col-md-12  third" id="account">
        <div id="accountinfo"  align="center">
            <img src="images/davy.jpg" class="img-fluid rounded-circle">
            <h2>Player</h2>
            <br>
            <h2>TeamID</h2>
            <h3><?php echo $teamID;?></h3>
            <br>
            <h2>Losses</h2>
            <h3>4</h3>
            <br>
            <h2>Points</h2>
            <h3>615</h3>

            <div id="play">
                Play Now
            </div>
        </div>

    </div>
    <div class="col-lg-10 col-md-12 players third" id="Game">
        <?php include "Tests/Game.php"?>
    </div>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>
