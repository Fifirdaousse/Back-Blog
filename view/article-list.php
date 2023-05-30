<?php include '../view/partial/header.php';
session_start();
?>

<main>
        <h2>Liste des Articles</h2>

        <a href="../ctrl/article-add.php">Ajout d'article</a>

        <table>
            <?php foreach($listArticle as $article) : ?>
                <tr>
                    <td>
                        <img src="../asset/upload/<?= $article['illustration'] ?>" alt="illustration"
                    </td>
                    <td><?= $article['titre'] ?></td>
                    <td><?= $article['description'] ?></td>
                    <td><?= $article['texte'] ?></td>
                    <td><?= $article['idUtilisateur'] ?></td>
                    <td><a href="../ctrl/article-update.php?id=<?= $article['id'] ?>">Edit article</a></td>
                    <td><a href="../ctrl/article-delete.php?id=<?= $article['id'] ?>">Supprimer article</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

</main>

<?php include '../view/partial/footer.php' ?>