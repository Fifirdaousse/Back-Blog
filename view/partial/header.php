<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/css/style.css">
    <title></title>
</head>
<body>
    <nav class="p-1 d-flex jc-center jc-spbet">
        <a href="/index.php"><img src="/asset/img/phi.png" alt="Logo"></a>
        <div class="mar-10">
        <a href="/index.php" class="text-deco c-white mar-r-16">Accueil</a>
        <?php if (isset($_SESSION['utilisateur_id'])) : ?>
        <a href="../ctrl/article-list.php" class="text-deco c-white mar-r-10">Gérer les articles</a></li>
        <a href="../ctrl/user-list.php" class="text-deco c-white mar-r-10">Liste des utilisateurs</a></li>
        <a href="../ctrl/login.php" class="text-deco c-white mar-r-10">Logout</a>

        <?php else : ?>
         <a href="../ctrl/login.php" class="text-deco c-white mar-r-10">Login</a>
         <a href="../ctrl/sign-up.php" class="text-deco c-white mar-r-10">Sign up</a>
         <?php endif; ?>
        
        </div>
    </nav>

