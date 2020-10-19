<?php
    // use App\HTML\Form;
    $tab=[
        "test" => "mon test"
    ];
    $form = new App\HTML\Form($tab);

    $bootForm = new App\HTML\BootstrapForm($tab);
?>
<form action="index.php?action=addpost" method="POST">
        <div>
           <?= $form->input('titre') ?>
           <?= $form->input('test') ?>

           <?= $bootForm->input('test') ?>
        </div>
        <div>
            <label for="content">Contenu: </label>
            <div>
                <textarea name="content" id="content" cols="30" rows="10"></textarea>
            </div>
        </div>
      
           <?= $form->submit() ?>
           <?= $bootForm->submit() ?>
     
    </form>