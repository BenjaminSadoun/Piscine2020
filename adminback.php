<?php

$nom = isset($_POST["nom"]) ? $_POST["nom"] : ""; //if then else
$prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$MdP = isset($_POST["MdP"]) ? $_POST["MdP"] : "";
$erreur = "";
$database = "ebayece";
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

$utilisateur = "Désolé, les informations entrées ne sont pas correctes";

if ($db_found) 
{
    $sql = "SELECT * FROM admin";
    $result = mysqli_query($db_handle, $sql);

    while ($data = mysqli_fetch_assoc($result)) 
    {
        if ($nom == $data['nom'] && $prenom == $data['prenom'] 
         && $email == $data['email'] && $MdP == $data['mdp'])
        {
            $utilisateur = $prenom;
        }
        // echo "ID: " . $data['IDAdm'] . '<br>';
        // echo "Nom:" . $data['nom'] . '<br>';
        // echo "Prénom: " . $data['prenom'] . '<br>';
        // echo "Email: " . $data['email'] . '<br>';
        // echo "Mot de Passe: " . $data['mdp'] . '<br>';
    }//end while
    echo "Bonjour " . $utilisateur . "!";
}//end if
//si le BDD n'existe pas
else {
    echo "Database not found";
   }//end else
   //fermer la connection
   mysqli_close($db_handle);


// if ($nom == "") {
//     $erreur .= "Nom est vide. <br>";
// }
// if ($prenom == "") {
//     $erreur .= "Prenom est vide. <br>";
// }
// if ($email == "") {
//     $erreur .= "Email est vide. <br>";
// }
// if ($MdP == "") {
//     $erreur .= "Mot de Passe est vide. <br>";
// }
// if ($erreur == "") {
//     echo "Formulaire valide";
// } else {
//     echo "Erreur : $erreur";
// }
