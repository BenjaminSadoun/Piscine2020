<?php
session_start();
?>

<!DOCTYPE html>
<html lang="UTF-8">

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Ebay ECE</title>
</head>

    <div id="header">
        <h1 id="h1">Ebay ECE</h1>
        <h2 id="h2">La vente en ligne pour la communauté ECE Paris</h2>
        
    </div>

    <?php include("config/navig.php"); ?>

    <?php

        $numID = isset($_POST["numID"]) ? $_POST["numID"] : "";

        $IDAch = $IDAdm = $IDVend = $categorie = $prixInitial = $prixFinal = $nom = $description
        = $typeVente = $dateDebut = $dateFin= $nommedia = '';
        $errors = array('IDAch' => '', 'IDAdm' => '', 'IDVend' => '', 'categorie' => '', 'prixInitial' => '',
                        'prixFinal' => '', 'nom' => '', 'description' => '', 'typeVente' => '', 'dateDebut' => '',
                        'dateFin' => '', 'nommedia' =>'', 'vignette' => '');

    
        $IDAch = 0;
        $IDAdm = 0;
        $numID = '';
        $_SESSION['numID']='';
        // $numID = $_SESSION['numID'];
        // $_SESSION['numID'] = '';
        $IDVend = $_SESSION['IDVend'];
        $dateDebut = $dateFin = date("Y-m-d H:i:s");
        
        $database = 'ebayece';
        $db_handle = mysqli_connect('localhost', 'root', '', $database);


        if (!$db_handle) {
            echo 'Connection error: ' . mysqli_connect_error();
        }

        if(isset($_POST['submit'])){
            
            $target = "img/imgitem/".basename($_FILES['nommedia']['name']);
            // check nom de l'objet
            if(empty($_POST['nom'])){
                $errors['nom'] = 'Vous n\'avez pas renseigne le nom de l\'objet';
            } else{
                $email = $_POST['nom'];
            }

            // check description
            if(empty($_POST['description'])){
                $errors['description'] = 'Vous n\'avez pas renseigne la description de l\'objet';
            } else{
                $title = $_POST['description'];
            }

            if(array_filter($errors)){
                //echo 'errors in form';
            } else {
                // escape sql chars
            
            //$numID = $_SESSION['numID'];
            $nommedia = $_FILES['nommedia']['name'];
            $categorie = mysqli_real_escape_string($db_handle, $_POST['categorie']);
            $prixInitial = mysqli_real_escape_string($db_handle, $_POST['prixInitial']);
            $nom = mysqli_real_escape_string($db_handle, $_POST['nom']);
            $description = mysqli_real_escape_string($db_handle, $_POST['description']);
            $typeVente = mysqli_real_escape_string($db_handle, $_POST['typeVente']);

            // create sql
            if($_POST['categorie'] == 'fot' && $_POST['typeVente'] == 'enchere' )
            {
            $sql = "INSERT INTO item(IDAch,IDAdm,IDVend,categorie,prixInitial,
                                prixFinal,nom,description,typeVente,dateDebut,dateFin,vignette)
                    VALUES('$IDAch','$IDAdm','$IDVend',0,'$prixInitial',
                            '$prixInitial','$nom','$description',0,'$dateDebut','$dateFin','$nommedia')";

            // $inter = "SELECT numID FROM item ORDER BY numID DESC LIMIT 1";
            // $res = mysqli_query($db_handle, $inter);
            // $data = mysqli_fetch_assoc($res);
            // $numID = $data['numID']+1;
            // $sql2 = "INSERT INTO media(numID,nom,description)
            //             VALUES('$numID','$nommedia','')";
            }
            else if($_POST['categorie'] == 'fot' && $_POST['typeVente'] == 'meilleuroffre' )
            {
            $sql = "INSERT INTO item(IDAch,IDAdm,IDVend,categorie,prixInitial,
                                prixFinal,nom,description,typeVente,dateDebut,dateFin,vignette)
                    VALUES('$IDAch','$IDAdm','$IDVend',0,'$prixInitial',
                            '$prixInitial','$nom','$description',1,'$dateDebut','$dateFin','$nommedia')";
            // $inter = "SELECT numID FROM item ORDER BY numID DESC LIMIT 1";
            // $res = mysqli_query($db_handle, $inter);
            // $data = mysqli_fetch_assoc($res);
            // $numID = $data['numID']+1;
            // $sql2 = "INSERT INTO media(numID,nom,description)
            //             VALUES('$numID','$nommedia','')";
            }
            else if($_POST['categorie'] == 'fot' && $_POST['typeVente'] == 'achatimmediat' )
            {
            $sql = "INSERT INTO item(IDAch,IDAdm,IDVend,categorie,prixInitial,
                                prixFinal,nom,description,typeVente,dateDebut,dateFin,vignette)
                    VALUES('$IDAch','$IDAdm','$IDVend',0,'$prixInitial',
                            '$prixInitial','$nom','$description',2,'$dateDebut','$dateFin','$nommedia')";
            // $inter = "SELECT numID FROM item ORDER BY numID DESC LIMIT 1";
            // $res = mysqli_query($db_handle, $inter);
            // $data = mysqli_fetch_assoc($res);
            // $numID = $data['numID']+1;
            // $sql2 = "INSERT INTO media(numID,nom,description)
            //             VALUES('$numID','$nommedia','')";
            }
            else if($_POST['categorie'] == 'bplm' && $_POST['typeVente'] == 'enchere' )
            {
            $sql = "INSERT INTO item(IDAch,IDAdm,IDVend,categorie,prixInitial,
                                prixFinal,nom,description,typeVente,dateDebut,dateFin,vignette)
                    VALUES('$IDAch','$IDAdm','$IDVend',1,'$prixInitial',
                            '$prixInitial','$nom','$description',0,'$dateDebut','$dateFin','$nommedia')";
            // $inter = "SELECT numID FROM item ORDER BY numID DESC LIMIT 1";
            // $res = mysqli_query($db_handle, $inter);
            // $data = mysqli_fetch_assoc($res);
            // $numID = $data['numID']+1;
            // $sql2 = "INSERT INTO media(numID,nom,description)
            //             VALUES('$numID','$nommedia','')";
            }
            else if($_POST['categorie'] == 'bplm' && $_POST['typeVente'] == 'meilleuroffre' )
            {
            $sql = "INSERT INTO item(IDAch,IDAdm,IDVend,categorie,prixInitial,
                                prixFinal,nom,description,typeVente,dateDebut,dateFin,vignette)
                    VALUES('$IDAch','$IDAdm','$IDVend',1,'$prixInitial',
                            '$prixInitial','$nom','$description',1,'$dateDebut','$dateFin','$nommedia')";
            // $inter = "SELECT numID FROM item ORDER BY numID DESC LIMIT 1";
            // $res = mysqli_query($db_handle, $inter);
            // $data = mysqli_fetch_assoc($res);
            // $numID = $data['numID']+1;
            // $sql2 = "INSERT INTO media(numID,nom,description)
            //             VALUES('$numID','$nommedia','')";
            }
            else if($_POST['categorie'] == 'bplm' && $_POST['typeVente'] == 'achatimmediat' )
            {
            $sql = "INSERT INTO item(IDAch,IDAdm,IDVend,categorie,prixInitial,
                                prixFinal,nom,description,typeVente,dateDebut,dateFin,vignette)
                    VALUES('$IDAch','$IDAdm','$IDVend',1,'$prixInitial',
                            '$prixInitial','$nom','$description',2,'$dateDebut','$dateFin','$nommedia')";
            // $inter = "SELECT numID FROM item ORDER BY numID DESC LIMIT 1";
            // $res = mysqli_query($db_handle, $inter);
            // $data = mysqli_fetch_assoc($res);
            // $numID = $data['numID']+1;
            // $sql2 = "INSERT INTO media(numID,nom,description)
            //             VALUES('$numID','$nommedia','')";
            }
            else if($_POST['categorie'] == 'avip' && $_POST['typeVente'] == 'enchere' )
            {
            $sql = "INSERT INTO item(IDAch,IDAdm,IDVend,categorie,prixInitial,
                                prixFinal,nom,description,typeVente,dateDebut,dateFin,vignette)
                    VALUES('$IDAch','$IDAdm','$IDVend',2,'$prixInitial',
                            '$prixInitial','$nom','$description',0,'$dateDebut','$dateFin','$nommedia')";
            // $inter = "SELECT numID FROM item ORDER BY numID DESC LIMIT 1";
            // $res = mysqli_query($db_handle, $inter);
            // $data = mysqli_fetch_assoc($res);
            // $numID = $data['numID']+1;
            // $sql2 = "INSERT INTO media(numID,nom,description)
            //             VALUES('$numID','$nommedia','')";
            }
            else if($_POST['categorie'] == 'avip' && $_POST['typeVente'] == 'meilleuroffre' )
            {
            $sql = "INSERT INTO item(IDAch,IDAdm,IDVend,categorie,prixInitial,
                                prixFinal,nom,description,typeVente,dateDebut,dateFin,vignette)
                    VALUES('$IDAch','$IDAdm','$IDVend',2,'$prixInitial',
                            '$prixInitial','$nom','$description',1,'$dateDebut','$dateFin','$nommedia')";
            // $inter = "SELECT numID FROM item ORDER BY numID DESC LIMIT 1";
            // $res = mysqli_query($db_handle, $inter);
            // $data = mysqli_fetch_assoc($res);
            // $numID = $data['numID']+1;
            // $sql2 = "INSERT INTO media(numID,nom,description)
            //             VALUES('$numID','$nommedia','')";
            }
            else if($_POST['categorie'] == 'avip' && $_POST['typeVente'] == 'achatimmediat' )
            {
            $sql = "INSERT INTO item(IDAch,IDAdm,IDVend,categorie,prixInitial,
                                prixFinal,nom,description,typeVente,dateDebut,dateFin,vignette)
                    VALUES('$IDAch','$IDAdm','$IDVend',2,'$prixInitial',
                            '$prixInitial','$nom','$description',2,'$dateDebut','$dateFin','$nommedia')";
            // $inter = "SELECT numID FROM item ORDER BY numID DESC LIMIT 1";
            // $res = mysqli_query($db_handle, $inter);
            // $data = mysqli_fetch_assoc($res);
            // $numID = $data['numID']+1;
            // $sql2 = "INSERT INTO media(numID,nom,description)
            //             VALUES('$numID','$nommedia','')";
            }

            else{
                echo "Il y a une erreur !!!";
            }

            if(mysqli_query($db_handle, $sql)){ //AND mysqli_query($db_handle, $sql2)
                // success
                // header('Location: index.php');
            } else {
                echo 'query error: '. mysqli_error($db_handle);
            }

            if (move_uploaded_file($_FILES['nommedia']['tmp_name'], $target)){
                $msg = "L'image a été correctement chargée";
                echo '<script>alert("Image correctement inseree")</script>';
            }else{
                $msg = "Il y a eu un problème de chargement d'item";
            }


        }  
    }
    ?> </nav>

    <?php include("config/footer.php"); ?>


</body>

</html>