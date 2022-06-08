<?php
// Configuration de base
include_once "frontend/configuration/config.php";

// Définit le titre de la page
$page_title = "Connexion";
 
// inclure le vérificateur de connexion
$require_login=false;
include_once "frontend/include/verifconnex.php";
 
// Par défaut à False
$access_denied=false;
 
// Si le formulaire de connexion a été soumis
if($_POST){
    // j'inclus les classes
    include_once "frontend/configuration/bd.php";
    include_once "frontend/objets/utilisateur.php";
    
    // Obtenir la connexion de base de données
    $basededonnee = new Basededonnee();
    $db = $basededonnee->connectBD();
    
    // initialiser les objets
    $utilisateur = new Utilisateur($db);
    
    // Vérifiez si le courrier électronique et le mot de passe sont dans la base de données
    $utilisateur->email=$_POST['email'];
    
    // Vérifiez si le courrier électronique existe, obtenez également des informations utilisateur à l'aide de cette méthode de messagerie électronique emailExists()
    $email_exists = $utilisateur->emailExists();
    
        // Valider la connexion
    if ($email_exists && password_verify($_POST['password'], $utilisateur->password) && $utilisateur->status==1){
    
        // Si c'est le cas, définissez la valeur de la session sur true
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $utilisateur->id;
        $_SESSION['niveau_dacces'] = $utilisateur->niveau_dacces;
        $_SESSION['prenom'] = htmlspecialchars($utilisateur->prenom, ENT_QUOTES, 'UTF-8') ;
        $_SESSION['nom'] = $utilisateur->nom;
        $_SESSION['email'] = $utilisateur->email;
        $_SESSION['photo'] = $utilisateur->photo;
    
        // Si le niveau d'accès est «admin», rediriger vers la section administrative
        if($utilisateur->niveau_dacces=='Admin'){
            header("Location: {$home_url}backend/index.php?action=login_success");
        }
    
        // sinon, rediriger uniquement la section «client»
        else{
            header("Location: {$home_url}index.php?action=login_success");
        }
    }
    
    // Si le nom d'utilisateur n'existe pas ou le mot de passe est faux
    else{
        $access_denied=true;
    }
}
 
// Inclure l'en-tête de page HTML
include_once "frontend/include/entêtelogin.php";
  
    // Obtenez la valeur «Action» dans le paramètre URL pour afficher les messages d'invite correspondants
    $action=isset($_GET['action']) ? $_GET['action'] : "";
    
    // Dites à l'utilisateur qu'il n'est pas encore connecté
    if($action =='not_yet_logged_in'){
        echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
        Veuillez connecter svp!.
        <button type='button' class='btn-close' data-coreui-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
   
    // Dites à l'utilisateur de se connecter
    else if($action=='please_login'){
        echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
            <strong>Veuillez vous connecter pour accéder à cette page.</strong>
            <button type='button' class='btn-close' data-coreui-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    
    // dire que l'utilisateur est vérifié
    else if($action=='email_verified'){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
           <strong>Votre adresse e-mail a été validée.</strong>
            <button type='button' class='btn-close' data-coreui-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
   
    // Dites à l'utilisateur si l'accès est refusé
    if($access_denied){
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Accès refusé</strong><br>
            Veuillez réessayer, l'email ou le mot de passe est incorrect!!! 
            <button type='button' class='btn-close' data-coreui-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
 
    // Formulaire de connexion HTML
    
    /**echo "<img class='profile-img' src='images/login-icon.png' width='50' height='50'>";*/
    echo "<form class='form-signin' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
        echo '<div class="mdc-layout-grid">';
            echo '<div class="mdc-layout-grid__inner">';
                echo '<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">';
                    echo '<div class="mdc-text-field w-100">';
                           echo '<input class="mdc-text-field__input" name="email" id="text-field-hero-input" required autofocus>';
                           echo '<div class="mdc-line-ripple"></div>';
                           echo '<label for="text-field-hero-input" class="mdc-floating-label">Email</label>';
                    echo '</div>';
                echo '</div>';
                echo '<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">';
                    echo '<div class="mdc-text-field w-100">';
                            echo '<input class="mdc-text-field__input" name="password" type="password" id="text-field-hero-input" required>';
                            echo '<div class="mdc-line-ripple"></div>';
                            echo '<label for="text-field-hero-input" class="mdc-floating-label">Mot de Passe</label>';
                    echo '</div>';
                echo'</div>';
                echo'<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">';
                    echo '<div class="mdc-form-field">';
                        echo '<div class="mdc-checkbox">';
                            echo '<input type="checkbox" class="mdc-checkbox__native-control" id="checkbox-1" />';
                            echo '<div class="mdc-checkbox__background">';
                                echo '<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">';
                                    echo '<path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>';
                                echo '</svg>';
                                echo '<div class="mdc-checkbox__mixedmark"></div>';
                            echo '</div>';
                        echo '</div>';
                        echo '<label for="checkbox-1">Se souvenir</label>';
                    echo '</div>';
                echo '</div>';
                echo '<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop d-flex align-items-center justify-content-end">';
                    echo '<a href="#">Mot de passe oublié</a>';
                echo '</div>';
                echo '<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">';
                    echo "<input type='submit' class='mdc-button mdc-button--raised w-100' value='Se Connecter' />";
                echo '</div>';
                
            echo "</div>";
        echo "</div>";
    echo "</form>";

 
// footer HTML and JavaScript codes
include_once "frontend/include/piedlogin.php";
?>