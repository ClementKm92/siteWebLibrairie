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
    <meta name="description" content="page montrant aux clients que leur paiement a été accepté et leur indiquant une redirection vers la page d'accueil">
    <title>Paiement Accepté</title>
</head>

<body>
    <h1>Paiement Accepté</h1>
    <p>Le paiement a été accepté</p>
    <p>Vous allez etre redirigez vers la page d'accueil dans 10 secondes.</p>
    <!--using of  the javascript setTimeout function to redirect the client to the home page after 10 seconds-->
    <script>
        setTimeout(
            function() {
                window.location.replace("accueil.php");
            }, 10000);
    </script>
</body>
<?php
//require the footer of the site

require_once(dirname(__DIR__) . '/common/footer.php');
?>

</html>