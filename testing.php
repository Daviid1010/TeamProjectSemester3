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
$result = mysqli_query($con, $sql);

if ($result === false) {
    printf(mysqli_error($con));
}



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

$con->close();

?>

