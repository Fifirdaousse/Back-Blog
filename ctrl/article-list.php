<?php
session_start();
require('../lib/article.php');

$listArticle = readAll();



include '../view/article-list.php';
