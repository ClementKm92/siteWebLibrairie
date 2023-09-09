<?php
require_once(dirname(__DIR__) . "/functions/inscriptionFunctions.php");
//checking if the variable re empty and if they fit  security criteria
if (isset($_POST["inscription"])) {
    if (!empty($_POST["accountEmail"]) and !empty($_POST["password"]) and !empty($_POST["confirmPassword"])) {
        if ($_POST["password"] == $_POST["confirmPassword"]) {
            if (
                filter_var($_POST["accountEmail"], FILTER_VALIDATE_EMAIL) and strlen($_POST["password"]) >= 12
                and  strlen($_POST["confirmPassword"]) >= 12
            ) {

                //we hash the account password before we insert him in the database
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

                //we use this function to insert the data of the new account in the database
                memberInscription($_POST["accountEmail"], $password);
            } else {
                echo "email et ou mot de passe incorrect";
            }
        } else {
            echo "les mots de passe ne correspondent pas";
        }
    } else {
        echo "Veuillez saisir votre mail et ou votre mot de passe";
    }
}
