<?php
session_start();
?>

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

    <?php include("config/navig.php"); ?>

    <nav id="sayHi">
        <?php
        $identifiant = isset($_POST["identifiant"]) ? $_POST["identifiant"] : "";
        $MdP = isset($_POST["MdP"]) ? $_POST["MdP"] : "";

        $typePay = isset($_POST["typePay"]) ? $_POST["typePay"] : "";
        $numCarte = isset($_POST["numCarte"]) ? $_POST["numCarte"] : "";
        $nomCarte = isset($_POST["nomCarte"]) ? $_POST["nomCarte"] : "";
        $dateExpi = isset($_POST["dateExpi"]) ? $_POST["dateExpi"] : "";
        $codeSecu = isset($_POST["codeSecu"]) ? $_POST["codeSecu"] : "";

        $erreur = "";
        $database = "ebayece";
        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);
        $numID = $_SESSION['numID'];
        $IDAch = $_SESSION['IDAch'];
        $prixInitial = $_SESSION['prixInitial'];

        $transaction = false;
        $prenom = "";

        if ($db_found) {
            $sql = "SELECT * FROM cartebancaire WHERE IDAch = $IDAch";
            $result = mysqli_query($db_handle, $sql);

            while ($data = mysqli_fetch_assoc($result)) {
                $solde = $data['solde'];
                if (($typePay == $data['typePayement'] && $numCarte == $data['numCarte'] &&
                    $nomCarte == $data['nomCarte'] && $dateExpi == $data['dateExpi'] &&
                    $codeSecu == $data['codeSecu']) &&
                    $prixInitial < $solde){
                    $prenom = $_SESSION['prenom'];
                    
                    $transaction = true;                  
                }
            }
            if ($transaction == false) {
                if ($solde < $prixInitial) {
                    echo "Désolé, mais il semble que nous n'arrivions à effectuer la transaction...";
                }else{
                echo "Il y a eu un problème de vérification de votre carte!
                 Veuillez vérifier vos coordonnées bancaires.";
                }
            } else {
                $solde -= $prixInitial;
                $sql2 = "UPDATE cartebancaire SET solde = '$solde' WHERE IDAch = $IDAch ";
                $result = mysqli_query($db_handle, $sql2);
                echo "Felicitations " . $prenom . "! Vous venez d'acheter un objet. Il vous reste " . $solde .
                "euros sur votre compte";
                $sql3 = "DELETE FROM item WHERE numID = $numID ";
                $result = mysqli_query($db_handle, $sql3);
        ?>
                <br>
                <a href="index.php">Retourner à l'accueil</a>
        <?php
            }
        } else {
            echo "Database not found";
        }
        mysqli_close($db_handle);
        ?>
    </nav>

    <?php include("config/footer.php"); ?>


</body>

</html>