<?php
//starting the session
session_start();
/*checking the value of 2 session variable to determine which header is gonna be show*/
if (isset($_SESSION["connexionEmail"]) and isset($_SESSION["connexionPassword"])) {
    if ($_SESSION["connexionTest"] == 1) {
        if ($_SESSION["connexionEmail"] == "JohnDoe1@test.com" and $_SESSION["connexionPassword"] == "passwordAmin1!") {
            require_once(dirname(__DIR__) . '/common/headerAdmin.php');
        } else {
            require_once(dirname(__DIR__) . '/common/headerAccount.php');
        }
    } else {
        require_once(dirname(__DIR__) . '/common/header.php');
    }
} else {
    require_once(dirname(__DIR__) . '/common/header.php');
}
//require this file allow us to manage the data in an other file
require_once(dirname(__DIR__) . "/dataManagement/inscriptiondataManagement.php");



?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charet="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <meta name="description" content="page de la politique de confidentialité">
    <title>Politique de confidentialité</title>
</head>

<body>
    <h1>Politique de confidentialité </h1>
    <div class=" container text-center">
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore consequuntur ducimus corrupti rem quis nulla sed blanditiis nisi minima, eveniet quam qui magni minus assumenda tenetur atque! Repellat, earum debitis!</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore consequuntur ducimus corrupti rem quis nulla sed blanditiis nisi minima, eveniet quam qui magni minus assumenda tenetur atque! Repellat, earum debitis!</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore consequuntur ducimus corrupti rem quis nulla sed blanditiis nisi minima, eveniet quam qui magni minus assumenda tenetur atque! Repellat, earum debitis!</p>
    </div>
</body>

</html>




<?php
//require the footer of the site

require_once(dirname(__DIR__) . '/common/footer.php');

?>