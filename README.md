# Amazone - Projet Ecommerce Laravel

## Description
Amazone est un projet de commerce électronique développé pour l'ESGI (École Supérieure de Génie Informatique) par Joshua Deschietere en 2ème année. Cette application web permet aux utilisateurs de parcourir les produits, de les ajouter au panier et de passer des commandes. Les administrateurs peuvent gérer les produits et les commandes.

## Fonctionnalités
- Affichage des produits par catégorie
- Ajout de produits au panier
- Gestion du panier (suppression de produits)
- Passage de commande avec un faux formulaire de paiement
- Gestion des commandes par l'administrateur (marquer une commande comme traîtée ou en attente)
- Authentification des utilisateurs

## Technologies utilisées
- Laravel
- Bootstrap (pour le design)
- MySQL (pour la base de données)

## Utilisation
### Page d'accueil
Affichage d'un carrousel avec des articles à la une et des promotions.

### Vue des produits
Affichage des produits par catégorie.

### Détails du produit
Affichage des détails d'un produit.

### Panier
Gestion du panier avec possibilité de supprimer des produits.

### Passage de commande
Formulaire de paiement pour passer une commande. **Notez qu'il est important de saisir la date au format JJ/MM/AAAA dans la partie paiement sinon le formulaire ne s'enverra pas.**

### Gestion des commandes
Vue administrateur pour marquer une commande comme traîtée ou en attente.

### Gestion des produits
Vue administrateur pour ajouter, modifier ou supprimer des produits.

## Base de données
L'export de la base de données se trouve à la racine et est nommé `ecommerce.sql`.
