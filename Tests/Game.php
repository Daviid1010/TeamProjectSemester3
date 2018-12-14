<?php include  '../connection.php'?>
<?php
/**
 * Created by PhpStorm.
 * User: Davy Sheehy
 * Date: 14/12/2018
 * Time: 20:22
 */

//team1
$query1 = "SELECT team_rosters.TeamPosition, PlayerName, PlayerPosition, Province, Rating FROM team_rosters JOIN players ON players.PlayerID = team_rosters.PlayerID WHERE team_rosters.TeamID=1 AND OnTeam=1 ORDER BY team_rosters.TeamPosition ASC";
$avg1= 0;
$count1 = 1;
$sum1 = 0;

if ($stmt1 = $con->prepare($query1)) {
    $stmt1->execute();
    $stmt1->bind_result($TeamPosition, $PlayerName, $PlayerPosition, $Province, $Rating);

    echo "<table class=\"table table-hover\">
                <thead>
                <tr>
                    <th scope=\"col\">Number</th>
                    <th scope=\"col\">Name</th>
                    <th scope=\"col\">Position</th>
                    <th scope=\"col\">Province</th>
                    <th scope=\"col\">Rating</th>

                </tr>
                </thead>
                <tbody>";
    while ($stmt1->fetch()) {
        //printf("%s, %s, %s, %s, %s\n", $TeamPosition, $PlayerName, $PlayerPosition, $Province, $Rating);
        echo "<tr>
                    <th>$TeamPosition</th>
                    <td>$PlayerName</td>
                    <td>$PlayerPosition</td>
                    <td>$Province</td>
                    <td>$Rating</td>
                </tr>";
        $sum1 += $Rating;
        $count1 ++;

    }
    echo "</tbody></table>";
    $stmt1->close();
}

$avg1 = $sum1 / $count1;

//echo "Average Rating: " . $avg1;


echo "<h2>Opponent</h2>";

$query2 = "SELECT team_rosters.TeamPosition, PlayerName, PlayerPosition, Province, Rating FROM team_rosters JOIN players ON players.PlayerID = team_rosters.PlayerID WHERE team_rosters.TeamID=2 AND OnTeam=1 ORDER BY team_rosters.TeamPosition ASC";

$avg2 = 0;
$count2 = 1;
$sum2 = 0;


if ($stmt2 = $con->prepare($query2)) {
    $stmt2->execute();
    $stmt2->bind_result($TeamPosition, $PlayerName, $PlayerPosition, $Province, $Rating);

    echo "<table class=\"table table-hover\">
                <thead>
                <tr>
                    <th scope=\"col\">Number</th>
                    <th scope=\"col\">Name</th>
                    <th scope=\"col\">Position</th>
                    <th scope=\"col\">Province</th>
                    <th scope=\"col\">Rating</th>

                </tr>
                </thead>
                <tbody>";

    while ($stmt2->fetch()) {
        //printf("%s, %s, %s, %s, %s\n", $TeamPosition, $PlayerName, $PlayerPosition, $Province, $Rating);
        echo "<tr>
                    <th>$TeamPosition</th>
                    <td>$PlayerName</td>
                    <td>$PlayerPosition</td>
                    <td>$Province</td>
                    <td>$Rating</td>
                </tr>";

        $sum2 += $Rating;
        $count2 ++;
    }
    echo "</tbody></table>";
    $stmt2->close();
}

$avg2 = $sum2 / $count2;

//echo "Average Rating: " . $avg2;
?>

<script>
    var a1 = <?php echo $avg1 ?>;
    var a2 = <?php echo $avg2 ?>;

    var randomNum =  Math.floor((Math.random() * 6) + 1);
    var t1 = a1 + (randomNum * 40);
    document.write("<p>team 1: " + Math.round(t1/10)  + "</p><br>");

    randomNum = Math.floor((Math.random() * 6) + 1);
    var t2 = a2 + (randomNum * 40);
    document.write("<p>team 2: " + Math.round(t2/10)  + "</p><br>");

    if(t1 > t2) {
        document.write("team 1 wins");
    } else if (t2 > t1) {
        document.write("team 2 wins");
    } else if (t2 == t1) {
        document.write("result is a draw");
    } else {
        document.write("error in calculation");
    }
</script>


