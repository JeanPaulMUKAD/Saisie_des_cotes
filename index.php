<?php
$db = new SQLite3('db.sqlite');

// Cours
$cours = $db->query("SELECT * FROM cours");

// Étudiants via API externe
$etudiants = json_decode(file_get_contents('http://localhost:8000/api.php'), true);

// Normalisation des données pour s'assurer qu'on a bien une liste de noms
$liste_noms = [];
foreach ($etudiants as $e) {
  if (is_array($e) && isset($e['nom'])) {
    $liste_noms[] = $e['nom'];
  } elseif (is_string($e)) {
    $liste_noms[] = $e;
  }
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $cours_id = $_POST['cours'];
  foreach ($liste_noms as $nom) {
    $td = floatval($_POST['td'][$nom]);
    $tp = floatval($_POST['tp'][$nom]);
    $interro = floatval($_POST['interro'][$nom]);
    $moyenne = ($td + $tp + $interro) / 4;

    $stmt = $db->prepare("INSERT INTO cotes (etudiant, cours_id, td, tp, interro, moyenne)
      VALUES (:etudiant, :cours_id, :td, :tp, :interro, :moyenne)");
    $stmt->bindValue(':etudiant', $nom);
    $stmt->bindValue(':cours_id', $cours_id);
    $stmt->bindValue(':td', $td);
    $stmt->bindValue(':tp', $tp);
    $stmt->bindValue(':interro', $interro);
    $stmt->bindValue(':moyenne', $moyenne);
    $stmt->execute();
  }
  echo "<p class='text-green-500 font-bold'>Cotes enregistrées !</p>";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Saisie des Cotes</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
  <form method="POST" class="bg-white p-6 rounded shadow-md">
  <h2 class="text-2xl font-bold mb-4">Saisie des Cotes</h2>

  <label class="block mb-2">Cours :</label>
  <select name="cours" class="mb-4 p-2 border rounded w-full">
    <?php while ($row = $cours->fetchArray()) : ?>
    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['nom']) ?></option>
    <?php endwhile; ?>
  </select>

  <table class="w-full table-auto mb-4 border-collapse border border-gray-300">
    <thead>
    <tr class="bg-gray-200">
      <th class="px-4 py-2 border border-gray-300">Étudiant</th>
      <th class="px-4 py-2 border border-gray-300">TD</th>
      <th class="px-4 py-2 border border-gray-300">TP</th>
      <th class="px-4 py-2 border border-gray-300">Interro</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($liste_noms as $nom): ?>
    <tr>
      <td class="border px-4 py-2"><?= htmlspecialchars($nom) ?></td>
      <td class="border px-4 py-2"><input type="text" min="0" step="0.1" name="td[<?= $nom ?>]" required class="w-full p-1 border" /></td>
      <td class="border px-4 py-2"><input type="text" min="0" step="0.1" name="tp[<?= $nom ?>]" required class="w-full p-1 border" /></td>
      <td class="border px-4 py-2"><input type="text" min="0" step="0.1" name="interro[<?= $nom ?>]" required class="w-full p-1 border" /></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table>

  <button class="bg-blue-500 text-white px-4 py-2 rounded">Enregistrer</button>
  </form>

  <!-- Affichage des cotes enregistrées -->
  <h2 class="text-2xl font-bold mt-8">Cotes Enregistrées</h2>
  <?php
    $result = $db->query("
      SELECT c.etudiant, co.nom AS cours, c.td, c.tp, c.interro, c.moyenne
      FROM cotes c
      JOIN cours co ON c.cours_id = co.id
    ");
    $rowCount = 0;
    while ($result->fetchArray(SQLITE3_ASSOC)) {
      $rowCount++;
    }
    $result->reset();
    if ($rowCount > 0) {
      echo '<table class="w-full table-auto mt-4 border-collapse border border-gray-300">';
      echo '<thead><tr class="bg-gray-200"><th class="px-4 py-2 border border-gray-300">Étudiant</th><th class="px-4 py-2 border border-gray-300">Cours</th><th class="px-4 py-2 border border-gray-300">TD</th><th class="px-4 py-2 border border-gray-300">TP</th><th class="px-4 py-2 border border-gray-300">Interro</th><th class="px-4 py-2 border border-gray-300">Moyenne</th></tr></thead>';
      echo '<tbody>';
      while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo '<tr>';
        echo '<td class="border px-4 py-2">' . htmlspecialchars($row['etudiant']) . '</td>';
        echo '<td class="border px-4 py-2">' . htmlspecialchars($row['cours']) . '</td>';
        echo '<td class="border px-4 py-2">' . htmlspecialchars($row['td']) . '</td>';
        echo '<td class="border px-4 py-2">' . htmlspecialchars($row['tp']) . '</td>';
        echo '<td class="border px-4 py-2">' . htmlspecialchars($row['interro']) . '</td>';
        echo '<td class="border px-4 py-2">' . htmlspecialchars($row['moyenne']) . '</td>';
        echo '</tr>';
      }
      echo '</tbody></table>';
    } else {
      echo "<p class='text-gray-500'>Aucune cote enregistrée.</p>";
    }
  ?>
</body>
</html>
