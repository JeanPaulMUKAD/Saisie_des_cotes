#  Service de Gestion des Cotes

Ce projet PHP propose une solution simple pour permettre aux enseignants de gérer et saisir les cotes des étudiants. 
Il utilise une base de données SQLite et expose une API REST pour consulter les résultats.

## Fonctionnalités
Ce projet inclut plusieurs fonctionnalités clés :

    - Un formulaire permettant de sélectionner un cours via une liste déroulante.
    - La possibilité pour l'enseignant de saisir les résultats de différents types d'évaluations :
    - Travaux Dirigés (TD)
    - Travaux Pratiques (TP)
    - Interrogatoires
    - Projets
    - Données des étudiants récupérées depuis `http://localhost:8000/api.php`.
    - Exposition d'une API REST des cotes (`api.php`).

## Installation et mise en place

1. Préparation de l'environnement
    Assurez-vous d'avoir un environnement de développement local fonctionnel avec :
    PHP installé (version 7.4 ou supérieure recommandée)
    Un serveur local (Apache ou simplement PHP en ligne de commande)

2. Téléchargement des fichiers
    Placez tous les fichiers du projet dans un dossier dédié sur votre serveur local, par exemple :
    * www/gestion-cotes/

3. Initialisation de la base de données
    Avant d'utiliser le formulaire, il faut créer la base de données SqlLite. Pour cela :
    Lancez le fichier db_init.php dans votre navigateur ou en ligne de commande.

    * Cela va :
    - Créer une base de données SQLite appelée cotes.sqlite
    - Créer les tables nécessaires pour enregistrer les cours et les cotes
    - Insérer des cours d'exemple (Mathématiques, Informatique, Physique)
    * Remarque : cette étape ne doit être faite qu'une seule fois.

4. Lancement du serveur PHP
    Si vous n'avez pas de serveur Apache, vous pouvez lancer PHP en ligne de commande avec :
    * php -S localhost:8080

    Puis, ouvrez votre navigateur et accédez à :
    * http://localhost:8080/index.php
    Cela ouvrira le formulaire de saisie des côtes.

5. Utilisation du formulaire
    Choisissez un cours dans la liste.
    Entrez les cotes pour chaque étudiant (TD, TP, Interro, Projet).
    Cliquez sur « Enregistrer ».
    Les données seront stockées dans la base SQLite avec la moyenne calculée automatiquement.



Exemple d'appel :

## Technologies

- PHP
- SQLite
- Tailwind CSS

### 1. Clonage du projet

gh repo clone JeanPaulMUKAD/Saisie_des_cotes

## Auteur
KASOMBW MUKAD Jean-Paul
