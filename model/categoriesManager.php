<?php

include 'config.php';
if (isset($_GET['action'])){
    $action = $_GET['action'];
    switch ($action) {
        case 'maj':
            catList();
    
        default:
            # code...
            break;
    }
}


function catList(){
    global $bdd;
    $req=$bdd->query('SELECT * FROM categories');
    $cats=$req->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($cats);
}

function catExist($cat){
    global $bdd;
    $req=$bdd->prepare('SELECT * FROM categories WHERE nom=?');
    $req->execute(array($cat));
    $result=$req->fetchAll();
    if (count($result)>0) {
        return true;
    }else{
        return false;
    }



}
