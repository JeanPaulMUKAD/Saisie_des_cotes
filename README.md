# Service de Gestion des Cotes

Ce projet PHP propose une solution simple pour permettre aux enseignants de gérer et saisir les cotes des étudiants. Il utilise une base de données SQLite et expose une API REST pour consulter les résultats.

## Fonctionnalités
Ce projet inclut plusieurs fonctionnalités clés :

- Un formulaire permettant de sélectionner un cours via une liste déroulante.
- La possibilité pour l'enseignant de saisir les résultats de différents types d'évaluations :
    - Travaux Dirigés (TD)
    - Travaux Pratiques (TP)
    - Interrogatoires
    - Projets
- Données des étudiants récupérées depuis `https://saisie-des-cotes.onrender.com/api.php`.
- Exposition d'une API REST des cotes (`api.php`).

## Utilisation

Le projet est déployé gratuitement sur Render et accessible à l'adresse suivante :  
[https://saisie-des-cotes.onrender.com/](https://saisie-des-cotes.onrender.com/)

### Étapes pour utiliser le formulaire :

1. Accédez à l'URL ci-dessus.
2. Choisissez un cours dans la liste déroulante.
3. Entrez les cotes pour chaque étudiant (TD, TP, Interro, Projet).
4. Cliquez sur « Enregistrer ».
5. Les données seront stockées dans la base SQLite avec la moyenne calculée automatiquement.

## Technologies

- PHP pour le backend
- SQLite pour la base de données légère et embarquée
- Tailwind CSS pour le style rapide et moderne du formulaire

### Clonage du projet

Pour récupérer ce projet via GitHub, utilisez la commande suivante :  
`git clone https://github.com/JeanPaulMUKAD/Saisie_des_cotes.git`

## Auteur

Projet développé par KASOMBW MUKAD Jean-Paul

## Exemple d'affichage des données

```json
{
    "etudiant": "Nabil MUTOMBO",
    "cours": "Mathématiques",
    "td": 6,
    "tp": 8,
    "interro": 10,
    "moyenne": 6
}
```
