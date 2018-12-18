<?php
/**
 * Created by PhpStorm.
 * User: Davy Sheehy
 * Date: 18/12/2018
 * Time: 12:53
 */

$query = "SELECT  teams.teamName, points, wins, losses  FROM league_tables JOIN teams ON teams.TeamID =  league_tables.TeamID WHERE LeagueID = 1 ORDER BY league_tables.points DESC";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($TeamName, $Points, $Wins, $Losses);

    echo "<table class=\"table table-hover\" id='roster' style='font-size: 1em;'>
                <thead>
                <tr>
                    <th scope=\"col\">Team</th>
                    <th scope=\"col\">Points</th>
                    <th scope=\"col\">Wins</th>
                    <th scope=\"col\">Losses</th>

                </tr>
                </thead>
                <tbody>";

    while ($stmt->fetch()) {
        echo "<tr>
                    <th>$TeamName</th>
                    <td>$Points</td>
                    <td>$Wins</td>
                    <td>$Losses</td>
                </tr>";
    }
    echo "</tbody></table>";
    $stmt->close();
}
