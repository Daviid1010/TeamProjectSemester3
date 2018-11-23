<?php
session_start();

// initializing variables
$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="password";
$dbname="fantasy_rugby";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', 'password', 'fantasy_rugby');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    //input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    //$email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $team = mysqli_real_escape_string($db, $_POST['team']);

    // validate count errors
    if (empty($username)) { array_push($errors, "Username is required"); }
    //if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        //if ($user['email'] === $email) {
          //  array_push($errors, "email already exists");
        //}
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database


        $queryteam = "INSERT INTO teams (TeamName) VALUES ('$team') ";
        $queryteam2 = "SELECT TeamID FROM teams WHERE TeamName='$team'";

        mysqli_query($db, $queryteam);


        $teamres =  mysqli_query($db, $queryteam2);
        $teamID = mysqli_fetch_assoc($teamres)['TeamID'];
        echo mysqli_fetch_assoc($teamres)['TeamID'];

        $query = "INSERT INTO users (username, pword, score, TeamID) 
  			  VALUES('$username', '$password',100, $teamID)";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
?>
