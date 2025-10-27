<?php include("db_connect.php"); ?>

<h3>Alle klasser</h3>

<?php
$result = $conn->query("SELECT * FROM klasse");

echo "<table border='1'>
<tr><th>Klassekode</th><th>Klassenavn</th><th>Studiumkode</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row['klassekode']."</td><td>".$row['klassenavn']."</td><td>".$row['studiumkode']."</td></tr>";
}
echo "</table>";
?>
