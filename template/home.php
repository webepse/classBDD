<?php foreach($db->myQuery('SELECT * FROM posts','Article') as $post) :  ?>
    <div>
        <h2><a href="<?= $post->getURL() ?>"><?= $post->title ?></a></h2>
        <div><?= $post->getExtrait() ?></div>
    </div>

<?php endforeach; ?>

<?php 
    var_dump($db->myQuery('SELECT * FROM posts','Article'));
?>
<div><a href="index.php?action=ajouter">Ajouter un article</a></div>