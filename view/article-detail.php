<?php include '../view/partial/header.php' ?>


<main>

<!-- Affichage article -->
    <img src="../asset/upload/<?= $article['illustration']?>" alt=""> 
    <h2><?= $article['titre']?></h2>
    <h4><?= $article['description']?></h4>
    <p><?= $article['texte']?></p>
       

    
</main>

<?php include '../view/partial/footer.php' ?>