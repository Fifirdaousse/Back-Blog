<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);
var_dump($_POST);
?>
<main>
    <h1>Modifier l'article</h1>

    <?php if (isset($message)) { ?>
    <p><?php echo $message; ?></p>
    <?php } ?>

    <form method="POST" action="article-update.php?id=<?= $article['id']?>" enctype="multipart/form-data">
        <label for="titre">Titre :</label><br>
        <input type="text" id="titre" name="titre" value ="<?= $article['titre']?>">

        <label for="desc">Description :</label><br>
        <textarea id="desc" name="description" value ="<?= $article['description']?>"></textarea>

        <label for="texte">Texte :</label><br>
        <textarea id="texte" name="texte" rows="8" cols="80" value ="<?= $article['texte']?>"></textarea>

        <h2>Illustration :</h2>
        <label for="fileUpload">Fichier :</label>
        <input type="file" name="illustration" id="fileUpload" value ="<?= $article['illustration']?>">

        <button type="submit">Créer l'article</button>
    </form>
</main>