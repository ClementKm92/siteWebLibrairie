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
require_once(dirname(__DIR__) . '/dataManagement/suppressionComptedataManagement.php')
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <meta name="description" content="page permettant aux clients de supprimer leur compte du site et les informations qu'ils lui sont attachés">
    <title>Suppression de votre compte</title>
</head>

<body>
    <h1 class="mt-5 mb-5">Suppression du compte</h1>

    <p class=" h2 text-center mt-5 mb-5">Pour supprimer votre compte et toutes les informations associés veuillez cliquer sur le bouton ci dessous.</p>

    <form action="" method="post" class="text-center mb-5 mt-5">
        <input type="submit" class="btn btn-primary " name="suppressionCompte" value="suppression">
    </form>
</body>
<?php
//require the footer of the site

require_once(dirname(__DIR__) . '/common/footer.php');
?>

</html>