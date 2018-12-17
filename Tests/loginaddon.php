<?php
/**
 * Created by PhpStorm.
 * User: x16440304
 * Date: 17/12/2018
 * Time: 12:32
 */




//when all the authentication checks
$query = "INSERT INTO teams(TeamName) VALUES ($teamname)";


$link = mysqli_connect("localhost", "root", "password", "fantasy_rugby");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt insert query execution (adds the new team to the teams database)
$sql = $query;
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

//returns the team id of the new team and stores it in the variable $teamid to be used later
$query = "SELECT TeamID FROM teams  WHERE TeamName='$teamname'";

$teamid;

if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($TeamID);
    while ($stmt->fetch()) {
        //printf("%s\n", $TeamID);
        $teamid = $TeamID;
    }
    $stmt->close();
}

//creates a team roster for the newly created team
$team_roster_generate = "INSERT INTO team_rosters ($teamid,PlayerID, OnTeam, TeamPosition)
VALUES
(2,9,1,1),
(2,142,1,3), 
(2,27,1,2),
(2,88,1,4),
(2,21,1,5),
(2,166,1,6),
(2,102,1,7),
(2,7,1,8), 
(2,136,1,9),
(2,96,1,10),
(2,46,1,11),
(2,16,1,12),
(2,65,1,13),
(2,58,1,14),
(2,15,1,15),
(2,83,0,0), 
(2,3,0,0),
(2,154,0,0)";





$userInsert = "INSERT INTO users(username,userPassword,score,TeamID) VALUES ($username, $pword, 100, $teamID)";
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt insert query execution
$sql = $query;
if(mysqli_query($link, $userInsert)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


// Close connection

mysqli_close($link);


?>