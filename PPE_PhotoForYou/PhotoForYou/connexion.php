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
            <h3>Veuillez vous connecter pour consulter votre compte ainsi que notre catalogue :</h3>
            <br/>
                <!-- formulaire de connexion -->
            <form method="post" action="traitement.php">
                    <p>
                        <label>Adresse Mail :</label> 
                        <br/>
                        <input type="text" name="mail" />
                        <br/>
                        <label>Mot de Passe :</label> 
                        <br/>
                        <input type="password" name="passe" />
                        <br/>
                        <div class="clear"></div>
                        <input href="traitement.php" type="submit" value="Login" name="login" />
                    
                    </p>
                </form>

        </div>
               
    <div class="clear"></div>
    </div>
    <?php
    include ('include/pieddepage.php');
    ?>
</div>

</body>
</html>
