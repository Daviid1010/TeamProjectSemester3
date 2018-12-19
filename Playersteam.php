<?php include 'connection.php'; ?>
<?php
/**
 * Created by PhpStorm.
 * User: Davy Sheehy
 * Date: 29/11/2018
 * Time: 10:33
 */
$teamID = $_SESSION['teamID'];

$query = "SELECT team_rosters.TeamPosition, PlayerName, PlayerPosition, Province, Rating FROM team_rosters JOIN players ON players.PlayerID = team_rosters.PlayerID WHERE team_rosters.TeamID=$teamID AND OnTeam=1 ORDER BY team_rosters.TeamPosition ASC";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($TeamPosition, $PlayerName, $PlayerPosition, $Province, $Rating);

    echo "<table class=\"table table-hover\" style='font-size:1em;'>
                <thead>
                <tr>
                    <th scope=\"col\">Name</th>
                    <th scope=\"col\">Position</th>
                    <th scope=\"col\">Province</th>
                    <th scope=\"col\">Rating</th>

                </tr>
                </thead>
                <tbody id='currentTeam'>";

    while ($stmt->fetch()) {
        echo "<tr>
                    <th>$TeamPosition</th>
                    <td>$PlayerName</td>
                    <td>$Province</td>
                    <td>$Rating</td>
                </tr>";
    }
    echo "</tbody></table>";
    $stmt->close();
}



?>