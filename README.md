# conservatoire-php
c'est le depot de mon site conservatoire en php


Titre : Site Intranet de Gestion du Conservatoire
Description : Le Site Intranet de Gestion du Conservatoire est une plateforme web qui facilite la gestion d'un conservatoire de musique. 




Installation du Site Intranet de Gestion du Conservatoire :
1.	Assurez-vous d'avoir un environnement de développement web installé (par exemple, WAMP, XAMPP, MAMP) avec PHP et MySQL.
2.	Téléchargez les fichiers du site du dépôt.
3.	Créez une base de données MySQL pour le conservatoire. Vous pouvez utiliser un outil de gestion de base de données tel que phpMyAdmin ou utiliser la ligne de commande MySQL.
4.	Importez le fichier de script SQL fourni avec le dépôt dans la base de données que vous avez créée. Cela créera les tables nécessaires pour le bon fonctionnement du site.


Architecture du projet Site Intranet de Gestion du Conservatoire (Modèle MVC en PHP) :
Le projet est organisé selon le modèle MVC (Modèle-Vue-Contrôleur), qui est un pattern couramment utilisé pour structurer les applications web. Cette structure facilite la séparation des responsabilités et permet une meilleure maintenabilité du code.
1.	Dossier "modèles" : Ce dossier contient les fichiers PHP qui définissent les modèles de données de l'application. Les modèles représentent les entités de la base de données et fournissent les méthodes pour accéder et manipuler les données. 
2.	Dossier "vues" : Ce dossier contient les fichiers PHP qui représentent les vues de l'application. Les vues sont responsables de l'affichage des données et de l'interface utilisateur. Chaque page ou fonctionnalité de l'application a généralement sa propre vue. 
3.	Dossier "contrôleurs" : Ce dossier contient les fichiers PHP qui agissent comme les contrôleurs de l'application. Les contrôleurs sont responsables de la logique métier, de l'interaction entre les modèles et les vues, et de la gestion des requêtes utilisateur. 

