<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['idUtilisateur'])) {
    header("Location: login.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

// Vérifier si le formulaire de création d'article est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Effectuer la validation des données de l'article 
    $titre = $_POST['titre'];
    $texte = $_POST['texte'];
    $description = $_POST['description'];

require '../lib/article-add.php';

}


include '../view/article-add.php';