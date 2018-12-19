
/**
 * Created by PhpStorm.
 * User: Keith
 * Date: 18/12/2018
 * Time: 09:47
 */

<?php
session_start();
$database_name = "fantasy_rugby";
$con = mysqli_connect("localhost", "root", "password", $database_name);
?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/style.css" />
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <img id="brand-image" src="images/rugbylogo.png" alt="Italian Trulli">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">HOME</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="category.html">PLAY NOW <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product.html">TEAM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Market.php">MARKET</a>
                </li>

            </ul>

            <form action="search.php" method="POST">
                <div class="input-group input-group-sm">

                    <input type="text" class="form-control"  name="search" placeholder="Search">


                    <button type="submit" name="submit-search"class="btn btn-secondary btn-number">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</nav>
<section class="jumbotron">
    <div class="container-header text-center">
        <h1 class="jumbotron-heading" style="color: white">MARKET</h1>
        <h3 class="jumbotron-heading" style="color: white">BUILD THE TEAM YOU DREAMED OFF!</h3>
    </div>
</section>
</div>
<div class="container">
    <div class="row">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group input-group input-group-sm" style="float: left; height: 50px;">
                <label style="float: left; width: 100%;" >Add Player to Your Team</label>
                <input type="text" class="form-control"  name="playerName" placeholder="Player's Name" style="float: left; width: 100%; margin-bottom: 20px;">

            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add" style="float: left;">
            </div>
        </form>
    </div>
</div>
<?php
$playerName = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $playerName =  $_POST['playerName'];
    $playerPrice = 0;
    $playerID = 0;
    $userScore = 0;

    $playerSelectQ = "SELECT PlayerID from players WHERE PlayerName=\"$playerName\"";

    include 'connection.php';

    if ($stmt = $con->prepare($playerSelectQ)) {
        $stmt->execute();
        $stmt->bind_result($PlayerID);
        while ($stmt->fetch()) {
            $playerID = $PlayerID;
        }
        $stmt->close();
    }

    $username = $_SESSION['username'];

    $SelectUserPoints = "SELECT Score FROM users WHERE username=\"$username\"";

    if($stmt = $con->prepare($SelectUserPoints)) {
        $stmt->execute();
        $stmt->bind_result($Score);
        while ($stmt->fetch()) {
            $userScore = $Score;
        }
        $stmt->close();

    }


    $getPlayerPrice = "SELECT Points From players WHERE PlayerName=\"$playerName\"";



    if ($stmt = $con->prepare($getPlayerPrice)) {
        $stmt->execute();
        $stmt->bind_result($Points);
        while ($stmt->fetch()) {
            //printf("%s\n", $Points);
            $playerPrice = $Points;
        }
        $stmt->close();
    }

    if($userScore>=$playerPrice) {
        $teamID = $_SESSION['teamID'];
        $InsertTeamRoster = "INSERT INTO team_rosters (TeamID,PlayerID, games, OnTeam, TeamPosition) VALUES ($teamID,$playerID,0,0,0)";
        mysqli_query($conn, $InsertTeamRoster);
        $UpdateUserScore = "UPDATE users SET Score = Score - $playerPrice WHERE username=\"$username\"";
        mysqli_query($conn, $UpdateUserScore);
        echo "<h2>Transaction Complete, Player Add to your Roster!</h2>";
    } else {
        echo "<h2>Insufficient Funds</h2>";
    }

}
?>
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="category.html">Play Now</a></li>
                </ol>

            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase">PLAYER: David</div>
                <div class="profile-header-container">
                    <div class="profile-header-img" >
                        <img class="img-fluid rounded-circle" src="images/davy.jpg" />
                        <div class="rank-label-container">
                            <span class="label label-default rank-label">365 Points</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-light mb-4">
                <div class="card-header bg-success text-white text-uppercase"> MARKET SEARCH</div>
            </div>
            <form action="search.php" method="POST">
                <div class="input-group input-group-sm">

                    <input type="text" class="form-control"  name="search" placeholder="Search">


                    <button type="submit" name="submit-search"class="btn btn-secondary btn-number">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"> ORDER MARKET BY</div>
                <ul class="list-group category_block">
                    <li class="list-group-item"><a href="MarketPlayerName.php">PLAYER NAME</a></li>
                    <li class="list-group-item"><a href="MarketPosition.php">POSITION</a></li>
                    <li class="list-group-item"><a href="MarketProvince.php">PROVINCE</a></li>
                    <li class="list-group-item"><a href="MarketCaps.php">CAPS</a></li>
                    <li class="list-group-item"><a href="MarketPoints.php"><b>POINTS</b></a></li>
                </ul>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">SPECIAL OFFER!</div>
                <div class="card-body">
                    <img class="img-fluid" src="images/Leinster\MickKearney.png" />
                    <h5 class="card-title">Mick Kearney</h5>
                    <p class="bloc_left_price"><strike>100 Points</strike></p>
                    <b><p class="bloc_left_price">NOW 60 Points</p></b>
                    <div class="col">
                        <a href="#" class="btn btn-success btn-block">ADD</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">ORDERED BY POINTS</div>

            </div>
            <div class="row">

                <?php
                $query = "SELECT * FROM players ORDER BY Points DESC";
                $result = mysqli_query($con,$query);
                if(mysqli_num_rows($result) > 0);{

                    while ($row = mysqli_fetch_array($result)) {


                        ?>

                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card">
                                <img class="card-img-top" src="<?php echo $row["ImageFilePath"] ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title"><a href="product.html" title="View Product">Player Details</a></h4>

                                    <ul>
                                        <li><b>Name:  </b><?php echo $row["PlayerName"]; ?></li>
                                        <li><b>Position: </b><?php echo $row["PlayerPosition"]; ?></li>
                                        <li><b>Province: </b><?php echo $row["Province"]; ?></li>
                                        <li><b>Caps: </b><?php echo $row["Caps"]; ?></li>
                                        <li><b>Points: </b><?php echo $row["Points"]; ?></li>
                                    </ul>


                                    <div class="row">
                                        <div class="col">
                                            <p class="btn btn-danger btn-block">Points <?php echo $row["Points"]; ?></p>
                                        </div>
                                        <div class="col">
                                            <a href="#" class="btn btn-success btn-block">ADD</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <?php
                    }
                }
                ?>

            </div>
        </div>

    </div>
</div>

<footer class="text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-4 col-xl-3">
                <h5>About Market</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <p class="mb-0">
                    Our Market Represents All The Best Irish Rugby Players Of All Provinces. A Variety Of Senior Players Are Available For You The Manager To Craft Your Perfect Irish Rugby Team.
                </p>
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                <h5>Others links</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><a href="">TEAM MENU</a></li>
                    <li><a href="">PLAY NOW</a></li>
                </ul>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3">
                <h5>Contact</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><i class="fa fa-home mr-2"></i> Fantasy Rugby</li>
                    <li><i class="fa fa-envelope mr-2"></i> info@IrishRugby.com</li>
                    <li><i class="fa fa-phone mr-2"></i> + 33 12 14 15 16</li>
                </ul>
            </div>
            <div class="col-12 copyright mt-3">
                <p class="float-left">
                    <a href="#">Back to top</a>
                </p>
                <p class="text-right text-muted">created with <i class="fa fa-heart"></i> by Fantasy Rugby </p>
            </div>
        </div>
    </div>
</footer>