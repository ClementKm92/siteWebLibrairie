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

require_once(dirname(__DIR__) . "/dataManagement/connexiondataManagement.php");

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <meta name="description" content="connexion a l'espace client du site">
    <title>Connexion a l'espace client</title>
</head>

<body>
    <h1>Connexion a l'espace client</h1>

    <div class="container text-center m-4 p-4">
        <p>Pour vous connecter veuillez remplir les champs suivants:</p>
        <form action="" method="post">
            <label for="">Veuillez saisir votre email</label><br>
            <input type="email" name="connexionEmail" id="" min=5 required><br>
            <label for="">Veuillez saisir votre mot de passe</label><br>
            <input type="password" name="connexionPassword" id="" min=12 required><br>
            <input type="submit" name="connexion" class="btn btn-primary mt-3" value="connexion">
        </form>

        <p>Pour vous créer un compte veuillez cliquer sur le lien suivant</p>
        <a href="inscription.php" title="page d'inscription au site" class="btn btn-primary">Inscription</a>

        <p>En cas d'oubli de votre mot de passe ou de votre email veuillez nous contacter en utilisant le formulaire de contact.</p>
    </div>
</body>

</html>




<?php
//require the footer of the site

require_once(dirname(__DIR__) . '/common/footer.php');

?>