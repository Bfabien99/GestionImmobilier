<?php
    function dbConnect()
    {
        $dsn="mysql:dbname=GImmobilier;host=localhost";
        $password = "";
        $user = "root";

        $connect = new PDO($dsn,$user,$password,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ]);

        if (!$connect) 
        {
            return new \Exception("Database cannot connect");
        }
        else
        {
            return $connect;
        }
    }

    function postArticle()
    {   
        include '../blob.php';
        $blob=transfert();
        $db = dbConnect();
        $query = $db->prepare('INSERT INTO immobilier(ownerName, ownerTel, date, picture, details, price, location, area) VALUES (:name, :tel, :date, :picture, :details, :price, :location, :area)');
        $query->execute([
            'name' => $_POST['ownername'],
            'tel' => $_POST['ownertel'],
            'date' => date('Y-m-d'),
            'picture' => addslashes($blob),
            'details' => $_POST['details'],
            'price' => $_POST['price'],
            'location' => $_POST['location'],
            'area' => $_POST['area']
        ]);
    }