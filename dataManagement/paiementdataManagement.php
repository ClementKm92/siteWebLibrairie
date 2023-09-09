<?php
require_once(dirname(__DIR__) . '/functions/paiementFunctions.php');
/*use of 2 functions to recover the account id and the adress of the client(need to be finished and implement)*/
$accountId = getAccountId($_SESSION["connexionEmail"]);
$infos = checkAdress($accountId);

if (isset($_POST["reglement"])) {
    //checking if the variable are empty or not
    if (!empty($_POST["firstName"]) and !empty($_POST["Name"] and !empty($_POST["phoneNumber"]))  and !empty($_POST["streetNumber"]) and !empty($_POST["streetName"]) and !empty($_POST["city"]) and !empty($_POST["postalCode"]) and !empty($_POST["cardNumber"]) and !empty($_POST["securityCrypto"]) and !empty($_POST["cardOwner"]) and !empty($_POST["expirationDate"])) {
        //checking if each value verify specific criteria for each of them
        if (preg_match("^[A-Za-z{2} ]+$^", $_POST["firstName"]) and preg_match("^[A-Za-z ]+$^", $_POST["Name"]) and preg_match("^[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}+$^", $_POST["phoneNumber"])  and preg_match("^[0-9 ]+$^", $_POST["streetNumber"]) and preg_match("^[A-Za-z ]+$^", $_POST["streetName"]) and preg_match("^[A-Za-z ]+$^", $_POST["city"]) and preg_match("^[0-9]{5}+$^", $_POST["postalCode"]) and preg_match("^[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}+$^", $_POST["cardNumber"]) and preg_match("^[0-9]{3}+$^", $_POST["securityCrypto"]) and preg_match("^[A-Za-z{2} ]+$^", $_POST["cardOwner"]) and preg_match("^[0-9]{2}/[0-9]{2}+$^", $_POST["expirationDate"])) {
            // redirect to a page if the variable fit the criteria
            header("Location:../pages/reglement.php");
        } else {
            // redirect to an other page if the variable doesn't fit the criteria

            header("Location:../pages/paiement.php");
        }
    } else {
        echo "il y a une erreur.";
    }
}
