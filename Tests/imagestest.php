<?php
/**
 * Created by PhpStorm.
 * User: Davy Sheehy
 * Date: 18/12/2018
 * Time: 11:58
 */

//include '../connection.php';
$teamID = 5;
$filepathArr = array();

$query = "SELECT ImageFilePath FROM team_rosters JOIN players ON players.PlayerID = team_rosters.PlayerID WHERE team_rosters.TeamID=$teamID AND OnTeam=1 ORDER BY team_rosters.TeamPosition ASC";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($filepath);

    while ($stmt->fetch()) {
        array_push($filepathArr, $filepath);
    }
    $stmt->close();
    /*
    for($x = 0; $x < count($filepathArr); $x++) {
        echo $filepathArr[$x];
        echo "<br>";
    }*/
}
?>