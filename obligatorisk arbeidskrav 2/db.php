<?php
$host = "localhost";
$user = "root"; // 
$pass = "";     // 
$db = "ahabd4711"; // 

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Feil ved tilkobling: " . $conn->connect_error);
}
?>

