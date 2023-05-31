<?php


function readCom($id)
{
   // Prépare la requête
   $query = 'SELECT COM.texte, COM.date, COM.heure, USER.nom, USER.prenom';
   $query .= ' FROM commentaire AS COM';
   $query .= ' LEFT JOIN utilisateur AS USER ON COM.idUtilisateur = USER.id';
   $query .= ' LEFT JOIN article ON COM.idArticle = article.id';
   $query .= ' WHERE article.id = :id';

   $stmt = getPDO()->prepare($query);
   $stmt->bindParam(':id', $id);
   logMsg($stmt->debugDumpParams());

   // Exécute la requête
   $successOrFailure = $stmt->execute();
   logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function addCom($idUser, $texte, $date, $heure, $idArticle)
{

    $timestamp = time(); // Récupère le timestamp actuel (heure et date actuelles)

// Formatage de l'heure et de la date
    $datePublication = date('d/m/Y', $timestamp); // Format : jour/mois/année
    $heurePublication = date('H:i', $timestamp); // Format : heures:minutes


    $query = 'INSERT INTO commentaire (idUtilisateur, texte, date, heure, idArticle) VALUES';
    $query .= ' (:idUtilisateur, :texte, $datePublication, $heurePublication, :idArticle)';

    $stmt = getPDO()->prepare($query);
    $stmt->bindParam(':idUtilisateur', $idUser);
    $stmt->bindParam(':texte', $texte);
    $stmt->bindParam('$datePublication', $date);
    $stmt->bindParam('$heurePublication', $heure);
    $stmt->bindParam(':idArticle', $idArticle);
    logMsg($stmt->debugDumpParams());

    // Exécute la requête
    $successOrFailure = $stmt->execute();
    logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

    return $successOrFailure;
}