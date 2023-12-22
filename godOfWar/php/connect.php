<?php
//connect to database
$serverName = "localhost";
$databaseName = "decks";
$password = "root";
$username = "root";

// target machine actively refused it. add port manually from mamp pref (8889) into mysqli query. 
$conn = new mysqli($serverName,$username,$password,$databaseName,8889);

//check for connection errors
if($conn->connect_error){
    die("failed" . $conn->connect_error);
}


?>