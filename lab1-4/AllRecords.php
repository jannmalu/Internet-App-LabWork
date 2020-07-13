<?php
    include 'DBConnector.php';
    include 'User.php';

    $connect = new DBConnect;

    $user = new User('','');
    $result = $user->readAll();

    if(mysqli_num_rows($result) > 0){
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>City Name</th>";
        echo "</tr>";

        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" .$row['id']. "</td>";
            echo "<td>" .$row['first_name']. "</td>";
            echo "<td>" .$row['last_name']. "</td>";
            echo "<td>" .$row['user_city']. "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else{
        echo "An Error Occured";
    }
?>