<?php

//checking the get value in order to reduce the security risk(xss attack,...)
if ($_GET["deconnexion"]) {
    $deconnexionConfirmation = trim($_GET["deconnexion"]);
    $deconnexionConfirmation = stripslashes($deconnexionConfirmation);
    $deconnexionConfirmation = htmlspecialchars($deconnexionConfirmation);
    /*destroying the data register during the session before deconnect the session*/
    if ($deconnexionConfirmation == "true") {
        session_start();
        session_unset();
        session_destroy();
        header("Location:../pages/accueil.php");
    }
}
