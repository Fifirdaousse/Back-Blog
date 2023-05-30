<?php
session_start();

require "../lib/user.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Effectuer la validation des données de l'article 
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = $_POST['motDePasse'];


createUser($nom, $prenom, $email, $mdp);

echo "Inscription réussie";
header("Location: ../index.php");
}

include "../view/sign-up.php";
