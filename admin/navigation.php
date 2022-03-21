<div class="body-wrapper">
    <!--Debut Sidebar / aside -->
        <aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
            <div class="mdc-drawer__header">
                <a href="<?php echo $home_url; ?>admin/index.php" class="brand-logo">
                    <h4 class="text-center mdc-typography mdc-theme--light">SGBD <span>Bokk Yakaar</span></h4>
                    <!--<img src="../assets/images/logo.svg" alt="logo">-->
                </a>
            </div>
            <div class="mdc-drawer__content">
                <div class="user-info">
                    <p class="name"><?php echo $_SESSION['prenom']; ?> <?php echo $_SESSION['nom']; ?></p>
                    <p class="email"><?php echo $_SESSION['email']; ?></p>
                </div>
            <div class="mdc-list-group">
                <nav class="mdc-list mdc-drawer-menu">
                        <div class="mdc-list-item mdc-drawer-item">
                            <li <?php echo $page_title=="Admin Index" ? "class='active'" : ""; ?>>
                            <a class="mdc-drawer-link" href="<?php echo $home_url; ?>admin/index.php">
                                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">home</i> Dashboard
                            </a>
                            </li>
                        </div>
                    
                    <div class="mdc-list-item mdc-drawer-item">
                        <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="ui-sub-menu">
                            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">folder_special</i> Gestion Membres
                            <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                        </a>
                        
                        <div class="mdc-expansion-panel" id="ui-sub-menu">
                            <nav class="mdc-list mdc-drawer-submenu">
                                
                                <div class="mdc-list-item mdc-drawer-item">
                                    <li <?php echo $page_title=="Utilisateurs" ? "class='active'" : ""; ?> >
                                        <a class="mdc-drawer-link" href="<?php echo $home_url; ?>admin/listeUtilisateur.php">
                                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">
                                        list
                                        </i>
                                        Listes
                                        </a>
                                    </li>
                                </div>
                                
                                <div class="mdc-list-item mdc-drawer-item">
                                
                                    <a class="mdc-drawer-link" href="#">
                                    <i class="fcfa-icon fcfa-2x mdc-list-item__start-detail mdc-drawer-item-icon"> </i>
                                        Cotisation
                                    </a>
                                </div>
                                <div class="mdc-list-item mdc-drawer-item">
                                    <a class="mdc-drawer-link" href="#">
                                    <i class="fcfa-icon fcfa-2x mdc-list-item__start-detail mdc-drawer-item-icon"> </i>
                                        Paiement
                                    </a>
                                </div>
                                <div class="mdc-list-item mdc-drawer-item">
                                    <a class="mdc-drawer-link" href="#">
                                        Commande
                                    </a>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="mdc-list-item mdc-drawer-item">
                        <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="sous_menu1">
                            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">folder_special</i> Assurance
                            <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                        </a>
                        <div class="mdc-expansion-panel" id="sous_menu1">
                            <nav class="mdc-list mdc-drawer-submenu">
                                <div class="mdc-list-item mdc-drawer-item">
                                    <a class="mdc-drawer-link" href="#">
                                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">
                                        add_circle
                                        </i>
                                        Ajouter
                                    </a>
                                </div>
                                <div class="mdc-list-item mdc-drawer-item">
                                    <a class="mdc-drawer-link" href="listeAssurance.php">
                                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">
                                            list
                                        </i>
                                        liste
                                    </a>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="mdc-list-item mdc-drawer-item">
                        <a class="mdc-drawer-link" href="#">
                            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">directions_car</i>Gestion des véhicules
                        </a>
                    </div>
                  
                    <div class="mdc-list-item mdc-drawer-item">
                        <a class="mdc-drawer-link" href="#" target="_blank">
                            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">description</i> Rapports
                        </a>
                    </div>
                </nav>
                </div>
                    <div class="profile-actions">
                        <!-- <a href="javascript:;">Paramétres</a> -->
                        <span class="divider"></span>
                        <a href="<?php echo $home_url; ?>deconnexion.php">Se déconnecter</a>
                    </div> 
            </div>
        </aside>
    <!-- Fin Sidebar / aside -->
            <!--Debut Emballage Principal -->
                <div class="main-wrapper mdc-drawer-app-content bg-white">
                    <!--Debut Header/Navbar  -->
                        <header class="mdc-top-app-bar bg-white">
                            <div class="mdc-top-app-bar__row">
                                <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
                                    <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>
                                    <span class="mdc-top-app-bar__title">Bienvenue <?php echo $_SESSION['prenom']; ?>!</span>
                                    <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon search-text-field d-none d-md-flex">
                                        <i class="material-icons mdc-text-field__icon">search</i>
                                        <input class="mdc-text-field__input" id="searchinput">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label for="text-field-hero-input" class="mdc-floating-label">Rechercher..</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
                                    <div class="menu-button-container menu-profile d-none d-md-block">
                                        <button class="mdc-button mdc-menu-button">
                                            <span class="d-flex align-items-center">
                                                <span class="figure">
                                                    <!-- <img src="../assets/images/login-icon.png" alt="user" class="user"> -->
                                                    <img src="uploads/<?php echo $_SESSION['photo'];?>" alt="user" class="user" width="25">
                                                </span>
                                                <span class="user-name">
                                                    <?php echo $_SESSION['prenom']; ?> <?php echo $_SESSION['nom']; ?>
                                                </span>
                                            </span>
                                        </button>
                                        <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                                            <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                                                <li class="mdc-list-item" role="menuitem">
                                                    <div class="item-thumbnail item-thumbnail-icon-only">
                                                        <i class="mdi mdi-account-edit-outline text-primary"></i>
                                                    </div>
                                                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                                        <h6 class="item-subject font-weight-normal">Editer le profil</h6>
                                                    </div>
                                                </li>
                                                <li class="mdc-list-item" role="menuitem">
                                                    <div class="item-thumbnail item-thumbnail-icon-only">
                                                        <i class="mdi mdi-settings-outline text-primary"></i>
                                                    </div>
                                                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                                        <h6 class="item-subject font-weight-normal">
                                                            <a href="<?php echo $home_url; ?>deconnexion.php">Se déconnecter</a>
                                                        </h6>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="divider d-none d-md-block"></div>
                                    <div class="menu-button-container d-none d-md-block">
                                        <button class="mdc-button mdc-menu-button">
                                            <i class="mdi mdi-arrow-right-bold-box"></i>
                                        </button>
                                        <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                                            <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                                                <li class="mdc-list-item" role="menuitem">
                                                    <div class="item-thumbnail item-thumbnail-icon-only">
                                                        <i class="mdi mdi-logout-variant text-primary"></i>
                                                    </div>
                                                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                                        <h6 class="item-subject font-weight-normal">
                                                            <a href="<?php echo $home_url; ?>deconnexion.php">Se déconnecter</a>
                                                        </h6>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>
                    <!--Fin Header/Navbar -->
                    <!--Debut Emballage secondaire -->
                        <div class="page-wrapper mdc-toolbar-fixed-adjust">
                            <?php echo'<h1><?php echo isset($page_title) ? $page_title : "Gestion Bokk Yakaar"; ?></h1>';?>
                           <!--Debut principal conteneur -->
                                <main class="content-wrapper bg-white">