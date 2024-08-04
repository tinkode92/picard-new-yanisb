# Picard Products API & Front-End

Ce projet est une application web simple qui permet de consulter une liste de produits, de les ajouter au panier, de noter les produits, et de voir le contenu du panier. Il est développé avec Symfony pour l'API back-end et utilise HTML, CSS, et JavaScript vanilla pour le front-end.

## Prérequis

Avant de commencer, assurez-vous d'avoir installé les outils suivants :

- [PHP](https://www.php.net/downloads) (version 7.4 ou supérieure)
- [Composer](https://getcomposer.org/download/)
- [Symfony CLI](https://symfony.com/download)
- [Node.js et npm](https://nodejs.org/) (facultatif, uniquement si vous avez besoin de packages front-end supplémentaires)

## Installation

1. Clonez ce dépôt sur votre machine locale :

   ```bash
   git clone https://github.com/votre-utilisateur/votre-repo.git

Accédez au dossier du projet :
cd votre-repo

Installez les dépendances PHP avec Composer :
composer install

Assurez-vous que votre base de données est configurée dans le fichier .env. Si ce n'est pas déjà fait, configurez votre base de données en modifiant les variables d'environnement DATABASE_URL.

Mettez à jour le schéma de la base de données :
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force

(Facultatif) Chargez des données de test avec les fixtures :
php bin/console doctrine:fixtures:load

Lancer le Serveur
Pour lancer le site web, utilisez la commande suivante dans votre terminal :
symfony serve

Cela démarrera un serveur local. Le site sera accessible à l'adresse suivante :
http://127.0.0.1:8000

Et vous aurez directement accès au site.
