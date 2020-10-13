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
    <?php foreach($db->myQuery('SELECT * FROM posts') as $post) :  ?>

        <div><?= $post->title ?></div>

    <?php endforeach; ?>

    <?php 
        var_dump($db->myQuery('SELECT * FROM posts'));
    
    ?>
</body>
</html>