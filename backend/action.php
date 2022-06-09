<?php

    require_once 'includes/Database.php';

    $db = new Database();
    if(isset($_POST['action']) && $_POST['action'] == 'viewAssurance'){
        $output = '';
        $data = $db->lecture("SELECT * FROM assurance");
        print_r($data);
    }





?>