<?php
//starting the session
session_start();
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

    <meta name="description" content="Mentions legale du site">
    <title>Mentions Legales du site</title>
</head>

<body>

    <h1>Mentions Legales</h1>

    <p>Directeur de publication:John Doe</p>
    <p>Pour contacter le directeur du site veuillez envoyer un mail à l'adresse suivante:
        adresseDeTest[at]gmail.com
        Vous pouvez egalement nous contacter au ............
        La librairie est ouverture du lundi au samedi de 09h a 12h et de 13h a 18h.
        Adresse:rue des ..............., ..... .......... France
    </p>

    <p>Le site siteDeTest.com est publié par Librairie Fléchir, rue des ..............., ..... .......... France
    </p>

    <p>Société anonyme au capital de ........ €
        R.C.S. ................
        Identifiant TVA : FR ................
    </p>

    <p>Le site est conçu et réalisé par ........ à .........

        Le site est hébergé par ovh ou 1on1 ou un autre hebergeur(adresse et numéro de téléphone).
    </p>
    <p>Les photos utilisés sur ce site sons sous licence creative comons et ont été trouve avec google image.</p>

    <p>RGPD:La societe librairie flechir collecte certaines données afin de gérer votre commande. Les données que nous collectons ne seront pas transmise à un autre organisme.Si vous souhaitez les modifiez ou les supprimez vous pouvez nous contacter à l'adresse suivante:
        librairieFlechir@test.com
    </p>


    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis, aliquid. Nulla deleniti at totam vitae, doloremque, incidunt omnis voluptates commodi voluptatum reiciendis, veritatis odio quaerat ab exercitationem accusantium consequuntur rerum.</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis quidem placeat, hic magni eligendi repellendus perferendis corrupti pariatur nesciunt corporis omnis. Quis non provident quos ea culpa odit, quia voluptatem.</p>




</body>

</html>

<?php
//require the footer of the site

require_once(dirname(__DIR__) . "/common/footer.php");

?>