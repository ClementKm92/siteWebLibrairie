<?php
require_once("../functions/panierFunctions.php");
//checking if a basket exist
if (empty($_SESSION["basket"])) {
    createBasket();
}
if (isset($_POST["ajoutPanier"])) {
    if (!empty($_POST["quantity"])) {
        /*checking if the variable which store the quantity of the article respect 2 conditions*/
        if (is_numeric($_POST["quantity"]) and strlen($_POST["quantity"]) >= 1) {
            $_SESSION['quantity'] = $_POST["quantity"];
            //using a functions to add an article to the basket
            $basket = addArticle($_SESSION['bookTitles'], $_SESSION['authorName'], $_SESSION["quantity"], $_SESSION['prices']);
        } else {
            echo "veuillez saisir un chiffre";
        }
    } else {
        echo "veuillez saisir une quantité";
    }
}


//countig the number of article in the basket
$nbArticles = count($_SESSION["basket"]["bookTitles"]);
$total = 0;
//we use a loop to calculate the total price of the basket
if ($nbArticles >= 1) {
    for ($i = 0; $i < $nbArticles; $i++) {
        $total = $total + $_SESSION["basket"]["prices"][$i] * $_SESSION["basket"]["quantity"][$i];
    }
}

if (isset($_POST["supprimer"])) {
    if (isset($_POST["supprBasket"])) {
        // /*checking if the variable which delete the article respect 2 conditions(numeric because it is an index)*/
        if (is_numeric($_POST["supprBasket"])) {
            $_SESSION["supprBasket"] = ($_POST["supprBasket"]);
            //using a functions to delete an article to the basket

            deleteArticle($_SESSION["supprBasket"]);
        }
    } else {
        header("Location:../pages/panier.php");
    }
}
if (isset($_POST["paiement"])) {
    //checking if the variable which store the total of the basket is numeric
    if (is_numeric($_POST["total"])) {
        if ($_SESSION["connexionTest"] == 1) {
            $_SESSION["totalPanier"] = $_POST["total"];
            header("Location:../pages/paiement.php");
        } else {
            header("Location:../pages/connexion.php");
        }
    } else {
        header("Location:../pages/panier.php");
    }
}
