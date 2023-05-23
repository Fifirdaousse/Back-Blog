<?php

require('../lib/article.php');

$listArticle = readAll();

// $updateArticle = update();


include '../view/article-list.php';