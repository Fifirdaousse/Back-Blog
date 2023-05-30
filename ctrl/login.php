<?php

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['utilisateur_id'])) {
    header("Location: index.php"); // Rediriger vers la page d'accueil ou toute autre page après la connexion
    exit();
}

// Vérifier si le formulaire de connexion est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Effectuer la validation des identifiants (assurez-vous d'adapter cette étape à votre système d'authentification)
    $identifiant = $_POST['email'];
    $mdp = $_POST['mdp'];

require '../lib/login.php';

}

include '../view/login-view.php';