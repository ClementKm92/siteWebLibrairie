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
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <meta name="description" content="page d'erreur 404 du site si la page demandé n'existe pas">
    <title>ERREUR 404</title>
</head>

<body>
    <div class="container pb-5 mb-5">

        <h1 class="">ERREUR 404</h1>
        <p class="h2 text-center ">Cette page n'existe pas.</p>
        <div class="text-center mt-5">
            <a href="accueil.php" class="btn btn-primary justify-content-center">Retour a la page d'accueil</a>

        </div>

    </div>
</body>

</html>

<?php
//require the footer of the site

require_once(dirname(__DIR__) . '/common/footer.php');

?>