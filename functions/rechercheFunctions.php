<?php

//this function reduce the risk off xss attack
function checkData($info)
{
    $info = trim($info);
    $info = stripslashes($info);
    $info = htmlspecialchars($info);
    return $info;
}


function resultBook($info)
{
    try {
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $info = checkData($info);
        $req = $database->prepare("SELECT bookId,bookTitle,authorName,price,coverPage,alt from book where bookTitle= :bookTitle ");
        $req->BindParam(":bookTitle", $info);
        $req->execute();
        $infos = [];
        while (($book = $req->fetch())) {
            $info = [
                'bookId' => $book['bookId'],
                'bookTitle' => $book['bookTitle'],
                'authorName' => $book['authorName'],
                'price' => $book['price'],
                'coverPage' => $book['coverPage'],
                'alt' => $book['alt'],

            ];
            $infos[] = $info;
        }
        $req->closeCursor();

        return $infos;
    } catch (PDOException $e) {
        die('Erreur:' . $e->getMessage());
    }
}


function resultAuthor($info)
{
    try {
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $info = checkData($info);
        $req = $database->prepare("SELECT bookId,bookTitle,authorName,price,coverPage,alt from book where authorName= :authorName ");
        $req->BindParam(":authorName", $info);
        $req->execute();
        $infos = [];
        while (($book = $req->fetch())) {
            $info = [
                'bookId' => $book['bookId'],
                'bookTitle' => $book['bookTitle'],
                'authorName' => $book['authorName'],
                'price' => $book['price'],
                'coverPage' => $book['coverPage'],
                'alt' => $book['alt'],

            ];
            $infos[] = $info;
        }
        $req->closeCursor();

        return $infos;
    } catch (PDOException $e) {
        die('Erreur:' . $e->getMessage());
    }
}

function resultEditor($info)
{
    try {
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $info = checkData($info);
        $req = $database->prepare("SELECT bookId,bookTitle,authorName,price,coverPage,alt from book where editorName= :editorName ");
        $req->BindParam(":editorName", $info);
        $req->execute();
        $infos = [];
        while (($book = $req->fetch())) {
            $info = [
                'bookId' => $book['bookId'],
                'bookTitle' => $book['bookTitle'],
                'authorName' => $book['authorName'],
                'price' => $book['price'],
                'coverPage' => $book['coverPage'],
                'alt' => $book['alt'],

            ];
            $infos[] = $info;
        }
        $req->closeCursor();

        return $infos;
    } catch (PDOException $e) {
        die('Erreur:' . $e->getMessage());
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
