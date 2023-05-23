<?php 

// Ouvre une connexion à la Base de données,
// et configure la connexion pour afficher toutes les erreurs (s'il s'en produit)
function getPDO()
{
    $host = '127.0.0.1';
    $port = '3306';
    $dbname = '520_fc';
    $user = 'root';
    $password = '';
    $dataSourceName = "mysql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dataSourceName, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}