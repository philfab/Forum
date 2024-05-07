Vous travaillez au sein d'une web agency en tant que développeur-intégrateur web. Suite à la commande d’un client (dont le formateur interprétera le rôle), 
vous vous occupez de la conception d'une plate-forme de communication en ligne de type forum.
L'objectif de cet exercice est d'élaborer la structure fonctionnelle d'un forum en ligne classique, en utilisant les langages HTML, CSS et PHP.
Ce forum doit impérativement répondre aux exigences du cahier des charges décrit ci-dessous :
Les besoins :
Ce forum permettra une communication souple et intuitive entre les utilisateurs autorisés à y accéder, c'est-à-dire que leur inscription à la plate-forme est auparavant obligatoire, 
tout en demeurant simple d'accès.
Le public visé est particulièrement hétérogène : les habitués de l'outil informatique comme les novices devront profiter d'une ergonomie et d'un rendu visuel clairs et 
conformes aux standards utilisés dans la conception d'applications destinées au web.
Dans son fonctionnement, l'application devra répondre aux besoins suivants :
La page d'accueil proposera un formulaire de connexion et un lien vers une page d'inscription.
Une connexion préalable est obligatoire pour consulter tout ou partie du forum.
Les visiteurs peuvent consulter les sujets et leur réponse sans restriction, ces sujets sont listés en première page et triés par date de création dans l'ordre antéchronologique.
Technologies à employer :
L'application devra utiliser les technologies :
HTML, CSS comme langages de présentation côté client (éventuellement Javascript via le framework JQuery, si besoin)
PHP en langage d'interprétation côté serveur
PDO (PHP Data Object) pour l'exploitation de la base de données dans le code PHP
MySQL et HeidiSQL (ou PHPMyAdmin).
L'utilisation exclusive de logiciels open-source est vivement souhaitable. Néanmoins, aucun outil de conception n'est imposé, 
le concepteur devra effectuer ses choix selon ses préférences et son habitude de travail, tout en pouvant à tout moment justifier ceux-ci dans l'intérêt du projet.

Prérequis :
Il est nécessaire, en amont de la conception technique, de fournir deux documents d'analyse afin d'évaluer le respect des contraintes exprimées et la bonne direction du projet.
Un schéma entités-relations de la base de données (créé avec looping par exemple), à mettre en place selon les contraintes suivantes :
Les visiteurs sont identifiés par un numéro unique, possèdent un pseudonyme et un mot de passe. Leur date d'inscription est automatiquement renseignée 
à la création de leur compte dans la base de données.
Le forum est constitué de sujets (titre, auteur et date de création) auxquels sont rattachés des messages (texte, auteur et date de création).
Sujets et messages sont identifiés dans la base de données par un numéro unique. Leurs dates de création sont automatiquement renseignées lors de leur création.
Lorsqu'un sujet est visualisé, la liste des messages est présentée dans l'ordre chronologique. Chaque message est accompagné du nom de son auteur et de sa date de création.
Toute information enregistrable dans la base de données en relation avec le forum devra comporter une solution de modération (la solution étant laissée à l'initiative du concepteur)
Après avoir validé le schéma précèdent auprès du client, Un prototypage exhaustif des pages, de type wireframe ou mock-up, (créé avec figma par exemple), 
analysant l'enchaînement de la navigation et l'agencement des blocs d'information présentés à l'utilisateur, le but étant d'évaluer l'ergonomie du site.
Aucune doléance d'ordre graphique ou illustrative n'est soumise au concepteur de la plate-forme, les choix visuels devront néanmoins se conformer aux standards actuels.
S’ajoutant à ces deux documents, un trello sera demandé afin d’organiser votre travail (via la méthode MoSCoW). Dès que celui-ci sera validé auprès du client, 
vous pourrez passer à la réalisation du projet.
