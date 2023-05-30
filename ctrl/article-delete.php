<?php
session_start();

require '../lib/article.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: login.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

// Vérifier si le formulaire de suppression d'article est soumis
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Effectuer la validation des données de l'article
    $id = $_GET['id'];

    delete($id);
}

header("Location: ../view/article-delete.php");