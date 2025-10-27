<?php include("db_connect.php"); ?>

<h3>Alle studenter</h3>

<?php
$result = $conn->query("
    SELECT s.brukernavn, s.fornavn, s.etternavn, k.klassenavn 
    FROM student s 
    LEFT JOIN klasse k ON s.klassekode = k.klassekode
");

echo "<table border='1'>
<tr><th>Brukernavn</th><th>Fornavn</th><th>Etternavn</th><th>Klasse</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>".$row['brukernavn']."</td>
        <td>".$row['fornavn']."</td>
        <td>".$row['etternavn']."</td>
        <td>".$row['klassenavn']."</td>
    </tr>";
}
echo "</table>";
?>
