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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Modifier l' Email utilisé pour votre compte</title>
    <meta name="description" content="page permettant de modifier l'email utilisé par le client pour se connecter à son compte sur le site">
</head>

<body>
    <h1>Modifier votre Email</h1>
    <div class="container">

        <div class="text-center">
            <p>Pour changer votre email veuillez remplir les champs suivants:</p>
            <!-- using a session variable to show the current account email-->
            <p class="h3">Email actuel:<?php echo $_SESSION["connexionEmail"];  ?></p>
            <form method="post" action="">
                <div class="form-outline mb-4">
                    <input type="email" id="" class="form-control" name="newEmail " placeholder="nouvelle email(12 caracteres minimum" required />
                </div>

                <div class="form-outline mb-4">
                    <input type="email" id="" class="form-control " name="confirmedNewEmail" placeholder="confirmation nouvelle email" required />
                </div>



                <button type="submit" name="enregistrer" value="enregistrer" class="btn btn-primary btn-block mb-4">Enregistrer</button>
            </form>
        </div>

    </div>

</body>
<?php
//require the footer of the site

require_once(dirname(__DIR__) . '/common/footer.php');
?>

</html>