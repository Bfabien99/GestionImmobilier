<?php 
    $title = 'Ajout Article';
    $css = 'addArticle.css'    
?>

<?php ob_start(); ?>
    <form enctype="multipart/form-data" action="../controller/controller.php" method="post">
        <div class="form-group">
            <label for="nom">Nom du propriétaire</label>
            <input type="text" name="ownername" placeholder="Entre le nom du propiétaire">
        </div>
        <div class="form-group">
            <label for="nom">Contact du propriétaire</label>
            <input type="text" name="ownertel" placeholder="Entre le numéro du propiétaire">
        </div>
        <div class="form-group">
            <label for="nom">Image de la propriété</label>
            <input type="file" name="picture">
        </div>
        <div class="form-group">
            <label for="nom">Details de la propriété</label>
            <textarea name="details" id="" cols="30" rows="10" placeholder="Entre les détails"></textarea>
        </div>
        <div class="form-group">
            <label for="nom">Prix de la propriété</label>
            <input type="text" name="price" placeholder="Entre le prix">
        </div>
        <div class="form-group">
            <label for="nom">Localisation de la propriété</label>
            <input type="text" name="location" placeholder="Entre la localisation">
        </div>
        <div class="form-group">
            <label for="nom">Superficie de la propriété</label>
            <input type="text" name="area" placeholder="Entre la superficie">
        </div>
        <input type="submit" value="Sauvegarder" name="submit" class="submit">
    </form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>