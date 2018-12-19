<?php
/**
 * Created by PhpStorm.
 * User: Davy Sheehy
 * Date: 18/12/2018
 * Time: 17:18
 */
include "connection.php";

$teamID = $_SESSION["teamID"];

$query = "SELECT team_rosters.TeamPosition, PlayerName, PlayerPosition, Province, Rating FROM team_rosters JOIN players ON players.PlayerID = team_rosters.PlayerID WHERE team_rosters.TeamID=$teamID AND OnTeam=0 ORDER BY team_rosters.TeamPosition ASC";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($TeamPosition, $PlayerName, $PlayerPosition, $Province, $Rating);

    echo "<table class=\"table table-hover\" style='font-size:1em;' id='rosterTable'>
                <thead>
                <tr>
                    <th scope=\"col\">Name</th>
                    <th scope=\"col\">Position</th>
                    <th scope=\"col\">Province</th>
                    <th scope=\"col\">Rating</th>
                </tr>
                </thead>
                <tbody>";

    while ($stmt->fetch()) {
        echo "<tr>
                    <td>$PlayerName</td>
                    <td>$PlayerPosition</td>
                    <td>$Province</td>
                    <td>$Rating</td>
                </tr>";
    }
    echo "</tbody></table>";
    $stmt->close();
}


$playerNameNew = "";
$playerNum = 0;
$PlayerIDNew = 0;
$PlayerNameNew = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty(trim($_POST["PlayerNameNew"]))){
        echo "no name in input, please enter a name!";
    } else{
        $playerNameNew = trim($_POST["PlayerNameNew"]);
    }

    if(empty(trim($_POST["PlayerNum"]))){
        echo "Please enter the Number you want to put your player into the team";
    } else{
        $playerNumNew = $_POST["PlayerNum"];
    }

//checks if player is on the roster
    $CheckRosterQuery = "SELECT PlayerName, team_rosters.PlayerID
FROM team_rosters JOIN players
ON players.PlayerID = team_rosters.PlayerID
WHERE team_rosters.TeamID=".$teamID." AND players.PlayerName=\"$playerNameNew\"";

if ($stmt = $con->prepare($CheckRosterQuery)) {
    $stmt->execute();
    $stmt->bind_result( $PlayerName, $PlayerID);

    while($stmt->fetch()) {
        if($PlayerName == $PlayerNameNew) {
            $playerNameNew = $PlayerName;
            break;
        }

    }
}

    include 'connection.php';
    //remove old player
    $removeOldPLayer = "UPDATE team_rosters SET TeamPosition = 0, OnTeam=0   WHERE TeamPosition=$playerNumNew";
    //echo "$removeOldPLayer<br>";
    mysqli_query($conn, $removeOldPLayer);

    //get new players id
        $getNewPlayersName = "SELECT PlayerID, PlayerName FROM players WHERE PlayerName=\"$playerNameNew\"";
        if ($stmt = $con->prepare($getNewPlayersName)) {
            $stmt->execute();
            $stmt->bind_result($PlayerID, $PlayerName);

            while ($stmt->fetch()) {
                $PlayerIDNew = $PlayerID;

            }



        }

    $addPlayerQuery = "UPDATE team_rosters SET TeamPosition=$playerNumNew, OnTeam=1 WHERE TeamID=$teamID AND PlayerID=$PlayerIDNew";
    echo "$addPlayerQuery";
    mysqli_query($conn, $addPlayerQuery);

   header("location: team.php");

    }


?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group input-group input-group-sm" style="height: 40px;">
        <label>Player</label>
        <input type="text" name="PlayerNameNew" class="form-control" value="<?php echo $playerNameNew; ?>">
    </div>
    <div class="form-group input-group input-group-sm" style="height: 40px">
        <label>Number to Replace on Team</label>
        <input type="number" name="PlayerNum" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Add Player to Team">
    </div>
</form>