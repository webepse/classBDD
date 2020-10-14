<?php
    namespace App;
    require "src/Autoloader.php";
    Autoloader::register();
    $db = new Database('blog2');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php $post = $db->myPrepare("SELECT title, content, DATE_FORMAT(creation_date,'%d/%m/%Y') as mydate FROM posts WHERE id=?", [$_GET['id']],'Article', true) ?>
    <?php var_dump($post); ?>
    <h2><?= $post->title ?></h2>
    <h4><?= $post->mydate ?></h4>
    <?= nl2br($post->content) ?>

    <div><a href="index.php">Retour</a></div>

</body>
</html>