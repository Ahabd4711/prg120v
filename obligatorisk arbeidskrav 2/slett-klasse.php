<?php include("db_connect.php"); ?>

<h3>Slett klasse</h3>

<form method="post">
    Velg klasse:
    <select name="klassekode">
        <?php
        $result = $conn->query("SELECT * FROM klasse");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='".$row['klassekode']."'>".$row['klassekode']." - ".$row['klassenavn']."</option>";
        }
        ?>
    </select>
    <input type="submit" name="slett" value="Slett">
</form>

<?php
if (isset($_POST['slett'])) {
    $kode = $_POST['klassekode'];
    $sql = "DELETE FROM klasse WHERE klassekode='$kode'";
    if ($conn->query($sql)) {
        echo "Klasse slettet!";
    } else {
        echo "Feil: " . $conn->error;
    }
}
?>
