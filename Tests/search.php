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
echo "<label> or Province: </label><input type='text' name='province'/>";
echo "<label> or Position: </label><input type='text' name='position' />";
echo "<input type='submit' value='Submit' name='submit'>";
echo "</form>";


if(isset($_POST['submit'])){
    $playerName =  $_POST['name'];
    $province = $_POST['province'];
    $position = $_POST['position'];

    $search = "SELECT PlayerName, PlayerPosition, Province, Rating FROM players";


    //checks if any of the feilds have been filled
    if($playerName!=null || $position!=null || $province!=null) {
        $search .= " WHERE ";

        //if player name is not empty and if the twn other are empty
        if( $playerName!=null && $province==null && $position==null ){
            $search .= "PlayerName='$playerName'";
        } else if ($playerName!=null) {
            $search .= "PlayerName='$playerName' AND ";
        }

        //now checking if province is empty and also position
        if( $province!=null && $position==null) {
            $search .= "Province='$position'";
        } else if ($province!=null) {
            $search .= "Province='$province' AND ";
        }

        //finally check to see if postion is full
        if ($position!=null) {
            $search .= "PlayerPosition='$position'";
        }

    }

    $search .= " ORDER BY  Rating DESC";


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
    else {
        echo "<p>No results found.</p>";
    }
}

