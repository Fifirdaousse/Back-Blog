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

    return $stmt->fetch(PDO::FETCH_ASSOC);
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

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function update($id, $titre, $description, $texte, $illustration)
{
    // Prépare la requête
    $query = 'UPDATE article SET titre = :titre, description = :description, texte = :texte, illustration = :illustration';
    $query .= ' WHERE id = :id';
    $stmt = getPDO()->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':texte', $texte);
    $stmt->bindParam(':illustration', $illustration);
    logMsg($stmt->debugDumpParams());

    // Exécute la requête
    $successOrFailure = $stmt->execute();

    logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function delete($id)
{
    // Prépare la requête
    $query = 'DELETE FROM article WHERE id = :id';
    $stmt = getPDO()->prepare($query);
    $stmt->bindParam(':id', $id);
    logMsg($stmt->debugDumpParams());

    // Exécute la requête
    $successOrFailure = $stmt->execute();
    logMsg("Success (1) or Failure (0) ? $successOrFailure" . PHP_EOL);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
