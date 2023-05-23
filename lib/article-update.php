<?php

require '../lib/db.php';


$stmt = $pdo->prepare('SELECT * FROM article WHERE id = :id');
$stmt->execute([
    'id' => $_GET['id'],
    
]);
$article = $stmt->fetch(PDO::FETCH_ASSOC);


if (
    !isset($_POST['id'])
    || !isset($_POST['titre'])
    || !isset($_POST['description'])
    || !isset($_POST['texte'])
    || !isset($_POST['illustration'])
    )
{
    echo "il manque des infos";
    return;
}


$id = $_POST['id'];
$titre = $_POST['titre'];
$description = $_POST['description'];
$texte = $_POST['texte'];
$illustration = $_POST['illustration'];

$updateArticle = $pdo->prepare('UPDATE article SET titre = :titre, description = :description, texte = :texte, illustration = :illustration WHERE id = :id');
$updateArticle->execute([
    'titre' => $titre,
    'description' => $description,
    'texte' => $texte,
    'illustration' => $illustration
]);

$updateArticle->close();
$stmt->close();
$pdo->close();