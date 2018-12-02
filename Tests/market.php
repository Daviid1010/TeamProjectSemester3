<!DOCTYPE html>
<html>
<head>
    <title>Fantasy Rugby</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<div class="navbar-static-top navbar-inverse" id="home">
    <div class="container">
        <div class="navbar-brand">
            Market
        </div>
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
            Menu
        </button>
        <div class="collapse navbar-collapse navHeaderCollapse">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#">Home</a></li>
                <li><a href="#">Team</a></li>
                <li><a href="#">Market</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="jumbotron">
    <div class="container">
        <h1>Player Market</h1>
    </div>
</div>

<div class="col-md-12">
<?php include 'search.php'?>
</div>
</body>