# Dev.to-Blogging-Plateform

## Contexte du Projet

Ce projet a pour objectif la mise en place d'un système complet de gestion de contenu pour la plateforme **Dev.to**, permettant aux développeurs de partager des articles, d'explorer du contenu pertinent et de collaborer efficacement. Ce système vise à fournir une expérience utilisateur fluide côté front office et un tableau de bord puissant côté back office pour une gestion simplifiée des utilisateurs, des catégories, des tags et des articles.

### Fonctionnalités principales :

- **Back Office** (Administrateurs) : Gestion des utilisateurs, articles, catégories, tags, et statistiques.
- **Front Office** (Utilisateurs) : Inscription, création d'articles, navigation dynamique, et recherche de contenu.

## Technologies Requises

- **Langage** : PHP 8 (Programmation Orientée Objet)
- **Base de données** : PDO pour la gestion de la base de données (MySQL)
- **Frontend** : HTML, CSS, JavaScript (avec validation côté client), et un framework CSS responsive.
- **Outils** : Visual Studio Code, Git, GitHub, Jira (pour la gestion de projet).

## Fonctionnalités Clés

### Partie Back Office (Administrateurs)

1. **Gestion des Catégories** :
   - Création, modification et suppression des catégories.
   - Association des articles aux catégories.
   - Statistiques des catégories sous forme de graphiques interactifs.

2. **Gestion des Tags** :
   - Création, modification et suppression des tags.
   - Association des tags aux articles.
   - Statistiques des tags sous forme de graphiques.

3. **Gestion des Utilisateurs** :
   - Consultation et gestion des profils utilisateurs.
   - Attribution de permissions aux utilisateurs pour devenir auteurs.
   - Suspension ou suppression des utilisateurs en cas de non-respect des règles.

4. **Gestion des Articles** :
   - Consultation, acceptation, ou refus des articles soumis.
   - Archivage des articles inappropriés.
   - Statistiques des articles les plus lus.

5. **Tableau de Bord et Statistiques** :
   - Affichage des utilisateurs, articles, catégories et tags.
   - Visualisation des meilleurs auteurs.
   - Graphiques interactifs pour les catégories et tags.

### Partie Front Office (Utilisateurs)

1. **Inscription et Connexion** :
   - Création de compte avec nom, e-mail et mot de passe.
   - Connexion sécurisée, redirection selon le rôle (admin ou utilisateur).

2. **Navigation et Recherche** :
   - Barre de recherche interactive pour trouver des articles, catégories ou tags.
   - Navigation dynamique entre les articles et les catégories.

3. **Affichage du Contenu** :
   - Affichage des derniers articles et catégories ajoutés.
   - Redirection vers la page dédiée d'un article avec ses détails, catégories, et tags associés.

4. **Espace Auteur** :
   - Création, modification, et suppression d'articles.
   - Gestion des articles publiés dans un tableau de bord personnel.

## Objectifs du Projet

- Créer une plateforme collaborative pour le partage d'articles techniques entre développeurs.
- Mettre en place une gestion des utilisateurs, articles, catégories et tags, accessible et intuitive.
- Fournir une interface utilisateur moderne et responsive.

## Structure du Projet

Le projet est organisé en plusieurs modules avec une séparation claire entre la logique métier et la présentation (architecture MVC).

- **Backend** : 
  - `models/` : Modèles pour la gestion des données (utilisateurs, articles, catégories, etc.)
  - `controllers/` : Logique métier pour gérer les requêtes HTTP.
  - `views/` : Templates HTML pour l'affichage des pages.
  
- **Frontend** : 
  - `assets/` : Fichiers CSS et JavaScript.
  - `public/` : Fichiers accessibles au public (images, CSS, JS).
  
- **Base de Données** : 
  - `database/` : Fichiers SQL pour la création et gestion de la base de données.
