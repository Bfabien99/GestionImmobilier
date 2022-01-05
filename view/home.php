<?php $title = 'Accueil'; 
    require '../controller/controller.php';
    $query = $connect->prepare("SELECT * FROM immobilier");
    $query->execute();
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<?php ob_start(); ?>
    <?php foreach($articles as $key =>$article):?>
        <h2><?= $article['ownerName'] ?></h2>
    <?php endforeach;?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>