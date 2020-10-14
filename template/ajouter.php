<form action="index.php?action=addpost" method="POST">
        <div>
            <label for="title">Titre: </label>
            <input type="text" value="" name="title" id="title">
        </div>
        <div>
            <label for="content">Contenu: </label>
            <div>
                <textarea name="content" id="content" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div>
            <input type="submit" value="Ajouter">
        </div>
    </form>