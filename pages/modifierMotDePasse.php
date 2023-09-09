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

require_once(dirname(__DIR__) . "/dataManagement/modificationInfodataManagement.php");

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <meta name="description" content="page permettant aux clients de modifier le mot de passe qu'il utilise sur le site">
    <title>Modifier le Mot de passe utilisé pour votre compte</title>
</head>

<body>
    <h1>Modifier votre Mot de passe</h1>
    <div class="container">

        <div class="text-center">
            <p>Pour changer votre mot de passe veuillez remplir les champs suivants:</p>
            <!-- using a session variable to show the current account email-->

            <p class="h3">Mot de passe actuel actuel:<?php echo $_SESSION["connexionPassword"];  ?></p>
            <form method="post" action="">
                <div class="form-outline mb-4">
                    <input type="password" id="" class="form-control" name="newPassword " placeholder="nouveaux mot de passe(12 caracteres minimum)" min="12" required />
                </div>

                <div class="form-outline mb-4">
                    <input type="password" id="" class="form-control " name="confirmedNewPassword" placeholder="confirmation nouvelle mot de passe(12 caracteres minimum)" min="12" required />
                </div>

                <!-- Submit button -->
                <button type="submit" name="enregistrerMdp" value="enregistrer" class="btn btn-primary btn-block mb-4">Enregistrer</button>
            </form>
        </div>

    </div>

</body>
<?php
//require the footer of the site

require_once(dirname(__DIR__) . '/common/footer.php');
?>

</html>