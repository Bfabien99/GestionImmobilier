<?php
    require '../model/model.php';
    $connect = dbConnect();

    if(!empty($_POST['ownername'])){
        postArticle();
        header('location:../view/home.php');
    }