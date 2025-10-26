<?php
$host = "localhost";
$user = "root"; // standardbruker i XAMPP
$pass = "";     // tomt passord som standard
$db = "ahabd4711"; // navnet på databasen du lagde

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Feil ved tilkobling: " . $conn->connect_error);
}
?>

