#  Service de Gestion des Cotes

Ce projet PHP permet aux enseignants de saisir les cotes des étudiants et de consulter les résultats via une API REST.

## Fonctionnalités

- Choix d'un cours via liste déroulante.
- Attribution de cotes : TD, TP, Interro.
- Calcul automatique de la moyenne sur 10.
- Données des étudiants récupérées depuis `http://localhost:8000/api.php`.
- Exposition d'une API REST des cotes (`api.php`).

## Installation

1. Placez tous les fichiers dans un dossier web (ex: `www/gestion-cotes/`).
2. Exécutez `db_init.php` **une seule fois**.
4. Lancer le fichier `index.php` à l'aide la commande: php -S localhost:8080 tout en se rassurant que le serveur local est lancé
3. Une fois le formulaire ouvert, saisir les notes.
4. Accédez aux données via `api.php`.

## Technologies

- PHP
- SQLite
- Tailwind CSS

### 1. Clonage du projet

gh repo clone JeanPaulMUKAD/Saisie_des_cotes

## Auteur
KASOMBW MUKAD Jean-Paul
