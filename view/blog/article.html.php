<?php include '../view/partials/_top.html.php' ?>
<h1><?= $article['title'] ?></h1>



<?php foreach ($comments as $comment) : ?>
    <p><a href="/?controller=blog&action=comment&id=<?= $comment['id'] ?>"><?= $comment['title'] ?></a></p>
<?php endforeach; ?>


<?php include '../view/partials/_bottom.html.php' ?>