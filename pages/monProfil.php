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
    <meta name="description" content="page permettant aux clients de voir les informations le concernant">
    <title>Mon profil Perso</title>
</head>

<body>

    <h1>Mon profil</h1>
    <div class=" container text-center ">

        <div class="row">
            <div class="col-1">
                <!-- Tab navs -->
                <div class="nav flex-column  text-center">
                    <a class="btn btn-primary  mb-3" href="mesInformations.php">Mes informations</a>
                    <a class="btn btn-primary  mb-3" href="livresCommandes.php">Livres commandés</a>
                    <a class="btn btn-primary  mb-3" href="suppressionCompte.php">Suppression du compte</a>

                </div>
                <!-- Tab navs -->
            </div>
            <div class="col-11">
                <p class="mt-3">Si vous voulez modifier votre mot de passe ou votre email vous devez cliquer sur l'un des deux lien ci dessous .</p>
                <!-- use of 2 session variable to show the current mail and password -->

                <label class="h2" for="">Email actuel:<?php echo $_SESSION["connexionEmail"] ?></label><br>
                <a class="btn btn-primary mb-4" href="modifierEmail.php">Modifier votre email</a><br>

                <label class="h2" for="">Mot de passe actuel:<?php echo $_SESSION["connexionPassword"] ?></label><br>
                <a class="btn btn-primary mb-4" href="modifierMotDePasse.php">Modifier votre mot de passe</a><br>
            </div>

        </div>

    </div>

</body>

<?php
//require the footer of the site

require_once(dirname(__DIR__) . '/common/footer.php');
?>

</html>