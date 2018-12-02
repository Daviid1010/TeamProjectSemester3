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
        <a class="navbar-brand" href="#">
            <img id="brand-image" src="../images/rugbylogo.png" alt="Irish Fantasy Rugby">
        </a>
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
<div class="container">
    <div class="jumbotron">
        <div class="container">
            <h1>Player Market</h1>
        </div>
    </div>

    <div class="col-md-12">
        <form method='post' action='search.php'>
            <label>Search by Name:  </label><input type='text' name='name' />
            <label> or Province:  </label><input type='text' name='province'/>
            <label> or Position:  </label><input type='text' name='position' />
            <input id="submitBtn" type='submit' value='Submit' name='submit'>
        </form>

        <?php
        /**
         * Created by PhpStorm.
         * User: Davy Sheehy
         * Date: 02/12/2018
         * Time: 12:27
         *
         *
         */

        include '../connection.php';
        if(isset($_POST['submit'])){
            $playerName =  $_POST['name'];
            $province = $_POST['province'];
            $position = $_POST['position'];



            $search = "SELECT PlayerName, PlayerPosition, Province, Rating FROM players";


            //checks if any of the feilds have been filled
            if($playerName!=null || $position!=null || $province!=null) {
                $search .= " WHERE ";

                //if player name is not empty and if the twn other are empty
                if( $playerName!=null && $province==null && $position==null ){
                    $search .= "PlayerName=\"$playerName\"";
                } else if ($playerName!=null) {
                    $search .= "PlayerName=\"$playerName\" AND ";
                }

                //now checking if province is empty and also position
                if( $province!=null && $position==null) {
                    $search .= "Province=\"$province\"";
                } else if ($province!=null) {
                    $search .= "Province=\"$province\" AND ";
                }

                //finally check to see if postion is full
                if ($position!=null) {
                    $search .= "PlayerPosition=\"$position\"";
                }

            }

            $search .= " ORDER BY  Rating DESC";


            if ($stmt = $con->prepare($search)) {
                $stmt->execute();
                $stmt->bind_result($PlayerName, $PlayerPosition, $Province, $Rating);
                echo "<table class=\"table table-hover\">
                <thead>
                <tr>
                    <th scope=\"col\">Name</th>
                    <th scope=\"col\">Position</th>
                    <th scope=\"col\">Province</th>
                    <th scope=\"col\">Rating</th>
                    <th scope='col'>Buy</th>

                </tr>
                </thead>
                <tbody>";

                while ($stmt->fetch()) {
                    echo "<tr>
                    <td>$PlayerName</td>
                    <td>$PlayerPosition</td>
                    <td>$Province</td>
                    <td>$Rating</td>
                    <td><button type=\"button\" class=\"btn btn-success\">Buy Now</button></td>
                </tr>";
                }
                echo "</tbody></table>";
                $stmt->close();
            }
            else {
                echo "<p>No results found.</p>";
            }
        } ?>
    </div>
</div>



</body>