<?php
require_once(dirname(__DIR__) . "/functions/suppressionCompteFunctions.php");

//check if the variable link to the submit exist 
if (isset($_POST["suppressionCompte"])) {
    //we recover the account id with a function and store it in a variable
    $accountId = getAccountId($_SESSION["connexionEmail"]);
    //use of 3 functions to delete everything related to the account
    deleteOrderBooks($accountId);
    deleteClient($accountId);
    deleteAccount($accountId);
    //redirection to the deconnexion page to deconnect from the site
    header("Location:../pages/deconnexion.php?deconnexion=true");
}
