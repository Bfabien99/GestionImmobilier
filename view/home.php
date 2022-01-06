<?php $title = 'Accueil'; 
    require '../controller/controller.php';
    $query = $connect->prepare("SELECT * FROM immobilier");
    $query->execute();
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<?php ob_start(); ?>
    <div class="container">
        <nav>
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Toutes les propriétés</a></li>
                <li><a href="#">Admin</a></li>
            </ul>
                <input type="search" name="search" placeholder="Search field">
        </nav>

        <header>
           <h3>Bienvenue à l'agence immobilière numéro 1</h3> 
        </header>

        <div class="box">
            <?php foreach($articles as $key =>$article):?>
            <div class="box-cont">
                
                    <img src="../upload/<?= $article['picture']?>" alt="" width="100%">
                    <h2>Propriétaire :<?= $article['ownerName'] ?></h2>
                    <h2>Superficie :<?= $article['area'] ?> m²</h2>
                    <h2>Lieu :<?= $article['location'] ?></h2>
                    
            </div>
            <?php endforeach;?>
        </div>

    </div>
    
   
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>