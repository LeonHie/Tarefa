<?php
    
    echo "Olá, mundo!!"; 


$servername = "10.0.0.51";  //"localhost"; // Or your database host
$username = "root";
$password = "senha123";
$dbname = "Playlist";

// Create connection using MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>