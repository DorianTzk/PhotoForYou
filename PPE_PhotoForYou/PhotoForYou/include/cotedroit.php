<div class="sidebar">
            <?php
            //si la variable access est déclarée et contient la valeur 'OK', donc que l'utilisateur est connecté, affichage du menu a droite
            if (isset($_SESSION['access']) && $_SESSION['access']='OK') {
                echo '
                <ul>    
               <li>
                    <h3>Navigate</h3>
                    <ul class="blocklist">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="examples.html">Examples</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Solutions</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </li>
            </div>';
            }
            //sinon affichage du menu de connexion
            else{
                
                echo'
                <form method="post" action="traitement.php">
                    <p>
                        <label>Adresse Mail :</label> 
                        <input type="text" name="mail" />
                        <label>Mot de Passe :</label> 
                        <input type="password" name="passe" />
                        <div class="clear"></div>
                        <input href="traitement.php" type="submit" value="Login" name="login" />
                    
                    </p>
                </form>
            </div>';
            }
            ?> 