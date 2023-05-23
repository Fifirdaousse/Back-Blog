<?php include '../view/partial/header.php';?>

<main>
    <h2>Liste des Utilisateurs</h2>

    <table>
        <?php foreach($listUser as $user) : ?>
            <tr>
                <td><?= $user['nom'] ?></td>
                <td><?= $user['prenom'] ?></td>
                <td><?= $user['email'] ?></td>
            </tr>
        <?php endforeach;?>
    </table>
</main>


<?php include '../view/partial/footer.php'?>