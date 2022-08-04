<?php


class CommentManager
{
    public const TABLE ='comment';
    private static ?PDO $pdo = NULL;
    private function getPdo()
    {
        if(self::$pdo== NULL)
        {

        try {
            self::$pdo = new PDO('mysql:host=localhost;dbname=mvc-blog;charset=utf8mb4', 'root', '', [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
                } catch (PDOException $pe) {
                die("Error : " . $pe->getMessage());
            }
}
return self::$pdo;


function getAllByArtilceId(int $articleId)
{
  

    $sql = "SELECT * FROM " . TABLE_COMMENT . " WHERE article_id = :article_id";
    $query = $pdo->prepare($sql);
    $query->execute([
        'article_id' => $articleId
    ]);

    return $query->fetchAll();
}

function insertNewComment(array $comment)
{
   

    $sql = "INSERT INTO " . TABLE_COMMENT . " (article_id, author, content, created_at) VALUES (:article_id, :author, :content, NOW())";
    $query = $pdo->prepare($sql);
    $query->execute([
        'article_id' => $comment['article_id'],
        'author' => $comment['author'],
        'content' => $comment['content']
    ]);
    return $pdo->lastInsertId();
}
    }