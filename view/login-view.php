<?php require '../view/partial/header.php'?>

<main class="d-flex jc-center wrap m-1200 m-auto">

    <?php if (isset($message)) { ?>
        <p><?php echo $message; ?></p>
    <?php } ?>

    <form action="/ctrl/login.php" method="post" class="border-ra mar-32 p-48">
        <h1 class="text-center"> Se connecter</h1>

        <div class="d-grid mar-b-32">
            <label for="email">E-mail :</label>
            <input type="text" name="email" id="email">
        </div>

        <div class="d-grid mar-b-32">
            <label for="mdp">Mot de passe :</label>
            <input type="password" name="mdp" id="mdp">
        </div>

        <button> Se connecter </button>
    

    </form>


</main>

<?php require '../view/partial/footer.php'?>
