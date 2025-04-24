<?php
$db = new SQLite3('db.sqlite');
header('Content-Type: application/json');

$result = $db->query("
    SELECT c.etudiant, co.nom AS cours, c.td, c.tp, c.interro, c.moyenne
    FROM cotes c
    JOIN cours co ON c.cours_id = co.id
");

$data = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $data[] = $row;
}

echo json_encode($data, JSON_PRETTY_PRINT);
?>
