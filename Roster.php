<?php
/**
 * Created by PhpStorm.
 * User: Davy Sheehy
 * Date: 18/12/2018
 * Time: 17:18
 */
include "connection.php";

$teamID = 1;//$_SESSION["teamID"];

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
                    <th scope='col'>Change</th>

                </tr>
                </thead>
                <tbody>";

    while ($stmt->fetch()) {
        echo "<tr>
                    <td>$PlayerName</td>
                    <td>$PlayerPosition</td>
                    <td>$Province</td>
                    <td>$Rating</td>
                    <td><button onclick='#' style='color: white; background-color: #1e7e34'>Put on Team</button></td>
                </tr>";
    }
    echo "</tbody></table>";
    $stmt->close();
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $("#rosterTable tr").click(function () {
        $(this).addClass('selected').siblings().removeClass('selected');
        var value=$(this).find('td:first').html();
        //alert(value);
        var playerPos =  prompt($("#rosterTable tr.selected td:first").html() + " into which position on team?");


        var playerNumQ =  "SELECT PlayerID FROM players WHERE PlayerName=\""+$("#rosterTable tr.selected td:first").html()+"\"";
        //alert(playerNumQ);

        $.ajax ({
            type: "POST",
            url:"UpdateTeamRoster.php",
            data: "playerNumQ=value",
            success: function() {
                console.log("message sent!");
            }
        });


    });
</script>
