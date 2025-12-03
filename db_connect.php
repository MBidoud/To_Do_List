<?php
$servername = "127.0.0.1"; 
$username = "root";      
$password = "";          
$dbname = "todo"; 
$port = 3007; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully <br>";

// You can now execute SQL queries using $conn

// Close the connection when you are done




?>
