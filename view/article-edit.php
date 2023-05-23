<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<main>
    <h1>Modifier l'article</h1>

    <?php if (isset($message)) { ?>
    <p><?php echo $message; ?></p>
    <?php } ?>

    <form action="../ctrl/article-edit.php?id=<?= $article.id; ?>" method="POST">

    <label for="titre">Titre :</label><br>
    <input type="text" id="titre" name="titre" value="<?= $article['titre']; ?>" required><br><br>

    <label for="desc">Description :</label><br>
    <textarea id="desc" name="description" value="<?= $article['description']; ?>" required></textarea>

    <label for="texte">Texte :</label><br>
    <textarea id="texte" name="texte" value="<?= $article['texte']; ?>" rows="8" cols="80" required></textarea><br><br>

    <h2>Illustration :</h2>
        <label for="fileUpload">Fichier :</label>
        <input type="file" name="illustration" id="fileUpload">

    <button type="submit">Modifier l'article</button>

    </form>
</main>