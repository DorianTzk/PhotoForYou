<?php
session_start();


// on teste si nos variables sont définies
if (isset($_POST['mail']) && isset($_POST['passe'])) {

	// on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
	$reponse = $Conn->query('SELECT email, motdepasse FROM users'); //Effectue la requete SQL pour verifier l'existance du compte
        //Verification de tous le mot de passe tant qu'il n'a pas trouver le bon il ne passe pas a true
    	while($donnee=$reponse->fetch())
        {
                //Si il existe alors on transmet les parametre dans les variable de session
                if((($donnee['email']) == ($_POST['mail'])) and (($donnee['motdepasse']) == ($_POST['passe'])))
                {
                	session_start();
                    $_SESSION['mail']=$_POST['mail'];
                    $_SESSION['passe']=$_POST['passe'];
                    $_SESSION['acces']='OK';

                 	header ('location: membre.php');
                   
                }
                
	}
	else {
		// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
		echo '<body onLoad="alert(\'Membre non reconnu...\')">';
		// puis on le redirige vers la page d'accueil
		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
	}
}
else {
	echo 'Les variables du formulaire ne sont pas déclarées.';
}
                
?>