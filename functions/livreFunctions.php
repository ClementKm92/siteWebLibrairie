<?php

//we remove risky elements from the value to reduce the risk off xss attack
function checkData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function checkTitle($bookTitle)
{
    try {
        //connexion to the database

        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*creation of the prepare query to see if the book exist and execution of it*/
        $req = $database->prepare("SELECT count(*) as idCount from book where bookTitle= :bookTitle");
        // we bind the param to reduce the risk of sql injection
        $req->bindParam(":bookTitle", $bookTitle, PDO::PARAM_STR);
        //execution of the request and we obtain the result
        $req->execute();
        $livre = $req->fetch();
        //we close the cursor to allow other request
        $req->closeCursor();

        return $livre['idCount'];
    } catch (PDOException $e) {
        die("Erreur" . $e->getMessage());
    }
}

function supplyCheck($bookTitle)
{
    try {
        //connexion to the database
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*creation of the prepare query to see if the book is out of stock and execution of it*/
        $req = $database->prepare("SELECT bookSupply from book where bookTitle= :bookTitle");
        // we bind the param to reduce the risk of sql injection
        $req->bindParam(":bookTitle", $bookTitle, PDO::PARAM_STR);
        $req->execute();
        $datas = [];
        /*creation of a multidimensionnal array to stock the result of the request(no use of fetchcolumn because there is more than one result)*/
        while (($book = $req->fetch())) {
            $data = [

                'bookSupply' => $book['bookSupply']

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

function getBook($bookTitle)
{
    try {
        //connexion to the database
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*creation of the prepare query to see if the book is out of stock and execution of it*/
        $req = $database->prepare("SELECT bookId,bookTitle,authorName,EditorName,releaseDate,isbn,pageNumber,price,coverPage,alt from book where bookTitle= :bookTitle ");
        /* we bind the param to reduce the risk of sql injection and we execute the query*/
        $req->bindParam(":bookTitle", $bookTitle, PDO::PARAM_STR);
        $req->execute();
        /*creation of a multidimensionnal array to stock the result of the request(no use of fetchcolumn because there is more than one result)*/
        $datas = [];
        while (($book = $req->fetch())) {
            $data = [
                'bookId' => $book['bookId'],
                'bookTitle' => $book['bookTitle'],
                'authorName' => $book['authorName'],
                'EditorName' => $book['EditorName'],
                'releaseDate' => $book['EditorName'],
                'isbn' => $book['isbn'],
                'pageNumber' => $book['pageNumber'],
                'price' => $book['price'],
                'coverPage' => $book['coverPage'],
                'alt' => $book['alt'],

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
        //allow us to see the  error if the connection doesn't work

        die('Erreur:' . $e->getMessage());
    }
}
