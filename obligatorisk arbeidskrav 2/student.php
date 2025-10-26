<?php
include 'db.php';

// Legg til student
if (isset($_POST['lagre'])) {
    $brukernavn = $_POST['brukernavn'];
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $klassekode = $_POST['klassekode'];

    if ($brukernavn && $fornavn && $etternavn && $klassekode) {
        $sql = "INSERT INTO student (brukernavn, fornavn, etternavn, klassekode)
                VALUES ('$brukernavn', '$fornavn', '$etternavn', '$klassekode')";
        if (!$conn->query($sql)) {
            echo "<p style='color:red;'>Feil: " . $conn->error . "</p>";
        }
    }
}

// Slett student
if (isset($_GET['slett'])) {
    $brukernavn = $_GET['slett'];
    $conn->query("DELETE FROM student WHERE brukernavn='$brukernavn'");
}

// Hent klasser til dropdown
$klasser = $conn->query("SELECT * FROM klasse ORDER BY klassekode");

// Hent alle studenter
$result = $conn->query("SELECT * FROM student ORDER BY brukernavn");
?>

<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <title>Administrer studenter</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Administrer studenter</h2>

  <form method="post">
    <label for="brukernavn">Brukernavn:</label>
    <input type="text" name="brukernavn" id="brukernavn" maxlength="7" required><br>

    <label for="fornavn">Fornavn:</label>
    <input type="text" name="fornavn" id="fornavn" required><br>

    <label for="etternavn">Etternavn:</label>
    <input type="text" name="etternavn" id="etternavn" required><br>

    <label for="klassekode">Klasse:</label>
    <select name="klassekode" id="klassekode" required>
      <option value="">Velg klasse</option>
      <?php while ($k = $klasser->fetch_assoc()): ?>
        <option value="<?= htmlspecialchars($k['klassekode']) ?>">
          <?= htmlspecialchars($k['klassekode']) ?> - <?= htmlspecialchars($k['klassenavn']) ?>
        </option>
      <?php endwhile; ?>
    </select><br>

    <button type="submit" name="lagre">Lagre student</button>
  </form>

  <h3>Alle studenter</h3>
  <table>
    <tr>
      <th>Brukernavn</th>
      <th>Fornavn</th>
      <th>Etternavn</th>
      <th>Klassekode</th>
      <th>Slett</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['brukernavn']) ?></td>
        <td><?= htmlspecialchars($row['fornavn']) ?></td>
        <td><?= htmlspecialchars($row['etternavn']) ?></td>
        <td><?= htmlspecialchars($row['klassekode']) ?></td>
        <td><a href="?slett=<?= urlencode($row['brukernavn']) ?>" onclick="return confirm('Er du sikker på at du vil slette denne studenten?')">Slett</a></td>
      </tr>
    <?php endwhile; ?>
  </table>

  <p><a href="index.php">Tilbake til meny</a></p>
</body>
</html>
