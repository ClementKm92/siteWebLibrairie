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

require_once(dirname(__DIR__) . '/dataManagement/panierdataManagement.php');

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <meta name="description" content="page permettant aux clients de voir les articles composant la commande en cours de realisation">
    <title>Panier montrant commande en cours</title>
</head>

<body>
    <h1>Panier</h1>

    <table class=" mx-auto table-bordered border-dark  p-4 m-5">
        <thead>
            <tr>

                <th scope="col">Titre du livre</th>
                <th scope="col">Auteur du livre</th>
                <th scope="col">quantité</th>
                <th scope="col">prix unitaire</th>
                <th scope="col">prix global par livre </th>
                <th scope="col">Supprimer</th>

            </tr>
        </thead>
        <?php
        /*checking if the basket contain article . show the article inside if the condition is respected . we also use hidden unput to store the index of an article we want to delete */
        if ($nbArticles >= 1) {

            for ($i = 0; $i < $nbArticles; $i++) {


        ?>

                <tbody>
                    <tr>

                        <td scope="row" class="text-center"><?php echo htmlspecialchars($_SESSION["basket"]["bookTitles"][$i]); ?></td>
                        <td scope="row" class="text-center"><?php echo htmlspecialchars($_SESSION["basket"]["authorName"][$i]); ?></td>
                        <td scope="row" class="text-center"><?php echo htmlspecialchars($_SESSION["basket"]["quantity"][$i]); ?></td>
                        <td scope="row" class="text-center"><?php echo htmlspecialchars($_SESSION["basket"]["prices"][$i]); ?></td>
                        <td scope="row" class="text-center"><?php echo htmlspecialchars($_SESSION["basket"]["prices"][$i] * $_SESSION["basket"]["quantity"][$i]); ?></td>
                        <td scope="row">
                            <form action="" method="post" class="pt-3">
                                <input type="hidden" id="" name="supprBasket" name="<?php echo htmlspecialchars($i) ?>" value="<?php echo htmlspecialchars($i) ?>">

                                <input type="submit" class="btn btn-primary" name="supprimer" value="supprimer">
                            </form>
                        </td>
                    </tr>

                </tbody>
        <?php

            }
        }; ?>
    </table>

    <div class="text-center mb-5">
        <p class="h3 mb-5">Montant à régler:<?php echo $total; ?> €</p>
        <form action="" method="post">
            <input type="hidden" name="total" value=<?php echo $total; ?>>
            <input type="submit" name="paiement" value="paiement" class="btn btn-primary">
        </form>
    </div>
</body>


<?php
//require the footer of the site

require_once(dirname(__DIR__) . '/common/footer.php');

?>

</html>