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
    <meta name="description" content="page d'inscription a l'espace client">
    <title>Inscription</title>
</head>

<body>
    <h1>Inscription </h1>
    <div class=" container text-center">
        <p>Pour vous inscrire veuillez remplir les champs suivants:</p>
        <form action="" method="post">
            <label class="d-block" for="">Email</label>
            <input type="email" name="accountEmail" id="" required>
            <label class="d-block" for="">Mot de passe(doit contenir au moins 12 caracteres)</label>
            <input type="password" minlength="12" id="password" name="password" pattern="{12,}" title="doit  faire au minimum 12 caracteres" required>
            <label class="d-block" for="">Confirmer votre mot de passe</label>
            <input type="password" minlength="12" id="confirmPassword" name="confirmPassword" pattern="{12,}" title="doit faire au minimum 12 caracteres" required><br>

            <p>En vous inscrivant vous vous engagez à avoir lu la politique de confidentialité et l'avoir accepté.</p>
            <input type="submit" name="inscription" value="Inscription" class="btn btn-primary m-4">


        </form>
    </div>
</body>

</html>




<?php
//require the footer of the site

require_once(dirname(__DIR__) . '/common/footer.php');

?>