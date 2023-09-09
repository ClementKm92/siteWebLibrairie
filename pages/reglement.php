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

require_once(dirname(__DIR__) . '/dataManagement/reglementdataManagement.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reglement de la commande</title>
</head>

<body>
    <h1>Reglement </h1>

</body>
<?php
//require the footer of the site

require_once(dirname(__DIR__) . '/common/footer.php');

?>

</html>