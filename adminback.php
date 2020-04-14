<?php

$email = isset($_POST["email"]) ? $_POST["email"] : "";
$MdP = isset($_POST["MdP"]) ? $_POST["MdP"] : "";
$erreur = "";
$database = "ebayece";
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

$connection = false;
$prenom = "";

if ($db_found) 
{
    $sql = "SELECT * FROM admin";
    $result = mysqli_query($db_handle, $sql);

    while ($data = mysqli_fetch_assoc($result)) 
    {
        if ($email == $data['email'] && $MdP == $data['mdp'])
        {
            $connection = true;
            $prenom = $data['prenom'];
        }
    }

    if ($connection == false) {
        echo "Il y a eu un problème de connexion! vérifier votre identifiant et votre mot de passe";
    }
    else{
        echo "Bonjour " . $prenom . "!";
    }
    
}

else {
    echo "Database not found";
   }
   mysqli_close($db_handle);
