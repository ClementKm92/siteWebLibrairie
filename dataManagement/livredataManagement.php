<?php
require_once('../functions/livreFunctions.php');
//check  the get data for security reasons
if (($_GET["titre"])) {
        $bookTitle = checkData($_GET["titre"]);
        /*check if the title exist in the database and redirect hte client to an error page if he doesn't*/
        $title = checkTitle($bookTitle);
        if ($title == 1) {
                $_SESSION["titre"] = $title;
        } else {
                header("Location:../pages/Error404.php");
        }
} else {
        header("Location:../pages/accueil.php");
}


//tell us if the book is in stock
$infos = supplyCheck($_GET["titre"]);

foreach ($infos as $info) {
        // this loop give us the supplyBook info which is gonna allow us to see if the book is out of stock
        $supply = $info['bookSupply'];
}

//give us the info about the book selected
$books = getBook($_GET["titre"]);
