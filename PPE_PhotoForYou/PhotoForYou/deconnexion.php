<?php session_start();
//Ceci permet de fermer la session et rediriger vers l'index
	session_destroy();
	header('location: index.php');
?>