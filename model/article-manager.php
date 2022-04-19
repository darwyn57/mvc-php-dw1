<?php

define('TABLE', 'article');

try
{
    $pdo = new PDO('mysql:host=localhost;dbname=mvc-blog','root','', [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

}
catch(PDOException $pe)
{
    die("Error : " . $pe->getMessage());
}

function getAll()
{
    $pdo = $GLOBALS['pdo'];

    $sql = "SELECT * FROM " . TABLE;
    $query = $pdo->query($sql);
    return $query->fetchAll();
}

function getById(int $id)
{
    $pdo = $GLOBALS['pdo'];

    $sql = "SELECT * FROM " . TABLE . " WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->execute([
        'id' => $id
    ]);

    return $query->fetch();
}

// etc...