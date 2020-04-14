<?php
    //recuperer les données venant de la page HTML
    //le parametre de $_POST = "name" de <input> de votre page HTML
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $email = isset($_POST["email"])? $_POST["email"] : "";
    $mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
    $adresse1 = isset($_POST["adresse1"])? $_POST["adresse1"] : "";
    $adresse2 = isset($_POST["adresse2"])? $_POST["adresse2"] : "";
    $ville = isset($_POST["ville"])? $_POST["ville"] : "";
    $codePost = isset($_POST["codePost"])? $_POST["codePost"] : "";
    $pays = isset($_POST["pays"])? $_POST["pays"] : "";
    $num = isset($_POST["num"])? $_POST["num"] : "";


    $typePay = isset($_POST["typePay"])?$_POST["typePay"]:"";
    $numCarte = isset($_POST["numCarte"])?$_POST["numCarte"]:"";
    $nomCarte = isset($_POST["nomCarte"])?$_POST["nomCarte"]:"";
    $dateExpi = isset($_POST["dateExpi"])?$_POST["dateExpi"]:"";
    $codeSecu = isset($_POST["codeSecu"])?$_POST["codeSecu"]:"";
 

    if($nom || $prenom || $email || $mdp || $adresse1 || $adresse2 || $ville || $codePost || $pays || $num
    || $typePay || $numCarte || $nomCarte || $dateExpi || $codeSecu) {
        //identifier votre BDD
        $database = "ebayece";

        //connectez-vous dans votre BDD
        //Rappel: votre serveur = localhost et votre login = root et votre password = <rien> ou root
        $db_handle = mysqli_connect('localhost', 'root','');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
            $sql = "SELECT * FROM acheteur";


            if ($_POST["button1"]) {
                if ($email !== "") {
                    //on cherche l'acheteur avec le paramètre email
                    $sql .= " WHERE email LIKE '%$email%'";

                    /*if ($prenom !== "") {
                        $sql .= " AND prenom LIKE '%$prenom%'";
                    }*/
                }

                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
	            
                //regarder s'il y a un résultat
                if (mysqli_num_rows($result) !== 0) {
                    //l'acheteur est déjà dans la BDD
                    echo "Acheteur already exists.";
                } else {
                    $sqlInsert = "INSERT INTO acheteur (nom, prenom, email, mdp, adresse1, 
                    adresse2, ville, codePostal, pays, numeroTel ) 
                    VALUES ('$nom', '$prenom', '$email', '$mdp', '$adresse1',
                     '$adresse2', '$ville', '$codePost', '$pays', '$num' )";

                    /*$sqlInsert = "INSERT INTO cartebancaire (typePayement, numCarte, nomCarte, dateExpi, codeSecu )
                    VALUES ('$typePay', '$numCarte', '$nomCarte', '$dateExpi', '$codeSecu' )";*/


                    $result = mysqli_query($db_handle, $sqlInsert);

                    echo "Successfully added." . "<br>";

                    //  On réitère la recherche de l'acheteur
                    $result = mysqli_query($db_handle, $sql);

                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "Acheteur numéro " . $data['IDAch'] . "<br>";
                        echo "Nom : " . $data['nom'] . "<br>";
                        echo "Prenom : " . $data['prenom'] . "<br>";
                        echo "Email: " . $data['email'] . "<br>";
                        echo "Adresse 1 : " . $data['adresse1'] . "<br>";
                        echo "Adresse 2 : " . $data['adresse2'] . "<br>";
                        echo "Ville : " . $data['ville'] . "<br>";
                        echo "Code postal : " . $data['codePostal'] . "<br>";
                        echo "Pays : " . $data['pays'] . "<br>";
                        echo "Numéro de téléphone : " . $data['numeroTel'] . "<br>";
                        echo "<br>";  
                    }
                }
            }
        } else {
            echo "Database not found";
        }
        //fermer la connexion
        mysqli_close($db_handle);
    } else {
        echo "Empty fields";
    }
    
?>