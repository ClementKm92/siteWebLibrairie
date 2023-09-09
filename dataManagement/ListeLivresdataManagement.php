<?php


require_once(dirname(__DIR__) . "/functions/ListeLivresFunctions.php");
//recover the books in the database with a function
$datas = bookList();

//check if a suppression variable exist and use of a function to delete a book
if (isset($_POST["supprimer"])) {
    if (isset($_POST["supprId"])) {
        $_SESSION["supprId"] = ($_POST["supprId"]);
        deleteBook($_POST["supprId"]);
    }
}
