<?php
//activation de la séssion
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8_general_ci" />
<title>PhotoForYou</title>
<link rel="stylesheet" href="css/styles.css" type="text/css" />

<div id="container">
	<div id="header">
        <h1><a href="index.php">PhotoForYou</a></h1>
        <h2>Achat et vente de photos en ligne</h2>
        <div class="clear"></div>
    </div>
<div id="nav">
        <ul>
             <?php
           //Connextion a la bdd
           $Conn = new PDO('mysql:host=localhost;dbname=photoforyou',"root","Nntqy177013");
           //preparation d'une requete
           $sql ='SELECT * FROM menu';
           //execution de la requete
           $resultat = $Conn->query($sql);
           		//si la variable de session 'access' contient une valeur égale a 'OK'
           		if (isset($_SESSION['access']) && $_SESSION['access']='OK')
           		{	
           			//affichage du menu membre
           			echo '
           			<li><a href="achatscredits.php">Acheter des crédits</a></li>
           			<li><li><a href="achatimages.php">Acheter des images</a></li></li>
           			<li><a href="contacts.php">Nous contacter</a></li>
           			';
           		
           		}

				else 
					//sinon affichage du menu visiteur depuis la bdd
           			while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
               			echo'<li><a href="'.$ligne['lien'].'">'.$ligne['nomMenu'].'</a></li>';
           			}
           		
             ?>  
        </ul>
    </div>
    	<?php
    		//affichage d'un bouton deconnexion si la personne est connectée
   			if (isset($_SESSION['access']) && $_SESSION['access']='OK') {
  			echo' <a href="deconnexion.php">Deconnexion</a>';
		}
		?>
</head> 