<?php
/**
 * Created by PhpStorm.
 * User: Davy Sheehy
 * Date: 29/11/2018
 * Time: 10:26
 */

$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="password";
$dbname="fantasy_rugby";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());
//$con->close();
?>