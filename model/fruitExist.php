<?php

include 'config.php';
    $myRep = array();

    $req=$bdd->prepare('SELECT * FROM fruits WHERE nom=?');
    $req->execute(array($_GET['fruit']));
    $result=$req->fetchAll();
    if (count($result)>0) {
        array_push($myRep,'true');
        echo json_encode($myRep);
    }else{
        array_push($myRep,'false');
        echo json_encode($myRep);
    }



