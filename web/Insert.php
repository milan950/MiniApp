<?php
	try
	{
		echo 'tentative de connexion';
		$bdd = new PDO('mysql:host=192.168.132.147:3307;dbname=contact','root','root');
		echo 'Vous êtes connecté !';
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	
	$bdd->exec('INSERT INTO PERSONNE(ENTREPRISE, NOM, PRENOM) VALUES (\'CREDIT AGRICOLE\', \'Grosjean\', \'Milan\')');
?>