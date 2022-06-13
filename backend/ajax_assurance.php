<?php
    $action = $_REQUEST['action'];

    if (!empty($action)) {
        require_once 'includes/Assurance.php';
        $obj = new Assurance();
    }

    if ($action == 'addassurance' && !empty($_POST)) {
        $membre = $_POST['id_utilisateur'];
        $categorie = $_POST['categorie'];
        $matricule = $_POST['matricule'];
        $marque = $_POST['marque'];
        $type = $_POST['assurancetype'];
        $montant_assurance = $_POST['montant'];
        $debut_assurance = $_POST['datedebut'];
        $fin_assurance = $_POST['datefin'];
        $photo_assurance = $_FILES['photo_assurance'];
        $assuranceId = (!empty($_POST['id_assurance'])) ? $_POST['id_assurance'] : '';

        // Téléchargement du photo
        $imagename = '';
        if (!empty($photo['name'])) {
            $imagename = $obj->uploadPhoto($photo);
            $assuranceData = [
                'id_utilisateur' => $membre,
                'categorie' => $categorie,
                'matricule' => $matricule,
                'marque' => $marque,
                'assurancetype' => $type,
                'montant' => $montant_assurance,
                'datedebut' => $debut_assurance,
                'datefin' => $fin_assurance,
                'photo_assurance' => $imagename,
            ];
        } else {
            $assuranceData = [
                'selMembre' => $membre,
                'categorie' => $categorie,
                'matricule' => $matricule,
                'marque' => $marque,
                'assurancetype' => $type, 
                'montant' => $montant_assurance,
                'datedebut' => $debut_assurance,
                'datefin' => $fin_assurance,
                'photo_assurance' => $imagename,

                
            ];
        }

        if ($assuranceId) {
            $obj->update($assuranceData, $assuranceId);
        } else {
            $assuranceId = $obj->add($assuranceData);
        }

        if (!empty($assuranceId)) {
            $assurance = $obj->getRow('id_assurance', $assuranceId);
            echo json_encode($assurance);
            exit();
        }
    }

    if ($action == "getassurances") {
        $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $limit = 4;
        $start = ($page - 1) * $limit;

        $assurances = $obj->getRows($start, $limit);
        if (!empty($assurances)) {
            $assuranceslist = $assurances;
        } else {
            $assuranceslist = [];
        }
        $total = $obj->getCount();
        $assuranceArr = ['count' => $total, 'assurances' => $assuranceslist];
        echo json_encode($assuranceArr);
        exit();
    }

    if ($action == "getassurance") {
        $assuranceId = (!empty($_GET['id_assurance'])) ? $_GET['id_assurance'] : '';
        if (!empty($assuranceId)) {
            $assurance = $obj->getRow('id_assurance', $assuranceId);
            echo json_encode($assurance);
            exit();
        }
    }

    if ($action == "getmembres") {
        $utilisateurId = (!empty($_GET['id'])) ? $_GET['id'] : '';
        if (!empty($utilisateurId)) {
            $membre = $obj->getMembre('id', $utilisateurId);
            echo json_encode($membre);
            exit();
        }
    }

    if ($action == "deleteassurance") {
        $assuranceId = (!empty($_GET['id_assurance'])) ? $_GET['id_assurance'] : '';
        if (!empty($assuranceId)) {
            $isDeleted = $obj->deleteRow($assuranceId);
            if ($isDeleted) {
                $message = ['deleted' => 1];
            } else {
                $message = ['deleted' => 0];
            }
            echo json_encode($message);
            exit();
        }
    }

    if ($action == 'search') {
        $queryString = (!empty($_GET['searchQuery'])) ? trim($_GET['searchQuery']) : '';
        $results = $obj->recherche($queryString);
        echo json_encode($results);
        exit();
    }
