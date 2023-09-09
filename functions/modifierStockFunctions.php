<?php

function bookInfo($bookId)
{

    try {
        //connection to the database

        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //creation of the prepare query which gonna give the data of the book
        $req = $database->prepare("SELECT bookTitle,authorName,bookSupply from book where bookId=:bookId");
        // we bind the param to reduce the risk of sql injection
        $req->bindParam(":bookId", $bookId, PDO::PARAM_INT);
        $req->execute();
        //creation of a multidimensionnal array to stock the result of the request
        $datas = [];
        while (($book = $req->fetch())) {
            $data = [

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
        die("Erreur" . $e->getMessage());
    }
}

function updateStock($bookId, $newBookSupply)
{
    try {
        //connection to the database

        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //creation and execution of the prepare query to change the bookSupply
        $req = $database->prepare("UPDATE book set bookSupply= :bookSupply where bookId=:bookId");
        // we bind the param to reduce the risk of sql injection
        $req->bindParam(':bookId', $bookId);
        $req->bindParam(':bookSupply', $newBookSupply);
        $req->execute();
        //we close the cursor to allow other request
        $req->closeCursor();
        header("Location:../pages/accueil.php");
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
        $database = new PDO('mysql:host=localhost;dbname=venteslivres', $login, $password);

        return $database;
    } catch (PDOException $e) {
        die("Erreur:" . $e->getMessage());
    }
}
