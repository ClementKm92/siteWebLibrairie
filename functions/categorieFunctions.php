<?php

//this function reduce the risk off xss attack
function checkData($infoSaisie)
{
    $infoSaisie = trim($infoSaisie);
    $infoSaisie = stripslashes($infoSaisie);
    $infoSaisie = htmlspecialchars($infoSaisie);
    return $infoSaisie;
}

//fetch column car 1 resultat a la fois
function getCategoryId($categoryName)
{
    //connexion to the database
    try {
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // prepare query used to reduce the risk of sql injection
        $req = $database->prepare("SELECT categoryId from category where categoryName = :categoryName ");
        $req->bindParam(":categoryName", $categoryName);
        //execution of the query
        $req->execute();
        //creation of a variable to return the data
        $category = $req->fetchColumn();
        //allow other query to be executed
        $req->closeCursor();
        return $category;
    } catch (PDOException $e) {
        //allow us to see the  error if the connection doesn't work

        die('Erreur' . $e->getMessage());
    }
}
function categoryBooks($categoryId)
{
    try {

        //connection to the database
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //preparation and execution of the query
        $req = $database->prepare("SELECT bookId,bookTitle,authorName,EditorName,price,coverPage,book.alt,category.categoryName from book INNER JOIN category ON book.categoryId=category.categoryId
                where book.categoryId= :categoryId");
        $req->bindParam(":categoryId", $categoryId);
        $req->execute();
        /*creation of a empty array and insertion of a second array containing data inside the first in order to use a foreach loop to show the data*/

        $datas = [];
        while (($livre = $req->fetch())) {
            $data = [
                'bookId' => $livre['bookId'],
                'bookTitle' => $livre['bookTitle'],
                'authorName' => $livre['authorName'],
                'EditorName' => $livre['EditorName'],
                'price' => $livre['price'],
                'coverPage' => $livre['coverPage'],
                'alt' => $livre['alt'],
                'categoryName' => $livre['categoryName']

            ];
            $datas[] = $data;
        }
        $req->closeCursor();

        return $datas;
    } catch (PDOException $e) {
        die('Erreur:' . $e->getMessage());
    }
}





function dbConnect()
{
    //define the login and the password
    $login = 'admin';
    $password = 'lJOXwuLHBBkj050';

    try {
        //connect to the database

        $database = new PDO('mysql:host=localhost;dbname=venteslivres', $login, $password);

        return $database;
    } catch (PDOException $e) {
        die('Erreur' . $e->getMessage());
    }
}
