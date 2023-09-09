<?php

require_once(dirname(__DIR__) . "/functions/modifierStockFunctions.php");

//check if the data is numeric
if (!empty($_GET["id"])) {
    if (is_numeric($_GET["id"])) {
        //recover the bookInfo with a function
        $datas = bookInfo($_GET["id"]);
        //redirect to an error page if the variable is null
        if ($datas == null) {
            header("Location:../pages/Error404.php");
        }
    } else {
        echo "le livre n'existe pas";
    }
}

//checking if the new stock variable is not empty and numeric 
if (!empty($_POST["newBookSupply"])) {
    if (is_numeric($_POST["newBookSupply"])) {
        // using a function to update the stock of the book
        updateStock($_GET["id"], $_POST["newBookSupply"]);
    } else {
        echo "erreur";
    }
}
