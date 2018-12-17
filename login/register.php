<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$teamName="";
$teamID = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT UserID FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    $teamName = trim($_POST["TeamName"]);

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement

            // Bind variables to the prepared statement as parameters
            //mysqli_stmt_bind_param($stmt, "ssis", $param_username, $param_password,$score, $param_teamID);

            $conn = new mysqli('localhost','root','password','fantasy_rugby');

            if($conn->connect_error) {
                die("Connection failed" . $conn->connect_error);
            }

            $sqlTeam = "INSERT INTO teams (teamName) VALUES ('".$teamName."')";
            mysqli_query($conn, $sqlTeam);

            $searchTeam = "SELECT TeamID FROM teams WHERE teamName='$teamName'";
            $teamQ = mysqli_query($conn,$searchTeam);
            $teamID= mysqli_fetch_assoc($teamQ)["TeamID"];
            echo "Team ID ". $teamID;

            $teamRosterQuery = "INSERT INTO team_rosters (TeamID,PlayerID, games, OnTeam, TeamPosition)
VALUES
($teamID,9,0,1,1), 
($teamID,142,0,1,3), 
($teamID,27,0,1,2), 
($teamID,88,0,1,4), 
($teamID,21,0,1,5),
($teamID,166,0,1,6), 
($teamID,102,0,1,7), 
($teamID,7,0,1,8), 
($teamID,136,0,1,9), 
($teamID,96,0,1,10), 
($teamID,46,0,1,11),
($teamID,16,0,1,12), 
($teamID,65,0,1,13), 
($teamID,58,0,1,14),
($teamID,15,0,1,15),
($teamID,83,0,0,0),
($teamID,3,0,0,0),
($teamID,154,0,0,0)";

            mysqli_query($conn,$teamRosterQuery);





            // Set parameters
            $param_username = "$username";
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_teamID = $teamID;
            $score = 100;
            $sql =  "INSERT INTO users (Username, UserPassword, Score, TeamID) VALUES ('".$username."', '".$param_password."', $score, $param_teamID)";
            $stmt = mysqli_prepare($link, $sql);
            echo "Username var is: ".$param_username;

            // Attempt to execute the prepared statement
            if(mysqli_query($conn,$sql)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later." . $sql . " " . mysqli_error($conn);
            }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="jumbotron">
    <div class="container">
    <h2>Sign Up</h2>
    <p>Please fill this form to create an account.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Password</label>
            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
            <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($TeamName_err)) ? 'has-error' : ''; ?>">
            <label>Team Name</label>
            <input type="text" name="TeamName" class="form-control" value="<?php echo $teamName; ?>">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-default" value="Reset">
        </div>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </form>
    </div>
</div>
</body>
</html>