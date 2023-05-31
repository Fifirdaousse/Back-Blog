<?php

session_start();
require '../lib/article.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: login.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $article = read($id);
    var_dump($article);
}

// Vérifier si le formulaire de création d'article est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Effectuer la validation des données de l'article 
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $texte = $_POST['texte'];
    $description = $_POST['description'];
    $illustration = $_FILES['illustration'];
    $path_article = 'upload/' . $illustration['name'];

    update($id, $titre, $description, $texte, $path_article);

    // Déplacer l'image dans le dossier /article
    move_uploaded_file($illustration['tmp_name'], '../asset/upload/' . $illustration['name']);

    header("Location: ../index.php");
}

include '../view/article-edit.php';
