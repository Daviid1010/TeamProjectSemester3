<?php
/**
 * Created by PhpStorm.
 * User: Davy Sheehy
 * Date: 18/12/2018
 * Time: 13:37
 */
include '../connection.php';
$teamID ="";
$usermame = "jack";
$query = "SELECT TeamID FROM users WHERE Username='jack'";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($TeamID);
    while ($stmt->fetch()) {
        $teamID =  "$TeamID";
    }
    $stmt->close();
}
echo $teamID;
    ?>