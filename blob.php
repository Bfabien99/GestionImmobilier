<?php
    function transfert()
    {
        $ret        = false;
        $img_blob   = '';
        $img_taille = 0;
        $taille_max = 1500000;
        $ret        = is_uploaded_file($_FILES['picture']['tmp_name']);
        
        if (!$ret) {
            echo "Problème de transfert";
            return false;
        } else {
            // Le fichier a bien été reçu
            $img_taille = $_FILES['picture']['size'];
            
            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_type = $_FILES['picture']['type'];
            $img_nom  = $_FILES['picture']['name'];
            $img_blob = file_get_contents ($_FILES['picture']['tmp_name']);
            return $img_blob;
        }
    }
