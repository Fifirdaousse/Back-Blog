<?php

session_start();
require '../lib/article.php';

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $article = read($id);
    // var_dump($article);
}

// Vérifier si le formulaire de création d'article est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Effectuer la validation des données de l'article 
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $texte = $_POST['texte'];
    $description = $_POST['description'];
    $illustration = $_FILES['illustration'];

    $article = read($id);

}

require("../lib/coms.php");

$listCom = readCom($id);

var_dump($listCom);

include '../view/article-detail.php';