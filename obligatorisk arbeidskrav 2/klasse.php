<?php
include 'db.php';

// Legg til ny klasse
if (isset($_POST['lagre'])) {
    $kode = $_POST['klassekode'];
    $navn = $_POST['klassenavn'];
    $studium = $_POST['studiumkode'];

    if ($kode && $navn && $studium) {
        $sql = "INSERT INTO klasse (klassekode, klassenavn, studiumkode)
                VALUES ('$kode', '$navn', '$studium')";
        if (!$conn->query($sql)) {
            echo "<p style='color:red;'>Feil: " . $conn->error . "</p>";
        }
    }
}

// Slett klasse
if (isset($_GET['slett'])) {
    $kode = $_GET['slett'];
    $conn->query("DELETE FROM klasse WHERE klassekode='$kode'");
}

// Hent alle klasser
$result = $conn->query("SELECT * FROM klasse ORDER BY klassekode");
?>

<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <title>Administrer klasser</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Administrer klasser</h2>

  <form method="post">
    <label for="klassekode">Klassekode:</label>
    <input type="text" name="klassekode" id="klassekode" maxlength="5" required><br>

    <label for="klassenavn">Klassenavn:</label>
    <input type="text" name="klassenavn" id="klassenavn" required><br>

    <label for="studiumkode">Studiumkode:</label>
    <input type="text" name="studiumkode" id="studiumkode" required><br>

    <button type="submit" name="lagre">Lagre klasse</button>
  </form>

  <h3>Alle klasser</h3>
  <table>
    <tr>
      <th>Klassekode</th>
      <th>Klassenavn</th>
      <th>Studiumkode</th>
      <th>Slett</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['klassekode']) ?></td>
        <td><?= htmlspecialchars($row['klassenavn']) ?></td>
        <td><?= htmlspecialchars($row['studiumkode']) ?></td>
        <td><a href="?slett=<?= urlencode($row['klassekode']) ?>" onclick="return confirm('Er du sikker på at du vil slette denne klassen?')">Slett</a></td>
      </tr>
    <?php endwhile; ?>
  </table>

  <p><a href="index.php">Tilbake til meny</a></p>
</body>
</html>
