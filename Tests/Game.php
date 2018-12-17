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

echo "<div id='tables' style='width: 100%; height: 500px; float: left; background-color: #1c7430; color: white;'>";

if ($stmt1 = $con->prepare($query1)) {
    $stmt1->execute();
    $stmt1->bind_result($TeamPosition, $PlayerName, $PlayerPosition, $Province, $Rating);

    echo "<div id='table1' style='width: 50%; float: left;'>
                <h2 style='float: left; width: 100%'>Your Team</h2>
                <table class=\"table table-hover\" style='float: left; color: white;'>
                <thead>
                <tr>
                    <th scope=\"col\">Number</th>
                    <th scope=\"col\" width='150'>Name</th>
                    <th scope=\"col\" width='120'>Position</th>
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
    echo "</tbody></table></div>";
    $stmt1->close();
}

$avg1 = $sum1 / $count1;

echo "Average Rating: " . $avg1;



$query2 = "SELECT team_rosters.TeamPosition, PlayerName, PlayerPosition, Province, Rating FROM team_rosters JOIN players ON players.PlayerID = team_rosters.PlayerID WHERE team_rosters.TeamID=2 AND OnTeam=1 ORDER BY team_rosters.TeamPosition ASC";

$avg2 = 0;
$count2 = 1;
$sum2 = 0;


if ($stmt2 = $con->prepare($query2)) {
    $stmt2->execute();
    $stmt2->bind_result($TeamPosition, $PlayerName, $PlayerPosition, $Province, $Rating);

    echo "<div id='table2' style='width: 50%; float: left;'>
                <h2 style='float: left; width: 100%;'>Opponent</h2>
                <table class=\"table table-hover\" style='float: left; color: white;'>
                <thead>
                <tr>
                    <th scope=\"col\">Number</th>
                    <th scope=\"col\" width='150'>Name</th>
                    <th scope=\"col\" width='120'>Position</th>
                    <th scope=\"col\">Province</th>
                    <th scope=\"col\">Rating</th>

                </tr>
                </thead>
                <tbody>";

    while ($stmt2->fetch()) {
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
    echo "</tbody></table></div>";
    $stmt2->close();
}

echo "</div>";
$avg2 = $sum2 / $count2;

echo "Average Rating: " . $avg2;
?>

<button onclick="playNow()" style="float: left; height: 100px; width: 200px;" >play now</button>


<h2 id="team1"></h2>
<h2 id="team2"></h2>

<h1 id = "result"></h1>

<script>

    function playNow() {
        var a1 = <?php echo $avg1 ?>;
        var a2 = <?php echo $avg2 ?>;

        var randomNum =  Math.floor((Math.random() * 6) + 1);
        var t1 = a1 + (randomNum * 40);
        document.getElementById("team1").innerHTML = "team 1: " + Math.round(t1/10);

        randomNum = Math.floor((Math.random() * 6) + 1);
        var t2 = a2 + (randomNum * 40);
        document.getElementById("team2").innerHTML = "team 2: " + Math.round(t2/10);

        if(t1 > t2) {
            document.getElementById("result").innerHTML ="team 1 wins";
        } else if (t2 > t1) {
            document.getElementById("result").innerHTML ="team 2 wins";
        } else if (Math.round(t2/10) == Math.round(t1/10)) {
            document.getElementById("result").innerHTML ="draw";
        } else {
            document.getElementById("result").innerHTML ="error in calculation";
        }
    }



</script>


