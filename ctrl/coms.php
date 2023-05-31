<?php
session_start();
require("../lib/coms.php");


// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: login.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

// $com = ad

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idUtilisateur = $_SESSION['utilisateur_id'];
    $texte = $_POST['com'];
    $texte = $_POST['texte'];

     addCom($idUtilisateur, $texte, $idArticle);

        if ($success) {
            header("Location: article-details.php?id=" . $idArticle);
            exit;
        } else {
            echo "Utilisateur introuvable ou article inexistant.";
        }
    } 


include '../view/article-detail.php';
