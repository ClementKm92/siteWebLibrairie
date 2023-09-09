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
    <meta name="description" content="cette page evoque  l'histoire de la librairie et pourquoi le site a été crée ">
    <title>A propos de notre librairie</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 pb-5 pt-5">
                <h1>A propos de nous</h1>
                <p>Ce site a été réalisé dans le cadre du passage d'un titre professionnel concepteur développeur d'applications .L'examen est prévu pour l'automne 2023.Il n'a pas vocation à être utilisé à des fins commerciales. </p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora excepturi temporibus qui aut ducimus fugiat dicta nulla molestiae impedit vero porro blanditiis quod voluptas distinctio soluta maxime, aspernatur ipsum? Eum.</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora excepturi temporibus qui aut ducimus fugiat dicta nulla molestiae impedit vero porro blanditiis quod voluptas distinctio soluta maxime, aspernatur ipsum? Eum.</p>

            </div>


            <div class="col-6 pb-5 pt-5">
                <img src="../public/images/aPropos/bookshop-2495148_1280.jpg" class="img-fluid" alt="image de la librairie">

            </div>
        </div>
    </div>
</body>

</html>





<?php
//require the footer of the site

require_once(dirname(__DIR__) . "/common/footer.php");

?>