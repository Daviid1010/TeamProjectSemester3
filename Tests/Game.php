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

    echo "<div id='table1' style='width: 50%; float: left; padding: 10px;'>
                <h2 style='float: left; width: 100%'>Your Team</h2>
                <table class=\"table table-hover\" style='float: left; color: white; font-size: .8em'>
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

    $stmt1->close();

    $avg1 = $sum1 / $count1;
    echo "<p>Average Rating: " . round($avg1). "</p>";
    echo "</tbody></table></div>";
}







$query2 = "SELECT team_rosters.TeamPosition, PlayerName, PlayerPosition, Province, Rating FROM team_rosters JOIN players ON players.PlayerID = team_rosters.PlayerID WHERE team_rosters.TeamID=5 AND OnTeam=1 ORDER BY team_rosters.TeamPosition ASC";

$avg2 = 0;
$count2 = 1;
$sum2 = 0;


if ($stmt2 = $con->prepare($query2)) {
    $stmt2->execute();
    $stmt2->bind_result($TeamPosition, $PlayerName, $PlayerPosition, $Province, $Rating);

    echo "<div id='table2' style='width: 50%; float: left; padding: 10px;'>
                <h2 style='float: left; width: 100%;'>Opponent</h2>
                <table class=\"table table-hover\" style='float: left; color: white; font-size: .8em'>
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

    $stmt2->close();
    $avg2 = $sum2 / $count2;
    echo "<p>Average Rating: " . round($avg2) . "</p>";
    echo "</tbody></table></div>";
}

$mResult = 0;
$oResult = 0;


?>
<h1 id = "result"></h1>
<div style="width: 100%; height: 300px; text-align: center; float: left;">
    <button id="#PlayNow" onclick="playNow()" style="float: left; height: 100%; width: 40%; margin: 0 auto; display: block; color: white; border: 1px white solid; background-color: #1c7430; font-size: 3em; font-weight: bold;" >play now</button>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="width: 60%; height: 100%; float: left; padding: 20px;">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label style="float: left; width: 100%; text-align: left;">Your Score    </label>
            <input type="Number" name="mScore" class="form-control" value="<?php echo $mResult; ?>" style="width: 20%;" id="mResult">
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" >
            <label style="float: left; width: 100%; text-align: left;">Opponents Score</label>
            <input type="number" name="oScore" class="form-control" style="width: 20%;" value="<?php echo $oResult;?>" id="oResult">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit Your Result!" id="GameSubmit" style="float: left;">
        </div>
    </form>
</div>





<h2 id="team1"></h2>
<h2 id="team2"></h2>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
/*
    $(document).ready(function(){
        $('#PlayNow').click(function(){
            var mResult = $('#mResult').val();
            var oResult = $('#oResult').val();
            var url = 'Game.php',
                data =  {'mResult': mResult,
                'oResult': oResult};
            $.post(url, data, function (response) {
                // Response div goes here.
                alert("action performed successfully");
            });
        });

    });
*/
    function playNow() {

        var a1 = <?php echo $avg1 ?>;
        var a2 = <?php echo $avg2 ?>;

        var randomNum =  Math.floor((Math.random() * 6) + 1);
        var t1 = a1 + (randomNum * 40);
        document.getElementById("mResult").value = Math.round(t1/10);

        randomNum = Math.floor((Math.random() * 6) + 1);
        var t2 = a2 + (randomNum * 40);
        document.getElementById("oResult").value =  + Math.round(t2/10);

        if(t1 > t2) {
            document.getElementById("result").innerHTML ="Your Team Won!";
        } else if (t2 > t1) {
            document.getElementById("result").innerHTML ="Opponent Wins!";
        } else if (Math.round(t2/10) == Math.round(t1/10)) {
            document.getElementById("result").innerHTML ="draw";
        } else {
            document.getElementById("result").innerHTML ="error in calculation";
        }
        document.getElementById("#PlayNow").style.display = "none";
    }



</script>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $mResult = trim($_POST["mScore"]);
    $oResult = trim($_POST["oScore"]);

    if($mResult>$oResult) {
        $updateLeague = "UPDATE league_tables SET wins= wins +1, points = points +3 WHERE TeamID=1";

        mysqli_query($con, $updateLeague);
        header("location: ../index.php");
    } else {
        header("location: ../index.php");
    }






}



?>


