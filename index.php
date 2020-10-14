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
                    header("LOCATION:index.php");
                }else{
                    header("LOCATION:index.php?action=ajouter&err=2");
                } 
            }else{
                header("LOCATION:index.php?action=ajouter&err=1");
            }
        }elseif($_GET['action']=="home"){
            $menu="template/home.php";
        }elseif($_GET['action']=="article"){
            if(isset($_GET['id'])){
                $menu="template/article.php";
            }else{
                $menu="template/404.php";
            }
        }elseif($_GET['action']=="ajouter"){
            $menu="template/ajouter.php";
        }else{
            $menu="template/404.php";
        }


    }else{
        $menu="template/home.php";
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
   <?php
        include("template/header.php");
        
        include($menu);

        include("template/footer.php");
   ?>
</body>
</html>