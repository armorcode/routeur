<?php

include 'config.php';



function fruitsList(){
    global $bdd;
    $req=$bdd->query('SELECT * FROM fruits');

    $fruits=$req->fetchAll();
    
    return $fruits;
}

function fruitsAdd(){
    
}

function fruitsDelete(){

}

function fruitsExist($fruit){
    global $bdd;
    $req=$bdd->prepare('SELECT * FROM fruits WHERE nom=?');
    $req->execute(array($fruit));
    $result=$req->fetchAll();
    if (count($result)>0) {
        return true;
    }else{
        return false;
    }



}
