<?php include '../view/partial/header.php' ?>

<main>
    <h1>Modifier l'article</h1>

    <?php if (isset($message)) { ?>
    <p><?php echo $message; ?></p>
    <?php } ?>

    <form method="POST" action="article-edit.php" enctype="multipart/form-data">
        <div>
            <input type="hidden" name="id" value="<?= $article['id']?>">
        </div>
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" value ="<?= $article['titre']?>">
        <br/>
        <label for="desc">Description :</label><br>
        <textarea id="desc" name="description"><?= $article['description']?></textarea>
        <br/>
        <label for="texte">Texte :</label><br>
        <textarea id="texte" name="texte" rows="8" cols="80"><?= $article['texte']?></textarea>

        <h2>Illustration :</h2>
        <label for="fileUpload">Fichier :</label>
        <input type="file" name="illustration" id="fileUpload" value ="<?= $article['illustration']?>">

        <button type="submit">Modifier l'article</button>
    </form>
</main>

<?php include '../view/partial/footer.php' ?>