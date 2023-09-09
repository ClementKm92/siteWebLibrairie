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

require_once(dirname(__DIR__) . "/dataManagement/livredataManagement.php");

/*use a foreach loop to show the information of the books of a category available on the site */
foreach ($books as $book) :
    //the data are store in session variable to be use in the basket
    $_SESSION["bookId"] = $book['bookId'];
    $_SESSION["bookTitles"] = $book['bookTitle'];
    $_SESSION["authorName"] = $book['authorName'];
    $_SESSION["isbn"] = $book['isbn'];
    $_SESSION["prices"] = $book['price'];

?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/css/style.css">
        <meta name="description" content="cette page donne toute les informations sur le livre choisi par le client">
        <title><?php echo $book["bookTitle"]; ?></title>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-6 pt-5">
                    <div class="text-center">
                        <img src="../public/images/<?= $book['coverPage'] ?>" class="card-img-top " style="width:40%" alt="<?= $book['alt'] ?>">

                    </div>

                </div>

                <div class="col-6 pt-5 pb-5">

                    <p class="h1" id="titreLivre">Titre:<?= $book['bookTitle'] ?></p>

                    <p class="h2">auteur:<?= $book['authorName'] ?></p>
                    <p class="h2">Nombres de pages:<?= $book['pageNumber'] ?></p>
                    <p class="h2">editeur:<?= $book['EditorName'] ?></p>
                    <p class="h2">isbn:<?= $book['isbn'] ?></p>
                    <p class="h2">prix:<?= $book['price'] ?>€</p>
                    <p>Expeditions sous 48 heures.</p>

                    <?php
                    //we use a condition to show if the book is on stock
                    if ($supply > 0) {

                    ?>


                        <form action="panier.php" method="post">
                            <input type="number" name="quantity" value="quantity" min="1" required>
                            <button class="btn btn-primary" value="ajoutPanier" name="ajoutPanier" type="submit">ajouter au panier</button>

                        </form>

                    <?php
                        //if the book is not on stock we announce it
                    } else {
                    ?>
                        <a href="#" class="btn btn-primary btn-lg disabled" role="button" aria-disabled="true">En rupture de stock</a>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    <?php endforeach; ?>


    </body>
    <?php
    //require the footer of the site

    require_once(dirname(__DIR__) . '/common/footer.php');
    ?>

    </html>