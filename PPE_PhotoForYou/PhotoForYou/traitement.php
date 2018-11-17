<?php
session_start();
$Conn = new PDO('mysql:host=localhost;dbname=photoforyou',"root","Nntqy177013");

// on teste si nos variables sont définies
if (isset($_POST['mail']) && isset($_POST['passe'])) {

	// on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
	$reponse = $Conn->query('SELECT email, motdepasse FROM users'); //Effectue la requete SQL pour verifier l'existance du compte
    	while($donnee=$reponse->fetch())
        {
                //Si il existe alors on transmet les parametre dans les variable de session
                if((($donnee['email']) == ($_POST['mail'])) and (($donnee['motdepasse']) == ($_POST['passe'])))
                {
                	session_start();
                    $_SESSION['mail']=$_POST['mail'];
                    $_SESSION['passe']=$_POST['passe'];
                    $_SESSION['access']='OK';


                 	header ('location: membre.php');
                   
                }
                else {
		// Signalement à l'utilisateur que ces logins ne sont pas reconnus
		echo '<body onLoad="alert(\'Membre non reconnu ou logins incorrects\')">';
		// on le redirige alors vers la page d'accueil
		echo '<meta http-equiv="refresh" content="0;URL=connexion.php">';
	}
		}
	
}          
?>