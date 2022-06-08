<!-- navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
 
        <div class="navbar-header">
           <!-- Pour activer la liste déroulante de la navigation lors de la visualisation dans le périphérique mobile -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="<?php echo $home_url; ?>">BOKK YAKAAR</a>
        </div>
 
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <!-- Lien vers la page "Panier", mettez en surbrillance si la page actuelle est CART.PHP -->
                <li <?php echo $page_title=="Index" ? "class='active'" : ""; ?>>
                    <a href="<?php echo $home_url; ?>">Accueil</a>
                </li>
            </ul>
 
            <?php
                // Vérifiez si les utilisateurs / client ont été connectés
                // Si l'utilisateur a été connecté, affichez "Modifier le profil", "Commandes" et "Déconnexion".
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['niveau_dacces']=='Customer'){
            ?>
            <ul class="nav navbar-nav navbar-right">
                <li <?php echo $page_title=="Modifier le Profil" ? "class='active'" : ""; ?>>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <?php echo $_SESSION['prenom']; ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo $home_url; ?>deconnexion.php">Se deconnecter</a></li>
                    </ul>
                </li>
            </ul>
            <?php
            }
    
            // Si l'utilisateur n'était pas connecté, affichez les options "Connexion" et "Enregistrer"
            else{
            ?>
            <ul class="nav navbar-nav navbar-right">
                <li <?php echo $page_title=="Connexion" ? "class='active'" : ""; ?>>
                   <a href="<?php echo $home_url; ?>login">
                        <span class="glyphicon glyphicon-log-in"></span> Se connecter
                    </a>
                </li>
          
                <li <?php echo $page_title=="Inscription" ? "class='active'" : ""; ?>>
                    <a href="<?php echo $home_url; ?>inscription">
                        <span class="glyphicon glyphicon-check"></span> S'inscrire
                    </a>
                </li>
            </ul>
            <?php
            }
            ?>
 
        </div><!--/.nav-collapse -->
 
    </div>
</div>
<!-- /navbar -->