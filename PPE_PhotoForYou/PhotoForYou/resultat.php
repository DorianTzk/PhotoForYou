<?php
include ('include/entete.php');
?>
<body> 
    
    <div id="body">
		<div id="content">
			
 <?php
                if (!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['type']) AND !empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['verifpassword'])) //Verifie que chaque champs soit remplis
                {
                    if ($_POST['password']==$_POST['verifpassword']) //Verifie que les deux mots de passe sont les mêmes
                    {
                        if (strlen($_POST['password'])>=6 and strlen($_POST['password'])<=20 and preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])#', $_POST['password'])) //Verifie la longueur du mot de passe ainsi que le respect des critères
                            {
                            if (!preg_match("#^(?=.*[a-z])#", $_POST['pseudo']) and strlen($_POST['pseudo'])>=3)// Verifie les caractères et la longeur du nom utilisé
                            {
                            ?>
                            <!--Si le nom n'est pas conforme-->
                            <h2>Nom d'utilisateur invalide</h2>
                            <p>Le nom d'utilisateur souhaité que vous voulez rentrer est invalide, il doit contenir plus de 3 caractères dont une minuscule</p>  
                            <a href="inscription.php">Retour au formulaire</a>
                            <?php
                            }
                                else
                                {
                                //Verfie si l'email n'est pas déjà dans la base de données
                                $req = $Conn->prepare('SELECT email FROM users WHERE email = :Verifemail');
                                $req->execute(array('Verifemail' => $_POST['email']));
                            
                                $ex_email=FALSE;
                            
                                  	while ($Verif = $req->fetch())
                                    {
                                        $ex_email=true;
                                    }
                                   		if ($ex_email==true)
                                    	{
                                    	?>
                                   		<!--Si le mail existe déja alors il affiche ceci-->
                                        	<h2>Votre email existe deja</h2>
                                        	<p>Un compte a déja était crée avec cet email, veuillez vous inscrire avec un autre email</p>  
                                       		<a href="inscription.php">Retour au formulaire</a>
                                    	<?php
                                     }
                                     //Si le mail n'existe pas alors l'ajout se fait dans la base de données
                                     else if ($ex_email==false)
                                     {
                                     $req_inscription = $Conn->prepare('INSERT INTO USERS(prenom, nom, type, pseudo, email, motdepasse)
                                     									VALUES(:prenom, :nom, :type, :pseudo, :email, :password)');
                                     $req_inscription->execute(array(
                                     'prenom' => htmlspecialchars($_POST['prenom']),
                                     'nom' => htmlspecialchars($_POST['nom']),
                                     'type' => htmlspecialchars($_POST['type']),
                                     'pseudo' => htmlspecialchars($_POST['pseudo']),
                                     'email' => htmlspecialchars($_POST['email']),
                                     'password' => htmlspecialchars($_POST['password']),
                                     ));
                                     ?>
                                         <!--Affichage d'un message de confirmation quand tout est bon-->
                                         <h2>Enregistrement effectué avec succès</h2>
                                         <p>Félicitation, vous êtes enregistré avec succès.</p>
                                         <a href="index.php">Retour à l'accueil</a>
                                     <?php  
                                     }
                                     else
                                     {
                                         ?>  <!--Sinon il affiche un message d'erreur-->  
                                             <h2>Erreur lors de l'incription</h2>
                                             <p>Une erreur s'est produite lors de l'inscription. Veuillez recommencer, si le probleme persiste merci de contacter l'administrateur</p>  
                                             <a href="inscription.php">Retour au formulaire</a>
                                          <?php
                                     }
                                  }
                                }
                                else
                                {
                                  ?><!--Affiche ce message si la taille du mot de passe est trop long ou trop petit, ou ne correspond pas aux critères-->
                                      <h2>Mot de passe incorrect</h2>
                                      <p>Veuillez verifier la taille de votre mot de passe qui doit être de 6 à 20 caractères et qu'il contient un lettre minuscule, majuscule et un chiffre</p>  
                                      <a href="inscription.php">Retour au formulaire</a>
                                  <?php
                                 }
                             }
                             else
                             {
                                ?>
                                    <!--Affiche ce message si le premier mot de passe ne correspond pas au deuxieme mot de passe de vérification-->
                                    <h2>Mot de passe incorrect</h2>
                                    <p>Le deuxieme mot de passe ne correspond pas au premier mot de passe veuillez resaisir votre mot de passe</p>  
                                    <a href="inscription.php">Retour au formulaire</a>
                                <?php
                             }           
                        }
                        else
                        {
                            ?>
                                <!--Si erreur (ex: champs non remplis) dans la saisie alors il affiche ceci-->
                                <h2>Erreur dans la saisie</h2>
                                <br/>
                                <p>Veuillez indiquez votre prénom !</p>   
                                <br/>
                                <p>Veuillez indiquez votre nom de famille !</p>
                                <br/>
                                <p>Veuillez indiquez votre pseudo !</p>
                                <br/>
                                <p>Veuillez indiquez votre e-mail correcte !</p>
                                <br/>
                                <p>Veuillez entrez un mot de passe !</p>
                                <br/>
                                <a href="inscription.php">Retour au formulaire</a>
                            <?php
                        }
                        ?>
                </div>             
    <div class="clear"></div>
    </div>
    <?php
    include ('include/pieddepage.php');
    ?>
</div>

</body>
</html>
