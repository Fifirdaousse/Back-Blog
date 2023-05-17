<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['idUtilisateur'])) {
    header("Location: login.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

// Vérifier si le formulaire de création d'article est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Effectuer la validation des données de l'article (assurez-vous d'adapter cette étape à vos besoins)
    $titre = $_POST['titre'];
    $texte = $_POST['texte'];
    $description = $_POST['description'];


    // Vérifier les informations de connexion à la base de données (assurez-vous de remplacer les informations de connexion appropriées)
    $host = '127.0.0.1';
    $dbname = '520_fc';
    $user = 'root';
    $password = '';

    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Préparer la requête d'insertion avec des paramètres pour éviter les failles de sécurité
    $sql = "INSERT INTO article (idUtilisateur, titre, texte, description, illustration)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $_SESSION['idUtilisateur'], $titre, $texte, $description, $illustration);

    if ($stmt->execute()) {
        $message = "Article créé avec succès.";
    } else {
        $message = "Erreur lors de la création de l'article : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

include '../view/article-display.php';

