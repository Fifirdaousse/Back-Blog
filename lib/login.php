<?php

require '../lib/db.php';

if ($pdo->connect_error) {
    die("La connexion a échoué : " . $pdo->connect_error);
}

// Requête SQL pour vérifier les identifiants de l'utilisateur
$sql = "SELECT * FROM utilisateur WHERE email = '$identifiant' AND motDePasse = '$mdp'";
$result = $pdo->query($sql);

if ($result->num_rows == 1) {
    // Authentification réussie, enregistrer l'utilisateur dans la session
    $utilisateur = $result->fetch_assoc();
    $_SESSION['idUtilisateur'] = $utilisateur['id'];
    $_SESSION['prenom'] = $utilisateur['prenom'];
    header("Location: ../index.php"); // Rediriger vers la page d'accueil ou toute autre page après la connexion
    exit();
} else {
    $message = "Identifiant ou mot de passe incorrect.";
}


