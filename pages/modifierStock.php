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

require_once(dirname(__DIR__) . "/dataManagement/modifierStockdataManagement.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <meta name="description" content="page permettant de modifier le stock  d'un livre disponible a la vente">
    <title>Modification du stock d'un livre</title>
</head>

<body>
    <?php
    /*use a foreach loop to show the information of the books of a category available on the site */
    foreach ($datas as $data) :
    ?>
        <!-- using a get variable to show the book id with htmlspecialchars to reduce the xss attack risk-->
        <h1>Stock du livre <?php echo htmlspecialchars($_GET["id"]); ?> </h1>

        <div class="container text-center m-4 p-4">

            <form action="" method="post">
                <label for="">Titre du livre:<?php echo $data["bookTitle"] ?></label><br>
                <label for="">Nom de l'auteur:<?php echo $data["authorName"] ?></label><br>
                <label for="">Stock Actuel:<?php echo $data["bookSupply"] ?></label><br>
                <label for="">Nouveau Stock:</label><br>
                <input type="number" name="newBookSupply" id="" min=1 required><br>
                <input type="submit" name="ok" class="btn btn-primary mt-3" value="ok">
            </form>

        </div>
    <?php endforeach; ?>
</body>


</html>

<?php
//require the footer of the site

require_once(dirname(__DIR__) . '/common/footer.php');
?>