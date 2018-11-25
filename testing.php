<?php
/**
 * Created by PhpStorm.
 * User: Davy Sheehy
 * Date: 22/11/2018
 * Time: 11:04
 */

echo "<h1>Hello World</h1>";

$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="password";
$dbname="fantasy_rugby";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());



if ($con->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}
echo "Connected successfully";

$sql = "SELECT team_rosters.PlayerID, PlayerName, Province FROM players JOIN team_rosters ON team_rosters.PlayerID = players.PlayerID WHERE team_rosters.TeamID=1;";
$usersql = "SELECT username, score, t.TeamName FROM users JOIN teams t on users.TeamID = t.TeamID WHERE users.username='David'";
$result = mysqli_query($con, $sql);
$userResult = mysqli_query($con, $usersql);

if ($result === false) {
    printf(mysqli_error($con));
}
/*
if (mysqli_num_rows($result) > 0) {

    echo "<table>
            
            <tr>
                <th>Name</th>
                <th>Province</th>
            </tr>
";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><th>" . $row["PlayerName"]. "</th><th>" . $row["Province"]. "</th></tr>";
    }
} else {
    echo "0 results";
}

echo "</table>";

*/


if ($userResult === false) {
    printf(mysqli_error($con));
}

if (mysqli_num_rows($userResult) > 0) {
    echo "<table>
                <tr>
                <th>Username</th>
                <th>Score</th>
                <th>Team Name</th>
                </tr>";

    while ($row = mysqli_fetch_assoc($userResult)) {
        echo "<tr><th>". $row["username"]. "</th><th>" . $row["score"]. "</th><th>" .$row["TeamName"]."</th></tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

$con->close();

?>

