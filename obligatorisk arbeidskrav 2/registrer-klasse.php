<?php include("db_connect.php"); ?>

<h3>Registrer klasse</h3>

<form method="post">
    Klassekode: <input type="text" name="klassekode"><br>
    Klassenavn: <input type="text" name="klassenavn"><br>
    Studiumkode: <input type="text" name="studiumkode"><br>
    <input type="submit" name="registrer" value="Lagre">
</form>

<?php
if (isset($_POST['registrer'])) {
    $kode = $_POST['klassekode'];
    $navn = $_POST['klassenavn'];
    $studium = $_POST['studiumkode'];

    $sql = "INSERT INTO klasse VALUES ('$kode', '$navn', '$studium')";
    if ($conn->query($sql)) {
        echo "Klasse registrert!";
    } else {
        echo "Feil: " . $conn->error;
    }
}
?>

