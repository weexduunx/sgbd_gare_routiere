<?php
$action = $_REQUEST['action'];

if (!empty($action)) {
    require_once '../includes/membre.php';
    $obj = new Player();
}

if ($action == 'adduser' && !empty($_POST)) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $photo = $_FILES['photo'];
    $adresse = $_POST['adresse'];
    $numpermis = $_POST['numpermis'];
    $cin = $_POST['cin'];
    $playerId = (!empty($_POST['id'])) ? $_POST['id'] : '';

    // Téléchargement du photo
    $imagename = '';
    if (!empty($photo['name'])) {
        $imagename = $obj->uploadPhoto($photo);
        $playerData = [
            'prenom' => $prenom,
            'nom' => $nom,
            'email' => $email,
            'tel' => $tel,
            'cin' => $cin,
            'numpermis' => $numpermis,
            'adresse' => $adresse,
            'photo' => $imagename,
        ];
    } else {
        $playerData = [
            'prenom' => $prenom,
            'nom' => $nom,
            'email' => $email,
            'tel' => $tel,
            'cin' => $cin,
            'numpermis' => $numpermis,
            'adresse' => $adresse,           
            'photo' => $imagename,
            
        ];
    }

    if ($playerId) {
        $obj->update($playerData, $playerId);
    } else {
        $playerId = $obj->add($playerData);
    }

    if (!empty($playerId)) {
        $player = $obj->getRow('id', $playerId);
        echo json_encode($player);
        exit();
    }
}

if ($action == "getusers") {
    $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $limit = 4;
    $start = ($page - 1) * $limit;

    $players = $obj->getRows($start, $limit);
    if (!empty($players)) {
        $playerslist = $players;
    } else {
        $playerslist = [];
    }
    $total = $obj->getCount();
    $playerArr = ['count' => $total, 'players' => $playerslist];
    echo json_encode($playerArr);
    exit();
}

if ($action == "getuser") {
    $playerId = (!empty($_GET['id'])) ? $_GET['id'] : '';
    if (!empty($playerId)) {
        $player = $obj->getRow('id', $playerId);
        echo json_encode($player);
        exit();
    }
}

if ($action == "deleteuser") {
    $playerId = (!empty($_GET['id'])) ? $_GET['id'] : '';
    if (!empty($playerId)) {
        $isDeleted = $obj->deleteRow($playerId);
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
    $results = $obj->searchPlayer($queryString);
    echo json_encode($results);
    exit();
}
