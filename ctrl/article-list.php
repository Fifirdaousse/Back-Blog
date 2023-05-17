<?php

require('../lib/article.php');

$pageTitle = 'article';
$listArticle = readAll();


include '../view/article-list.php';