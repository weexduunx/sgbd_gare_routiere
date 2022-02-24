<?php
// Configuration de base
include_once "configuration/config.php";

// Définit le titre de la page
$page_title = "Connexion";
 
// inclure le vérificateur de connexion
$require_login=false;
include_once "verifconnex.php";
 
// Par défaut à False
$access_denied=false;
 
// Si le formulaire de connexion a été soumis
if($_POST){
    // j'inclus les classes
    include_once "configuration/bd.php";
    include_once "objets/utilisateur.php";
    
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
    
        // Si le niveau d'accès est «admin», rediriger vers la section administrative
        if($utilisateur->niveau_dacces=='Admin'){
            header("Location: {$home_url}admin/index.php?action=login_success");
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
include_once "entête.php";
 
echo "<div class='col-sm-6 col-md-4 col-md-offset-4'>";
 
    // Obtenez la valeur «Action» dans le paramètre URL pour afficher les messages d'invite correspondants
    $action=isset($_GET['action']) ? $_GET['action'] : "";
    
    // Dites à l'utilisateur qu'il n'est pas encore connecté
    if($action =='not_yet_logged_in'){
        echo "<div class='alert alert-danger margin-top-40' role='alert'>Veuillez vous connecters connecter.</div>";
    }
    
    // Dites à l'utilisateur de se connecter
    else if($action=='please_login'){
        echo "<div class='alert alert-info'>
            <strong>Veuillez vous connecter pour accéder à cette page.</strong>
        </div>";
    }
    
    // dire que l'utilisateur est vérifié
    else if($action=='email_verified'){
        echo "<div class='alert alert-success'>
            <strong>Votre adresse e-mail a été validée.</strong>
        </div>";
    }
    
    // Dites à l'utilisateur si l'accès est refusé
    if($access_denied){
        echo "<div class='alert alert-danger margin-top-40' role='alert'>
            Accès refusé.<br /><br />
            Votre nom d'utilisateur ou mot de passe semble être incorrect, Veuillez réessayer svp!!! 
        </div>";
    }
 
    // Formulaire de connexion HTML
    echo "<div class='account-wall'>";
        echo "<div id='my-tab-content' class='tab-content'>";
            echo "<div class='tab-pane active' id='login'>";
                echo "<img class='profile-img' src='images/login-icon.png'>";
               echo "<form class='form-signin' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                    echo "<input type='text' name='email' class='form-control' placeholder='Email' required autofocus />";
                    echo "<input type='password' name='password' class='form-control' placeholder='Mot de passe' required />";
                    echo "<input type='submit' class='btn btn-lg btn-primary btn-block' value='Se Connecter' />";
                echo "</form>";
            echo "</div>";
        echo "</div>";
    echo "</div>";
 
echo "</div>";
 
// footer HTML and JavaScript codes
include_once "pied.php";
?>