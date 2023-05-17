<?php

session_start();

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['utilisateur_id'])) {
    header("Location: index.php"); // Rediriger vers la page d'accueil ou toute autre page après la connexion
    exit();
}

// Vérifier si le formulaire de connexion est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Effectuer la validation des identifiants (assurez-vous d'adapter cette étape à votre système d'authentification)
    $identifiant = $_POST['email'];
    $mdp = $_POST['mdp'];

    // Vérifier les identifiants dans la base de données (assurez-vous de remplacer les informations de connexion appropriées)
    $host = '127.0.0.1';
    $dbname = '520_fc';
    $user = 'root';
    $password = '';

    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Requête SQL pour vérifier les identifiants de l'utilisateur
    $sql = "SELECT * FROM utilisateur WHERE email = '$identifiant' AND motDePasse = '$mdp'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Authentification réussie, enregistrer l'utilisateur dans la session
        $utilisateur = $result->fetch_assoc();
        $_SESSION['idUtilisateur'] = $utilisateur['id'];
        $_SESSION['prenom'] = $utilisateur['prenom'];
        header("Location: ../index.php"); // Rediriger vers la page d'accueil ou toute autre page après la connexion
        exit();
    } else {
        $message = "Identifiant ou mot de passe incorrect.";
    }

}




include '../view/login-view.php';