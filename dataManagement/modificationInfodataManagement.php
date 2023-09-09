<?php

require_once(dirname(__DIR__) . "/functions/modificationInfoFunctions.php");
//check if the variable is not empty and if she is a validate email
if (isset($_POST["enregistrer"])) {
    if (!empty($_POST["confirmedNewEmail"]) and filter_var($_POST["confirmedNewEmail"], FILTER_VALIDATE_EMAIL)) {
        /*recover the id of the account with a function and use an other one to change the email*/
        $accountId = getAccountId($_SESSION["connexionEmail"]);
        changeEmail($_POST["confirmedNewEmail"], $accountId);
    } else {
        echo 'format de l email incorrect';
    }
}
//check if the variable is not empty and if she is had the correct minimum length
if (isset($_POST["enregistrerMdp"])) {
    if (!empty($_POST["confirmedNewPassword"]) and strlen($_POST["confirmedNewPassword"]) >= 12) {
        /*recover the id of the account with a function,use a hash function for security reason and use an other function  to change the password*/
        $accountId = getAccountId($_SESSION["connexionEmail"]);
        $password = password_hash($_POST["confirmedNewPassword"], PASSWORD_DEFAULT);
        changePassword($_POST["confirmedNewPassword"], $password, $accountId);
    } else {
        echo "mot de passe trop court";
    }
}


if (isset($_POST["enregistrementInfoPerso"])) {
    //check if the variable are not empty
    if (!empty($_POST["firstName"]) and !empty($_POST["Name"] and !empty($_POST["phoneNumber"])) and !empty($_POST["clientEmail"]) and !empty($_POST["streetNumber"]) and !empty($_POST["streetName"]) and !empty($_POST["city"]) and !empty($_POST["postalCode"])) {
        //check if the variable respect specific conditions for each of her
        if (preg_match("^[A-Za-z{2} ]+$^", $_POST["firstName"]) and preg_match("^[A-Za-z ]+$^", $_POST["Name"]) and preg_match("^[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}+$^", $_POST["phoneNumber"]) and filter_var($_POST["clientEmail"], FILTER_VALIDATE_EMAIL) and preg_match("^[0-9 ]+$^", $_POST["streetNumber"]) and preg_match("^[A-Za-z ]+$^", $_POST["streetName"]) and preg_match("^[A-Za-z ]+$^", $_POST["city"]) and preg_match("^[0-9]{5}+$^", $_POST["postalCode"])) {
            /*recover the account id with a function and sotre the client data in the database using an other function*/
            $Accountid = getAccountId($_SESSION["connexionEmail"]);
            registerPersonalData($Accountid, $_POST["firstName"], $_POST["Name"], $_POST["phoneNumber"], $_POST["clientEmail"], $_POST["streetNumber"], $_POST["streetName"], $_POST["city"], $_POST["postalCode"]);
        } else {
            header("Location:../pages/mesInformations.php");
        }
    }
}
