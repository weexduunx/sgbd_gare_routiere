<?php
    $action = $_REQUEST['action'];

    if (!empty($action)) {
        require_once 'includes/Assurance.php';
        $obj = new Assurance();
    }

    if ($action == 'addassurance' && !empty($_POST)) {
        $id_utilisateur = $_POST['id_utilisateur'];
        $type_assurance = $_POST['type_assurance'];
        $montant_assurance = $_POST['montant_assurance'];
        $debut_assurance = $_POST['debut_assurance'];
        $fin_assurance = $_POST['fin_assurance'];
        $duree_assurance = $_POST['duree_assurance'];
        $photo_assurance = $_FILES['photo_assurance'];
        $assuranceId = (!empty($_POST['id_assurance'])) ? $_POST['id_assurance'] : '';

        // Téléchargement du photo
        $imagename = '';
        if (!empty($photo['name'])) {
            $imagename = $obj->uploadPhoto($photo);
            $assuranceData = [
                'id_utilisateur' => $id_utilisateur,
                'type_assurance' => $type_assurance,
                'montant_assurance' => $montant_assurance,
                'debut_assurance' => $debut_assurance,
                'fin_assurance' => $fin_assurance,
                'duree_assurance' => $duree_assurance,
                'photo_assurance' => $imagename,
            ];
        } else {
            $assuranceData = [
                'id_utilisateur' => $id_utilisateur,
                'type_assurance' => $type_assurance,
                'montant_assurance' => $montant_assurance,
                'debut_assurance' => $debut_assurance,
                'fin_assurance' => $fin_assurance,
                'duree_assurance' => $duree_assurance,
                
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
