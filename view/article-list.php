<?php include '../view/partial/header.php'?>

<main>
    <h1><?= $pageTitle ?></h1>
    <section>
        <h2>Liste des Articles</h2>

        <table>
            <?php foreach ($listArticle as $article) :?>
                <tr>
                    <td><?= $article['titre'] ?></td>
                    <td><?= $article['description'] ?></td>
                    <td><?= $article['texte'] ?></td>
                    <td><?= $article['idUtilisateur'] ?></td>
                </tr>
                <?php endforeach; ?>
        </table>
    </section>

</main>

<?php include '../view/partial/footer.php'?>