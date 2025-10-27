<?php include("db_connect.php"); ?>

<h3>Slett student</h3>

<form method="post">
    Velg student:
    <select name="brukernavn">
        <?php
        $result = $conn->query("SELECT * FROM student");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='".$row['brukernavn']."'>".$row['brukernavn']." - ".$row['fornavn']." ".$row['etternavn']."</option>";
        }
        ?>
    </select>
    <input type="submit" name="slett" value="Slett">
</form>

<?php
if (isset($_POST['slett'])) {
    $brukernavn = $_POST['brukernavn'];
    $sql = "DELETE FROM student WHERE brukernavn='$brukernavn'";
    if ($conn->query($sql)) {
        echo "Student slettet!";
    } else {
        echo "Feil: " . $conn->error;
    }
}
?>
