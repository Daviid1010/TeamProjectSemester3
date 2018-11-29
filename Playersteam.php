<?php include 'connection.php'?>
<?php
/**
 * Created by PhpStorm.
 * User: Davy Sheehy
 * Date: 29/11/2018
 * Time: 10:33
 */


function displayUserTeam() {

}
$teamID = 1;

$query = "SELECT playerName, PlayerPosition, Province, Rating FROM team_rosters JOIN players ON players.PlayerID = team_rosters.PlayerID WHERE team_rosters.TeamID=$teamID";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($playerName, $PlayerPosition, $Province, $Rating);

    echo "<table class=\"table table-hover\">
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
                    <td>$playerName</td>
                    <td>$PlayerPosition</td>
                    <td>$Province</td>
                    <td>$Rating</td>
                </tr>";
    }
    echo "</tbody></table>";
    $stmt->close();
}



?>