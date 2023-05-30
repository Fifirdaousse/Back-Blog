<?php require("../view/partial/header.php"); ?>

<body>
    <div class=" background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="../ctrl/sign-up.php" method="post">
        <h3>Inscription</h3>
        <div class="d-grid mar-b-32">

        <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom">

            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom">

            <label for="email">E-mail :</label>
            <input type="text" name="email" id="email">
        </div>

        <div class="d-grid mar-b-32">
            <label for="mdp">Mot de passe :</label>
            <input type="password" name="motDePasse" id="mdp">
        </div>

        <button> S'inscrire </button>
    </form>

<?php require("../view/partial/footer.php") ?>
