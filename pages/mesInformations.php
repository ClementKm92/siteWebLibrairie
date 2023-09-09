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
    <title>Mes Informations Personnelles</title>
    <meta name="description" content="page permettant aux clients de remplir ses informations personnelle pour les  utilisés au moment du paiement">
</head>

<body>
    <h1>Mes informations Personnelles</h1>
    <p class="text-center">Veuillez remplir les champs suivants pour enregistrer vos informations personnelles.</p>


    <div class="text-center mx-auto  w-25">
        <form action="" method="post">

            <label class="form-label" for="">Prenom</label>
            <input type="text" class="form-control" name="firstName" id="" min="2" required>
            <label class="form-label" for="">Nom</label>
            <input type="text" class="form-control" name="Name" id="" required>
            <label class="form-label" for="">Telephone</label>
            <input type="tel" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" class=" form-control" name="phoneNumber" id="" required>
            <label class="form-label" for="">Email</label>
            <input type="email" class="form-control" name="clientEmail" id="" required>
            <label class="form-label" for="">Numero de rue</label>
            <input type="number" class="form-control" name="streetNumber" id="" required>
            <label class="form-label" for="">Nom de rue</label>
            <input type="text" class="form-control" name="streetName" id="" required>
            <label class="form-label" for="">Ville</label>
            <input type="text" class="form-control" name="city" id="" required>
            <label class="form-label" for="">Code postal</label>
            <input type="text" class="form-control" name="postalCode" id="" pattern="[0-9]{5}" required>
            <input type="submit" class="btn btn-primary mt-4" name="enregistrementInfoPerso" value="enregistrement">

        </form>

    </div>


</body>
<?php
//require the footer of the site

require_once(dirname(__DIR__) . '/common/footer.php');
?>

</html>