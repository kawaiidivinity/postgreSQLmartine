<?php
	// Personnalisez ici vos données d'accès
	$host= 'localhost';
	$user= 'root';
	$pass= 'root';
	$db= 'appli_web';

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