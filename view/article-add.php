<?php include '../view/partial/header.php' ?>


<h1>Créer un article</h1>

<?php if (isset($message)) { ?>
    <p><?php echo $message; ?></p>
<?php } ?>

<form method="POST" action="article-add.php" enctype="multipart/form-data">
    <label for="titre">Titre :</label><br>
    <input type="text" id="titre" name="titre" required><br><br>

    <label for="desc">Description :</label><br>
    <textarea id="desc" name="description" required></textarea>

    <label for="texte">Texte :</label><br>
    <textarea id="texte" name="texte" rows="8" cols="80" required></textarea><br><br>

    <h2>Illustration :</h2>
        <label for="fileUpload">Fichier :</label>
        <input type="file" name="illustration" id="fileUpload">

    <button type="submit">Créer l'article</button>
</form>


<?php include '../view/partial/footer.php' ?>
