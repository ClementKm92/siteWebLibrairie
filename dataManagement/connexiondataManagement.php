<?php
//adminpassword=passwordAmin1!
//clientpassword=passwordClient1!
require_once(dirname(__DIR__) . "/functions/connexionFunctions.php");
//checking if the values exist and if they respect criterias
if (isset($_POST["connexion"])) {
    if (!empty($_POST["connexionEmail"]) and filter_var($_POST["connexionEmail"], FILTER_VALIDATE_EMAIL) and !empty($_POST["connexionPassword"]) and strlen($_POST["connexionPassword"]) >= 12) {
        //checking if the user is the admin
        if ($_POST["connexionEmail"] == "JohnDoe1@test.com" and $_POST["connexionPassword"] == "passwordAmin1!") {
            header("Location:../pages/accueil.php");
        }
        //store 2 data in session variable in order to use them later
        $_SESSION["connexionEmail"] = $_POST["connexionEmail"];
        $_SESSION['connexionPassword'] = $_POST["connexionPassword"];
        //we retrieve the hash of the password
        $connexionPassword = getPassword($_SESSION["connexionEmail"]);
        //we check if the password enter match with the passowrd hash
        $passwordVerify = password_verify($_SESSION["connexionPassword"], $connexionPassword);
        //checking if the email and the password match with the user data
        if ($passwordVerify == true) {
            $connexionTest = connexionCheck($_SESSION["connexionEmail"], $connexionPassword);
            $_SESSION["connexionTest"] = $connexionTest;
            //redirect to the home page with client header if the data match
            if ($connexionTest == 1) {
                header("Location:../pages/accueil.php");
            } else {
                echo "email incorrect";
            }
        } else {
            echo "mot de passe ou email incorrect";
        }
    } else {
        echo "veuillez saisir un identifiant et un mot de passe";
    }
}
