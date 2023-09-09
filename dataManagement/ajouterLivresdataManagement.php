<?php

require_once(dirname(__DIR__) . "/functions/ajouterLivresFunctions.php");
//we check if the  data exist and we use a function to add the new book
if (isset($_POST["ajouter"])) {
    addBook($_POST["bookTitle"], $_POST["authorName"], $_POST["editorName"], $_POST["releaseDate"], $_POST["isbn"], $_POST["pageNumber"], $_POST["categoryId"], $_POST["price"], $_POST["bookSupply"], $_POST["coverPage"], $_POST["alt"]);
}
