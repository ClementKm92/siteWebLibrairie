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

require_once(dirname(__DIR__) . "/dataManagement/ajouterLivresdataManagement.php");

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Ajouter un livre au stock</title>
    <meta name="description" content="permet d'ajouter un nouveau livre sur le site">
</head>

<body>

    <h1>Ajouter un livre</h1>

    <form action="" method="post">
        <div class=" pt-4 mx-auto col-lg-4 col-lg-offset-4">
            <div class="row mb-4">

                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="" class="form-control" name="bookTitle" required />
                        <label class="form-label" for="form6Example1">Titre</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="" class="form-control" name="authorName" required />
                        <label class="form-label" for="form6Example2">Auteur</label>
                    </div>
                </div>
            </div>

            <div class="form-outline mb-4">
                <input type="text" id="" class="form-control" name="editorName" required />
                <label class="form-label" for="form6Example3">Editeur</label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" id="" class="form-control" name="releaseDate" required />
                <label class="form-label" for="form6Example4">Date de sortie(année/mois/jour)</label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" id="" class="form-control" name="isbn" required />
                <label class="form-label" for="form6Example5">Isbn</label>
            </div>

            <!-- Number input -->
            <div class="form-outline mb-4">
                <input type="number" id="" class="form-control" name="pageNumber" required />
                <label class="form-label" for="form6Example6">Nombre de page</label>
            </div>

            <!-- Number input -->
            <div class="form-outline mb-4">
                <input type="number" id="" class="form-control" name="categoryId" required />
                <label class="form-label" for="form6Example6">Categorie</label>
            </div>

            <!-- Number input -->
            <div class="form-outline mb-4">
                <input type="number" id="" class="form-control" name="price" required />
                <label class="form-label" for="form6Example6">Prix</label>
            </div>

            <!-- Number input -->
            <div class="form-outline mb-4">
                <input type="number" id="" class="form-control" name="bookSupply" required />
                <label class="form-label" for="form6Example6">Stock</label>
            </div>

            <!-- Number input -->
            <div class="form-outline mb-4">
                <input type="text" id="" class="form-control" name="coverPage" required />
                <label class="form-label" for="form6Example6">Illustration</label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" id="" class="form-control" name="alt" required />
                <label class="form-label" for="form6Example6">Alt</label>
            </div>
            <!-- Submit button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block mb-4 " name="ajouter">Ajouter</button>

            </div>
        </div>
    </form>
</body>

</html>
<?php
//require the footer of the site

require_once(dirname(__DIR__) . '/common/footer.php');

?>