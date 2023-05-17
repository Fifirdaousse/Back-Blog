<?php

// NOTE Pour exécuter ce script PHP dans VSCode,
// cliquer sur Run (CTRL+F5), puis choisir 'Run current script in Console'

require('./lib/article.php');

// Liste tous les Articles
function testReadAll()
{
    logMsg(PHP_EOL . '### ' . __FUNCTION__);

    $listArticle = readAll();
    $i = 0;
    foreach ($listArticle as $article) {

        // Affiche les 'entêtes de colonne' la première fois
        if ($i == 0) {
            $headers = implode(' | ', array_keys($article));
            logMsg($headers);
        }

        // Affiche les valeurs
        $fields = implode(' | ', array_values($article));
        logMsg($fields);

        $i++;
    }
}

// Lit 1 Article
function testRead($idArticle)
{
    logMsg(PHP_EOL . '### ' . __FUNCTION__);

    $article = read($idArticle);

    // Affiche les 'entêtes de colonne'
    $headers = implode(' | ', array_keys($article));
    logMsg($headers);

    // Affiche les valeurs
    $fields = implode(' | ', array_values($article));
    logMsg($fields);
}

// Crée un Article avec un titre 'random'
function testCreate()
{
    logMsg(PHP_EOL . '### ' . __FUNCTION__);

    $randomTitle = 'Some random title - ' . time();
    create(1, $randomTitle, 'Some description', 'Some text', null);
}

// --

// Exécute les tests
testCreate();
testRead(5);
testReadAll();
