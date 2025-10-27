<?php include("db_connect.php"); ?>

<h3>Registrer student</h3>

<form method="post">
    Brukernavn: <input type="text" name="brukernavn"><br>
    Fornavn: <input type="text" name="fornavn"><br>
    Etternavn: <input type="text" name="etternavn"><br>
    Klasse:
    <select name="klassekode">
        <?php
        $result = $conn->query("SELECT * FROM klasse");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='".$row['klassekode']."'>".$row['klassekode']." - ".$row['klassenavn']."</option>";
        }
        ?>
    </select><br>
    <input type="submit" name="registrer" value="Lagre">
</form>

<?php
if (isset($_POST['registrer'])) {
    $brukernavn = $_POST['brukernavn'];
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $klassekode = $_POST['klassekode'];

    $sql = "INSERT INTO student VALUES ('$brukernavn', '$fornavn', '$etternavn', '$klassekode')";
    if ($conn->query($sql)) {
        echo "Student registrert!";
    } else {
        echo "Feil: " . $conn->error;
    }
}
?>

