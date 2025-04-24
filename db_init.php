<?php
$db = new SQLite3('db.sqlite');

// Table des cours
$db->exec("CREATE TABLE IF NOT EXISTS cours (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT NOT NULL
)");

// Table des cotes
$db->exec("CREATE TABLE IF NOT EXISTS cotes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    etudiant TEXT NOT NULL,
    cours_id INTEGER,
    td REAL,
    tp REAL,
    interro REAL,
    moyenne REAL,
    FOREIGN KEY(cours_id) REFERENCES cours(id)
)");

// Cours exemples
$cours = ['Application Distribuée', 'Génie Logiciel', 'Programmation Systemème'];
foreach ($cours as $c) {
    $db->exec("INSERT INTO cours (nom) VALUES ('$c')");
}

echo "Base initialisée.";
?>
