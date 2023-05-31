<?php include '../view/partial/header.php';?>

<main>
    <h2 class="text-center">Liste des Articles</h2>
    <td><a href="../ctrl/article-add.php">Ajouter </a></td>


    <table>
        <?php foreach($listArticle as $article) : ?>
            <tr>
                <td><?= $article['titre'] ?></td>
                <td><?= $article['description'] ?></td>
                <td><?= $article['texte'] ?></td>
                <td><?= $article['idUtilisateur'] ?></td>
                <td><a href="../ctrl/article-edit.php?id=<?= $article['id']?>">Edit</a></td>
                <td><a href="../ctrl/article-delete.php?id=<?= $article['id']?>">Supprimer </a></td>
            </tr>
        <?php endforeach; ?>
    </table>

     <!-- article -->
     <div class="container d-flex wrap jc-center m-1200 m-auto">
     
     <?php foreach($listArticle as $article) : ?>

        <article class=" p-1 m-400 f-1-300 border-ra bgc-gray mar-16">
        
            <img src="../asset/upload/<?= $article['illustration']?>" class="m-400" alt="">
            <h2><?= $article['titre'] ?></h2>
            <p><?= $article['description'] ?></p>
            <footer >
                <a href="../ctrl/article-detail.php?id=<?= $article['id']?>" >En savoir plus</a>
            </footer>
        </article>
        <?php endforeach; ?>
    </div>
</main>

<?php include '../view/partial/footer.php' ?>