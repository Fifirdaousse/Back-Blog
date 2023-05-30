<?php

require ("db.php");

function readAllUser()
{
    // Prépare la requête
    $query = 'SELECT USER.id, USER.nom, USER.prenom, USER.email, USER.motDePasse, R.nom AS role, ART.titre AS ART_titre';
    $query .= ' FROM utilisateur AS USER';
    $query .= ' JOIN role AS R ON USER.idRole = R.id';
    $query .= ' LEFT JOIN article AS ART ON USER.id = ART.idUtilisateur';
    $query .= ' ORDER BY USER.nom';
    $stmt = getPDO()->prepare($query);

    // Exécute la requête
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}



function createUser($nom, $prenom, $email, $mdp)
{
    // ID du rôle Membre
    $idRole = 20; 

    $query = 'INSERT INTO utilisateur (nom, prenom, email, motDePasse, idRole) VALUES';
    $query .= ' (:nom, :prenom, :email, :motDePasse, :idRole)';

    $stmt = getPDO()->prepare($query);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':motDePasse', $mdp);
    $stmt->bindParam(':idRole', $idRole); 

    $successOrFailure = $stmt->execute();

    return $successOrFailure;
}


