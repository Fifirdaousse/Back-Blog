<?php

require 'db.php';

$pdo = getPDO();

// Requête SQL pour vérifier les identifiants de l'utilisateur
$sql = "SELECT * FROM utilisateur WHERE email = '$identifiant' AND motDePasse = '$mdp'";
$stmt = $pdo->query($sql);
$stmt->execute();

if ($stmt->rowCount() === 1) {
    session_start();
    // Authentification réussie, enregistrer l'utilisateur dans la session
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['utilisateur_id'] = $utilisateur['id'];
    $_SESSION['prenom'] = $utilisateur['prenom'];
    header("Location: ../index.php"); // Rediriger vers la page d'accueil ou toute autre page après la connexion
} else {
    $message = "Identifiant ou mot de passe incorrect.";
}


