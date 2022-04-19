<?php

require '../model/article-manager.php';

/**
 * Affichage de la page d'accueil du blog (tous les articles)
 * @return [type]
 */
function index()
{
    $articles = getAll();

    include '../view/blog/index.html.php';
}

function article()
{
    if(!empty($_GET['id']))
    {
        $article = getById($_GET['id']);
        include '../view/blog/article.html.php';
    }
    else
    {
        header('Location: /'); exit;
    }
}

function comment()
{
    include '../view/blog/comment.html.php';
}

