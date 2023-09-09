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

require_once(dirname(__DIR__) . '/dataManagement/paiementdataManagement.php');

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <meta name="description" content="page permettant aux clients de remplir ses informations personnelle pour regler la commande en cours">
    <title>Paiement de la commande</title>
</head>

<body>
    <h1>Paiement</h1>
    <div class="col-6 w-25 mx-auto text-center">
        <p>Veuillez remplir les champs suivants:</p>

        <form action="" method="post">
            <label class="form-label" for="">Prenom</label>
            <input type="text" class="form-control" name="firstName" min="2" id="" required>
            <label class="form-label" for="">Nom</label>
            <input type="text" class="form-control" name="Name" min="" id="" required>
            <label class="form-label" for="">Telephone(**-**-**-**-**)</label>
            <input type="tel" class="form-control" name="phoneNumber" min="" id="" required>
            <label class="form-label" for="">Numero de rue</label>
            <input type="number" class="form-control" name="streetNumber" min="1" id="" required>
            <label class="form-label" for="">Nom de rue</label>
            <input type="text" class="form-control" name="streetName" min="5" id="" required>
            <label class="form-label" for="">Ville</label>
            <input type="text" class="form-control" name="city" id="" required>
            <label class="form-label" for="">Code postal</label>
            <input type="text" class="form-control" name="postalCode" id="" pattern="[0-9]{5}" required>
            <label class="form-label" for="">Numero de la carte(****-****-****-****)</label>
            <input type="text" class="form-control" name="cardNumber" id="" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" required>
            <label class="form-label" for="">Cryptogramme de securité( 3 chiffre au dos de la carte)</label>
            <input type="text" class="form-control" name="securityCrypto" id="" pattern="[0-9]{3}" required>
            <label class="form-label" for="">Proprietaire de la carte</label>
            <input type="text" class="form-control" name="cardOwner" id="" min="3" required>
            <label class="form-label" for="">Date d'expiration de la carte(mois/annee)</label>
            <input type="text" class="form-control" name="expirationDate" id="" pattern="[0-9]{2}/[0-9]{2}" required>
            <input type="submit" class="btn btn-primary mt-4" name="reglement" value="reglement">

        </form>

    </div>

</body>
<?php
//require the footer of the site

require_once(dirname(__DIR__) . '/common/footer.php');

?>

</html>