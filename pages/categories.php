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

require_once(dirname(__DIR__) . '/dataManagement/categoriesdataManagement.php');



?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <meta name="description" content="categories des livres disponibles a la vente sur le site(fantasy,SF,sciences,policier,cuisine,voyage) ">
    <title>Categories de livres disponibles a la vente sur le site</title>
</head>

<body>
    <h1>Categories de livres</h1>
    <div class="container">

        <div class="row">
            <?php
            //use a foreach loop to show the books categories on the site

            foreach ($datas as $data) :
            ?>

                <div class="col-md-4">
                    <div class="thumbnail">

                        <img src="../public/images/categories/<?= $data['categoryImage'] ?>" alt="<?= $data['alt'] ?>" style="width:40% ">
                        <div class="caption">


                        </div>
                        <a href="categorie.php?nom=<?= $data['categoryName'] ?>" class="mt-2 mb-2 btn btn-primary justify-content-center"> <?= $data['categoryName'] ?> </a>
                    </div>
                </div>


            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>

<?php
//require the footer of the site
require_once(dirname(__DIR__) . '/common/footer.php');
?>