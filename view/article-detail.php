<?php include '../view/partial/header.php' ;?>


<main>

<!-- Affichage article -->
    <img src="../asset/upload/<?= $article['illustration']?>" alt=""> 
    <h2><?= $article['titre']?></h2>
    <h4><?= $article['description']?></h4>
    <p><?= $article['texte']?></p>
       

    <!-- Coms -->

    <div>
        <?php foreach($listCom as $com) : ?>
            <?= $com['nom']?>
            <?= $com['prenom']?>
            <?= $com['date']?>
            <?= $com['heure']?>
            <?= $com['texte']?>
        <?php endforeach; ?>
    </div>

    <form method="POST" action="../ctrl/coms.php">
    <div>
        <input type="hidden" name="id" value="<?= $article['id']?>">
    </div>
        <textarea name="texte" id="com" cols="30" rows="10"></textarea>

        <button>Commenter</button>
    </form>

    
</main>

<?php include '../view/partial/footer.php' ?>