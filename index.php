<?php
include 'controller/controller.php';

$page = $_GET['page'];

switch ($page) {
    case 'accueil':
        include 'view/accueil.php';

        break;
    case 'fruits':

        $tabFruits = fruitsList();
        include 'view/fruits.php';

        break;
    case 'ajax':

        include 'view/formold.php';

        break;

    case 'cat':

        include 'view/cat.php';

        break;

    default:
        # code...
        break;
}