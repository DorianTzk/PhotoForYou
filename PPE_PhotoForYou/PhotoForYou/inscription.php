<?php
include ('include/entete.php');
?>
<!--
sworm, a free CSS web template by ZyPOP (zypopwebtemplates.com/)

Download: http://zypopwebtemplates.com/

License: Creative Commons Attribution

//-->

<body>
    
    <div id="body">
		<div id="content">
			<h2>Incription</h2>

                <p>Veuillez vous incrire ci-dessous</p>   
               
                <!--Formulaire d'insription-->
                <form method="post" action="resultat.php">
                    <label>Prénom</label><br/>
                    <input type="text" name="prenom" />
                    
                    <br/>
                                        
                    <label>Nom</label><br/>
                    <input type="text" name="nom" />
                    
                    <br/>
                    
                    <label for="type">Type</label><br/>
                    <select name="type" id="type">
                        <option value="Client">Client</option>
                        <option value="Photographe">Photographe</option>
                    </select>
                    
                    <br/>
                    
                    <label>Nom d'utilisateur souhaité</label><br/>
                    <p><input type="text" name="pseudo" /> Uniquement des lettres et des chiffres</p>
                    
                    <br/>
                    
                    <label>Adresse e-mail</label><br/>
                    <input type="email" name="email" />
                    
                    <br/>
                    
                    <label>Mot de passe</label><br/>
                    <p><input type="password" name="password" /> Entre 6 et 20 caractere, avec au moins une minuscule, une majuscule et un chiffre</p>
                
                    <!--Bouton envoyer-->
                    <label>Confirmer mot de passe</label><br/>
                    <input type="password" name="verifpassword" />
                    
                    <br/>
                    
                    <input type="submit" value="Continuer" />

                    
                </form>
                <br/>
                
            </div>              
    <div class="clear"></div>
    </div>
    <?php
    include ('include/pieddepage.php');
    ?>
</div>

</body>
</html>
