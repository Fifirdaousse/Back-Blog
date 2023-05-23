<?php

require '../lib/db.php';

function logMsg($msg)
{
    echo 'foo';
    echo $msg . PHP_EOL;
}


// Bibliothèque de fonctions dédiées aux Articles

function create($idUser, $title, $description, $text, $picture)
{
    $query = 'INSERT INTO article (idUtilisateur, titre, description, texte, illustration) VALUES';
    $query .= ' (:idUtilisateur, :titre, :description, :texte, :illustration)';

    $stmt = getPDO()->prepare($query);
    $stmt->bindParam(':idUtilisateur', $idUser);
    $stmt->bindParam(':titre', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':texte', $text);
    $stmt->bindParam(':illustration', $picture);
    logMsg($stmt->debugDumpParams());

    // Exécute la requête
    $successOrFailure = $stmt->execute();
    logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

    return $successOrFailure;
}

function read($id)
{
   // Prépare la requête
   $query = 'SELECT ART.id, ART.idUtilisateur, ART.titre, ART.description, ART.texte, ART.illustration';
   $query .= ' FROM article ART';
   $query .= ' WHERE ART.id = :id';
   $stmt = getPDO()->prepare($query);
   $stmt->bindParam(':id', $id);
   logMsg($stmt->debugDumpParams());

   // Exécute la requête
   $successOrFailure = $stmt->execute();
   logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return $result;
}

function readAll()
{
    // Prépare la requête
    $query = 'SELECT ART.id, ART.idUtilisateur, ART.titre, ART.description, ART.texte, ART.illustration';
    $query .= ' FROM article ART';
    $stmt = getPDO()->prepare($query);
    logMsg($stmt->debugDumpParams());

    // Exécute la requête
    $successOrFailure = $stmt->execute();
    logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


function update($id, $titre, $description, $texte, $illustration)
{
    // ...
}

function delete($id)
{
    // ...
}
