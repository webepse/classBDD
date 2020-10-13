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
    <?php foreach($db->myQuery('SELECT * FROM posts','Article') as $post) :  ?>
        <div>
            <h2><a href="<?= $post->getURL() ?>"><?= $post->title ?></a></h2>
            <div><?= $post->getExtrait() ?></div>
        </div>

    <?php endforeach; ?>

    <?php 
        var_dump($db->myQuery('SELECT * FROM posts','Article'));
    
    ?>
</body>
</html>