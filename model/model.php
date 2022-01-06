<?php
    function dbConnect()
    {
        $dsn="mysql:dbname=gimmobilier;host=localhost";
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
        $img_name = $_FILES['picture']['name'];
        $img_size = $_FILES['picture']['size'];
        $tmp_name = $_FILES['picture']['tmp_name'];
        $error = $_FILES['picture']['error'];

        if($error === 0) 
        {
            if ($img_size > 1250000) 
            {
                $em = "Sorry your file is too large";
                header("Location: ../index.php?error=$em");
            }
            else 
            {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "png", "jpeg");

                if(in_array($img_ex_lc, $allowed_exs))
                {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = '../upload/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    $db = dbConnect();
                    $query = $db->prepare('INSERT INTO immobilier(ownerName, ownerTel, date, picture, details, price, location, area) VALUES (:name, :tel, :date, :picture, :details, :price, :location, :area)');
                    $query->execute([
                    'name' => $_POST['ownername'],
                    'tel' => $_POST['ownertel'],
                    'date' => date('Y-m-d'),
                    'picture' => $new_img_name,
                    'details' => $_POST['details'],
                    'price' => $_POST['price'],
                    'location' => $_POST['location'],
                    'area' => $_POST['area']
        ]);
                }
                else
                {
                    $em = "Sorry your can't upload this type of file";
                    header("Location: ../index.php?error=$em");
                }
                
            }
        }
        else
        {
            $em = "Unknow error";
            header("Location: index.php?error=$em");
        }

        
    }