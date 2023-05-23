<?php

require '../lib/db.php';

if ($pdo->connect_error) {
    die("La connexion a échoué : " . $pdo->connect_error);
}

// Préparer la requête d'insertion avec des paramètres pour éviter les failles de sécurité
$sql = "INSERT INTO article (idUtilisateur, titre, texte, description, illustration)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $pdo->prepare($sql);
$stmt->bind_param("issss", $_SESSION['idUtilisateur'], $titre, $texte, $description, $illustration);

if ($stmt->execute()) {
    $message = "Article créé avec succès.";
} else {
    $message = "Erreur lors de la création de l'article : " . $stmt->error;
}

$stmt->close();
$pdo->close();




