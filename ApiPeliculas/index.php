<?php

include_once 'includes/apipeliculas.php';

$api = new Apipeliculas();

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(is_numeric($id)){
        $api->getById($_GET['id']);
    }else{
        $api->error('Id no es un número');
    }
}else{
    $api->getall();
}
