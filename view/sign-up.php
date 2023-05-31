<?php require("../view/partial/header.php"); ?>

<main class="d-flex jc-center wrap m-1200 m-auto">

    <form action="../ctrl/sign-up.php" method="post" class="border-ra mar-32 p-48">
        <h1 class="text-center"> Inscription</h1>

        <div class="d-grid mar-b-32">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom">
        </div>
        <div class="d-grid mar-b-32">
            <label for="prenom">Prenom :</label>
            <input type="text" name="prenom" id="prenom">
        </div>

        <div class="d-grid mar-b-32">
            <label for="email">E-mail :</label>
            <input type="text" name="email" id="email">
        </div>

        <div class="d-grid mar-b-32">
            <label for="mdp">Mot de passe :</label>
            <input type="password" name="motDePasse" id="mdp">
        </div>

        <button> S'inscrire </button>
    

    </form>
</main>
<?php require("../view/partial/footer.php") ?>
