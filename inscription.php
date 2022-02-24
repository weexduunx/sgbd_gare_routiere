<?php
   // Configuration de base
    include_once "configuration/config.php";
    
    // Définir le titre de la page
    $page_title = "Inscription";
    
    // inclure le vérificateur de connexion
    include_once "verifconnex.php";
    
    // inclure une classe, un objet et une configuration
    include_once 'configuration/bd.php';
    include_once 'objets/utilisateur.php';
    include_once "class/php/utile.php";
    
    // Inclure l'en-tête de page HTML
    include_once "entête.php";
    
    echo "<div class='col-md-12'>";
    
       // Si le formulaire a été posté
        if($_POST){
        
            // Obtenir la connexion à la base de données
            $basededonnee = new Basededonnee();
            $db = $basededonnee->connectBD();
        
            // initialiser les objets
            $utilisateur = new Utilisateur($db);
            $utile = new Utile();
        
            // Définir l'e-mail utilisateur pour détecter s'il existe déjà
            $utilisateur->email=$_POST['email'];
        
            // Vérifiez si l'email existe déjà
            if($utilisateur->emailExists()){
                echo "<div class='alert alert-danger'>";
                    echo "L'e-mail que vous avez spécifié est déjà enregistré. S'il vous plaît essayez à nouveau ou <a href='{$home_url}login'>se connecter.</a>";
                echo "</div>";
            }
        
            else{
                // Définition des valeurs sur les propriétés de l'objet
                $utilisateur->prenom=$_POST['prenom'];
                $utilisateur->nom=$_POST['nom'];
                $utilisateur->tel=$_POST['tel'];
                $utilisateur->adresse=$_POST['adresse'];
                $utilisateur->password=$_POST['password'];
                $utilisateur->niveau_dacces='Customer';
                $utilisateur->status=1;
                
                // Créer l'utilisateur
                if($utilisateur->creer()){
                
                    echo "<div class='alert alert-info'>";
                        echo "Enregistré avec succès. <a href='{$home_url}login'>Veuillez vous connecter</a>.";
                    echo "</div>";
                
                    // Valeurs affichées
                    $_POST=array();
                
                }else{
                    echo "<div class='alert alert-danger' role='alert'>Impossible de s'inscrire. Veuillez réessayer.</div>";
                }
            }
        }
?>
    <form action='inscription.php' method='post' id='register'>
    
        <table class='table table-responsive'>
    
            <tr>
                <td class='width-30-percent'>Prenom</td>
                <td><input type='text' name='prenom' class='form-control' required value="<?php echo isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom'], ENT_QUOTES) : "";  ?>" /></td>
            </tr>
    
            <tr>
                <td>Nom</td>
                <td><input type='text' name='nom' class='form-control' required value="<?php echo isset($_POST['nom']) ? htmlspecialchars($_POST['nom'], ENT_QUOTES) : "";  ?>" /></td>
            </tr>
    
            <tr>
                <td>N° Téléphone</td>
                <td><input type='text' name='tel' class='form-control' required value="<?php echo isset($_POST['tel']) ? htmlspecialchars($_POST['tel'], ENT_QUOTES) : "";  ?>" /></td>
            </tr>
    
            <tr>
                <td>Adresse</td>
                <td><textarea name='adresse' class='form-control' required><?php echo isset($_POST['adresse']) ? htmlspecialchars($_POST['adresse'], ENT_QUOTES) : "";  ?></textarea></td>
            </tr>
    
            <tr>
                <td>Email</td>
                <td><input type='email' name='email' class='form-control' required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" /></td>
            </tr>
    
            <tr>
                <td>Mot de passe</td>
                <td><input type='password' name='password' class='form-control' required id='passwordInput'></td>
            </tr>
    
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span> S'inscrire
                    </button>
                </td>
            </tr>
    
        </table>
    </form>
<?php
    
    echo "</div>";
    
    // Inclure le pied de page HTML
    include_once "pied.php";
?>