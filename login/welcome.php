<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
<div class="navbar-static-top navbar-inverse" id="home">
    <div class="container">
        <div class="navbar-brand">
            My Site
        </div>
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
            Menu
        </button>
        <div class="collapse navbar-collapse navHeaderCollapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Home</a></li>
                <li><a href="#a">Team</a></li>
                <li><a href="#">Market</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="page-header">
    <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Fantasy Rugby.</h1>
</div>
<p>
    <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
    <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
</p>
</body>
</html>