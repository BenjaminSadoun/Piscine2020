<!DOCTYPE html>
<html lang="UTF-8">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Ebay ECE</title>
</head>

<body>
    <div id="header">
        <h1 id="h1">Ebay ECE</h1>
        <h2 id="h2">La vente en ligne pour la communauté ECE Paris</h2>
    </div>

    <?php include("navig.php"); ?>

    <nav id="sayHi">

        <?php

        $nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
        $prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";
        $adresse1 = isset($_POST["adresse1"]) ? $_POST["adresse1"] : "";
        $adresse2 = isset($_POST["adresse2"]) ? $_POST["adresse2"] : "";
        $ville = isset($_POST["ville"]) ? $_POST["ville"] : "";
        $codePost = isset($_POST["codePost"]) ? $_POST["codePost"] : "";
        $pays = isset($_POST["pays"]) ? $_POST["pays"] : "";
        $num = isset($_POST["num"]) ? $_POST["num"] : "";


        // $typePay = isset($_POST["typePay"]) ? $_POST["typePay"] : "";
        // $numCarte = isset($_POST["numCarte"]) ? $_POST["numCarte"] : "";
        // $nomCarte = isset($_POST["nomCarte"]) ? $_POST["nomCarte"] : "";
        // $dateExpi = isset($_POST["dateExpi"]) ? $_POST["dateExpi"] : "";
        // $codeSecu = isset($_POST["codeSecu"]) ? $_POST["codeSecu"] : "";
        $database = "ebayece";

        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        $connection = false;
        $prenom = "";

        if ($db_found) {
            if ($_POST['inscription'] == 'acheteur') {
                $sql = "SELECT * FROM acheteur";
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
                //regarder s'il y a un résultat
                // if (mysqli_num_rows($result) !== 0) {
                //     //l'acheteur est déjà dans la BDD
                //     echo "Acheteur already exists.";
                } 
                else {
                $sqlInsert = "INSERT INTO acheteur (nom, prenom, email, mdp, adresse1, 
                adresse2, ville, codePostal, pays, numeroTel ) 
                VALUES ('$nom', '$prenom', '$email', '$mdp', '$adresse1',
                    '$adresse2', '$ville', '$codePost', '$pays', '$num' )";

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

            if ($_POST['inscription'] == 'vendeur') {
                $sql = "SELECT * FROM vendeur";
                if ($email !== "") {
                    //on cherche l'acheteur avec le paramètre email
                    $sql .= " WHERE email LIKE '%$email%'";

                    /*if ($prenom !== "") {
                        $sql .= " AND prenom LIKE '%$prenom%'";
                    }*/
                }

                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                    
                    if (mysqli_num_rows($result) !== 0) {
                        //l'acheteur est déjà dans la BDD
                        echo "Vendeur already exists.";
                    } 
                    else {
                        $sqlInsert = "INSERT INTO vendeur (nom, prenom, email, mdp) 
                        VALUES ('$nom', '$prenom', '$email', '$mdp')";

                        $result = mysqli_query($db_handle, $sqlInsert);
                        echo "Successfully added." . "<br>";

                        //  On réitère la recherche de l'acheteur
                        $result = mysqli_query($db_handle, $sql);

                        while ($data = mysqli_fetch_assoc($result)) {
                            echo "Vendeur numéro " . $data['IDVend'] . "<br>";
                            echo "Nom : " . $data['nom'] . "<br>";
                            echo "Prenom : " . $data['prenom'] . "<br>";
                            echo "Email: " . $data['email'] . "<br>";
                            echo "Mdp: " . $data['mdp'] . "<br>";
                            echo "<br>";
                        }
                    }
            }
        } else {
            echo "Database not found";
        }
        mysqli_close($db_handle);
        ?>
    </nav>

    <?php include("footer.php"); ?>


</body>

</html>