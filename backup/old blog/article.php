<?php
    require_once("database.php");
    require_once("models/articles.php");
    include ('views/header.php');
    include('count.php');
    $link = db_connect();
    $article = articles_get($link, $_GET['id']);

    include("views/article.php");
    include ('views/footer.php');
