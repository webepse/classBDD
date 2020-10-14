<?php
    namespace App;
    require "src/Autoloader.php";
    Autoloader::register();

    $db = new Database('blog2');

    if(isset($_GET['action']))
    {
        if($_GET['action']=="addpost"){
            if(isset($_POST['title']) && !empty($_POST['title'])){
                if(isset($_POST['content']) && !empty($_POST['content']))
                {
                    $title = htmlspecialchars($_POST['title']);
                    $content = htmlspecialchars($_POST['content']);
                    $db->addPost($title,$content);
                }else{
                    header("LOCATION:ajouter.php?err=2");
                } 
            }else{
                header("LOCATION:ajouter.php?err=1");
            }
        }
    }

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
    <div><a href="ajouter.php">Ajouter un article</a></div>
</body>
</html>