<?php

// require("../lib/db.php");


function coms($idArticle)
{
    $pdo = getPDO();

    $query = "SELECT commentaire.*, utilisateur.nom FROM commentaire
          JOIN article ON commentaire.idArticle = article.id
          JOIN utilisateur ON commentaire.idUtilisateur = utilisateur.id
          WHERE commentaire.idArticle = :idArticle";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':idArticle', $idArticle);
    $stmt->execute();
    $coms = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $coms;
}


function addCom($idUtilisateur, $texte, $idArticle)
{
    $query = 'INSERT INTO commentaire (idUtilisateur, texte, idArticle) VALUES';
    $query .= ' (:idUtilisateur, :texte, :idArticle)';

    $stmt = getPDO()->prepare($query);
    $stmt->bindParam(':idUtilisateur', $idUtilisateur);
    $stmt->bindParam(':texte', $texte);
    $stmt->bindParam(':idArticle', $idArticle);
    logMsg($stmt->debugDumpParams());

    // Exécute la requête
    $successOrFailure = $stmt->execute();
    logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

    return $successOrFailure;
}
