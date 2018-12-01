<?php
/**
 * Created by PhpStorm.
 * User: Davy Sheehy
 * Date: 25/11/2018
 * Time: 09:46
 */

//Creates a connection to your local database
$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="password";
$dbname="fantasy_rugby";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

$db = mysqli_connect('localhost', 'root', 'password', 'fantasy_rugby');

//With these parameters, this code creates a team with the Name Carrick, and  user with name David and a password 'password'
$username = "David";
$password = "password";
$team='Carrick';
//CHANGE THESE WHEN TESTING SO THERES NO DUPLICATE DATA!!!!!!!!


//this section checks if the team name is already taken, no if statement add that at the bottom brian I think you have it for username already
$team_check_query = "SELECT TeamName FROM teams WHERE TeamName='$team'";
$teamcheck = mysqli_query($db, $team_check_query);
$teamcheckstring = mysqli_fetch_assoc($teamcheck);

//this query inserts the team into the teams table of the database
$queryteam = "INSERT INTO teams (TeamName) VALUES ('$team') ";
mysqli_query($db, $queryteam);

//return that teams id in teams entity for use in inserting new user into users table
$queryteam2 = "SELECT TeamID FROM teams WHERE TeamName='$team'";
$teamres =  mysqli_query($db, $queryteam2);
$teamID = mysqli_fetch_assoc($teamres)['TeamID'];
echo $teamID;


//this query inserts a new user with the correct teamID foreign key gotten from the lines of code above
$query = "INSERT INTO users (username, pword, score, TeamID)
  			  VALUES('$username', '$password',100, $teamID)";
mysqli_query($db, $query);
//!!!! if you try to query this to check thats when you get the 502 error, but I checked the data through mysql workbench its all inserted perfectly !!!!!
?>