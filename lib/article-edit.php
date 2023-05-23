<?php

require '../lib/db.php';

// // Vérifier si l'utilisateur est connecté
// if (!isset($_SESSION['idUtilisateur'])) {
//     header("Location: login.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
//     exit();
// }

// // Vérifier si l'identifiant de l'article est passé en parametre d'URL
// if (!isset($_GET['id'])) {
//     header("Location: article-list.php"); // Rediriger vers la liste des articles si l'identifiant n'est pas spécifié
//     exit();
// }
// $article_id = $_GET['id'];

// // Vérifier si le formulaire de modification d'article est soumis
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Effectuer la validation des données de l'article 
//     $titre = $_POST['titre'];
//     $texte = $_POST['texte'];
//     $description = $_POST['description'];


//     // Vérifier les informations de connexion à la base de données 
//     $host = '127.0.0.1';
//   $dbname = '520_fc';
//   $user = 'root';
//   $password = '';

//   $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//   $sql = "UPDATE article SET titre = :titre, description = :description, texte = :texte WHERE id = :id";
//   $stmt = $conn->prepare($sql);
//   $stmt->bindParam(':titre', $titre);
//   $stmt->bindParam(':description', $description);
//   $stmt->bindParam(':texte', $texte);
//   $stmt->bindParam(':id', $article_id);
//   $stmt->execute();

//   $conn = null;

//   // Rediriger vers la liste des articles après la mise à jour
//   header("Location: list-article.php");
//   exit();
// }

// // Pré-remplir le formulaire 
// $host = '127.0.0.1';
// $dbname = '520_fc';
// $user = 'root';
// $password = '';

// $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $sql = "SELECT * FROM article WHERE id = :id";
// $stmt = $conn->prepare($sql);
// $stmt->bindParam(':id', $article_id);
// $stmt->execute();
// $article = $stmt->fetch(PDO::FETCH_ASSOC);

// $conn = null;


// -----------------------------------------


// Vérifier si l'identifiant de l'article est passé en paramètre d'URL
if (!isset($_GET['id'])) {
    header("Location: article-list.php"); // Rediriger vers la liste des articles si l'identifiant n'est pas spécifié
    exit();
}
$article_id = $_GET['id'];

// Vérifier si le formulaire de modification d'article est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $texte = $_POST['texte'];
    $illustration = $_POST['illustration'];

    // Mettre à jour l'article
    $success = update($article_id, $titre, $description, $texte, $illustration);
    if ($success) {
        $message = "Article mis à jour avec succès.";
    } else {
        $message = "Erreur lors de la mise à jour de l'article.";
    }
}

// Récupérer les données de l'article depuis la base de données
// Utilisez ces données pour pré-remplir le formulaire d'édition
$article = read($article_id);


// -----------------------------------------
// Mettre à jour l'article

$update = 'UPDATE article SET titre = :titre, description = :desc, texte = :texte, illustration = :illustration WHERE id = :id';
