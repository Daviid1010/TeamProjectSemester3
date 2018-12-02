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

echo "<form method='post' action='search.php'>";
echo "<label>Search by Name: </label><input type='text' name='name' />";
echo "<label> or Province: </label><select name='province'>
<option value='Munster'>Munster</option>
<option value='Leinster'>Leinster</option>
<option value='Ulster'>Ulster</option>
<option value='Connacht'>Connacht</option>
</select>";
echo "<label> or Position: </label><input type='text' name='position' />";
echo "<input type='submit' value='Submit' name='submit'>";
echo "</form>";


if(isset($_POST['submit'])){
    $playerName =  $_POST['name'];
    $province = $_POST['province'];
    $position = $_POST['position'];

    $search = "SELECT PlayerName, PlayerPosition, Province, Rating FROM players WHERE  PlayerName='$playerName' AND Province='$province' AND PlayerPosition='$position'";
/*
    if($playerName!=null) {
        $search = "SELECT PlayerName, PlayerPosition, Province, Rating FROM players WHERE PlayerName='$playerName'";
        if ($province!=null) {
            $search = "SELECT PlayerName, PlayerPosition, Province, Rating FROM players WHERE PlayerName='$playerName' AND Province='$province'";
            if($position!=null) {
                $search = $search = "SELECT PlayerName, PlayerPosition, Province, Rating FROM players WHERE PlayerName='$playerName' AND Province='$province' AND PlayerPosition='$position'";
            }
        }
    }
    else if($province!=null) {
        $search = "SELECT PlayerName, PlayerPosition, Province, Rating FROM players WHERE Province='$province'";
    }
    else if($position!=null) {
        $search ="SELECT PlayerName, PlayerPosition, Province, Rating FROM players WHERE PlayerPosition='$position'";
    }
*/

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
}

