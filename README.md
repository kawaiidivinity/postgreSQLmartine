Postgres SQL - Marquette Matthieu, Martine Marlon

Pré-requis 
  	- Un debian 9 à jour

1) Mettre a jour debian

 	- sudo apt update && apt upgrade

2) Installation Mysql

 	- apt install mariadb-client mariadb-server

   		Au cours du processus d'installation, il va falloir créer un mot de passe root.

3) Installation PHP

 	- apt install php7.0 php7.0-mysql

   		La prochaine étape dans l'installation du serveur LAMP est l'installation de PHP. Dans la pile LAMP, PHP alimente le contenu Web et interagit avec la base de données. Pour installer PHP sur Debian Stretch, exécutez la ligne suivante.


4) Installation Apache2

 	- apt install apache2 libapache2-mod-php7.0

   		Le serveur Web Apache est extrêmement puissant et peut être extrêmement facile à configurer ou ridiculement difficile, en fonction de la profondeur de votre choix. Parce que ce n'est qu'un guide simple, il va suivre le chemin le plus rapide pour obtenir un serveur de base mis en place.

5) Installation phpmyadmin

 	- apt install phpmyadmin

   		Une fois le paquet installé, vous pouvez naviguer dans votre navigateur vers localhost / phpmyadmin Vous serez accueilli par un écran de connexion qui acceptera vos informations d'identification de base de données et enfin, une interface pour travailler avec votre base de données.

Le script de sauvegarde
	
	Nous avons choisi de partir sur un script php étant donné que pour sauvegarder une base de donnée MySQL, il faut au préalable avoir un serveur acceptant ce language.
	Le script nous permet de sauvegarder nimporte quelle base de données SQL (il faut évidemment connaître l'hôte, l'utilisateur, le mdp ainsi que le nom de la table a sauvegarder).

	Comment lancer le script ?

	Il suffit simplement de glisser déposser le script dans votre serveur web dans un dossier "sauvegarde" et de vous rendre sur votre site internet a l'adresse www.monsite.com/sauvegarde/save.php... Tadam vous trouverez dans le dossier "sauvegarde" un fichier zip contenant vos infos sql.

	Ce script fonctionne sous nimporte quelle base de donnée MySQL.

	Le code

	<?php
	// Personnalisez ici vos données d'accès
	$host= 'localhost';
	$user= 'root';
	$pass= 'password';
	$db= 'dbname';

	// Création de la sauvegarde dans un fichier zip
	system(sprintf(
		'mysqldump --no-tablespace --opt -h%s -u%s -p"%s" %s | gzip > %s/dumpDB.sql.gz',
		$host,
		$user,
		$pass,
		$db,
		getenv('DOCUMENT_ROOT')
	));
	echo '+DONE';
	?>
