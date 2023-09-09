<?php


function deleteBook($bookId)
{
    try {
        //connection to the database
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //creation of the DELETE prepare query and execution of it
        $req = $database->prepare(" DELETE  FROM book where bookId=:bookId");
        $req->bindParam(":bookId", $bookId, PDO::PARAM_INT);

        //execution of the query
        $req->execute();
        //allow other query to be executed
        $req->closeCursor();
        //send back to the welcome page of the admin part
        header("Location:../pages/accueil.php");
    } catch (PDOException $e) {
        die("Erreur:" . $e->getMessage());
    }
}
function bookList()
{
    try {
        //connection to the database
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //creation of the prepare query and execution of it
        $req = $database->prepare("SELECT bookId,bookTitle,authorName,bookSupply from book");
        $req->execute();
        //creation of a multidimensionnal array to stock the result of the request
        $datas = [];
        while (($book = $req->fetch())) {
            $data = [
                'bookId' => $book['bookId'],
                'bookTitle' => $book['bookTitle'],
                'authorName' => $book['authorName'],
                'bookSupply' => $book['bookSupply'],

            ];
            $datas[] = $data;
        }
        //we close the cursor to allow other request
        $req->closeCursor();

        return $datas;
    } catch (PDOException $e) {
        die('ERREUR:' . $e->getMessage());
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
