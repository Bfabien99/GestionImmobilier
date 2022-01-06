<?php

    require_once 'controller/controller.php';
    $uri = $_SERVER['REQUEST_URI'];
    if($uri === '/GestionImmobilier/'){
        header('location:view/home.php');
    }
