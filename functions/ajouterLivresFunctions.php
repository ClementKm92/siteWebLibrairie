<?php
function addBook($bookTitle, $authorName, $editorName, $releaseDate, $isbn, $pageNumber, $categoryId, $price, $bookSupply, $coverPage, $alt)
{
    try {
        //connection to the database
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*creation of the prepare query and execution of it to add a new book in the database(prepare query is for reduce the risk of sql injection*/
        $req = $database->prepare("INSERT INTO book(bookTitle,authorName,editorName,releaseDate,isbn,pagenumber,categoryId,price,bookSupply,coverPage,alt) VALUES(:bookTitle,:authorName,:editorName,:releaseDate,:isbn,:pageNumber,:categoryId,:price,:bookSupply,:coverPage,:alt)");
        //using bindParam to reduce the risk of sql injection
        $req->bindParam(':bookTitle', $bookTitle, PDO::PARAM_STR);
        $req->bindParam(':authorName', $authorName, PDO::PARAM_STR);
        $req->bindParam(':editorName', $editorName, PDO::PARAM_STR);
        $req->bindParam(':releaseDate', $releaseDate);
        $req->bindParam(':isbn', $isbn, PDO::PARAM_STR);
        $req->bindParam(':pageNumber', $pageNumber, PDO::PARAM_INT);
        $req->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
        $req->bindParam(':price', $price, PDO::PARAM_INT);
        $req->bindParam(':bookSupply', $bookSupply, PDO::PARAM_INT);
        $req->bindParam(':coverPage', $coverPage, PDO::PARAM_STR);
        $req->bindParam(':alt', $alt, PDO::PARAM_STR);
        $req->execute();
        //we close the cursor to allow other request
        $req->closeCursor();
        header("Location:ListeDesLivres.php");
    } catch (PDOException $e) {
        die("Erreur" . $e->getMessage());
    }
}
function dbConnect()
{
    //define the login and the password
    $login = "admin";
    $password = "lJOXwuLHBBkj050";
    try {
        //connect to the database
        $database = new PDO('mysql:host=localhost;dbname=ventesLivres', $login, $password);
        return $database;
    } catch (PDOException $e) {
        //allow us to see the  error if the connection doesn't work
        die("Erreur" . $e->getMessage());
    }
}
