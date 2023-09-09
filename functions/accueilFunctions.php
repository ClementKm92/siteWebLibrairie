<?php
//this function reduce the risk off xss attack
function checkData($infoSaisie)
{
    $infoSaisie = trim($infoSaisie);
    $infoSaisie = stripslashes($infoSaisie);
    $infoSaisie = htmlspecialchars($infoSaisie);
    return $infoSaisie;
}

function getbooksOutofStock()
{
    try {
        //connection to the database
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*creation of the prepare query and execution of it to see if some books are out of stocks*/
        $req = $database->query("SELECT bookTitle from book  where bookSupply = 0");
        $req->execute();
        /*creation of a multidimensionnal array to stock the result of the request(possible multiple result that why we using the array)*/
        $datas = [];
        while (($book = $req->fetch())) {
            $data = [

                'bookTitle' => $book['bookTitle']

            ];
            $datas[] = $data;
        }
        return $datas;
    } catch (PDOException $e) {
        die('Erreur:' . $e->getMessage());
    }
}

function getBooks()
{
    try {
        //connection to the database

        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*creation of the prepare query and execution of it to get the last books put in the database*/
        $req = $database->query("SELECT bookId,bookTitle,authorName,releaseDate,price,coverPage,alt from book  ORDER BY bookId DESC LIMIT 4");
        $req->execute();
        /*creation of a multidimensionnal array to stock the result of the request*/
        $datas = [];
        while (($book = $req->fetch())) {
            $data = [
                'bookId' => $book['bookId'],
                'bookTitle' => $book['bookTitle'],
                'authorName' => $book['authorName'],
                'price' => $book['price'],
                'coverPage' => $book['coverPage'],
                'alt' => $book['alt']
            ];
            $datas[] = $data;
        }
        $req->closeCursor();

        return $datas;
    } catch (PDOException $e) {
        echo "Erreur:" . $e->getMessage();
    }
}


function getFavoriteBook()
{
    try {
        //connection to the database 

        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*creation of the prepare query and execution of it to get the last favorite books choose by the library*/
        $req = $database->query("SELECT favoriteId,bookId,favoriteTitle,authorName,price,coverPage,alt from favoritebook");
        $req->execute();
        /*creation of a multidimensionnal array to stock the result of the request*/
        $infos = [];
        while (($book = $req->fetch())) {
            $info = [
                'favoriteId' => $book['favoriteId'],
                'favoriteTitle' => $book['favoriteTitle'],
                'authorName' => $book['authorName'],
                'price' => $book['price'],
                'coverPage' => $book['coverPage'],
                'alt' => $book['alt'],
                'bookId' => $book['bookId']

            ];
            $infos[] = $info;
        }
        $req->closeCursor();

        return $infos;
    } catch (PDOException $e) {
        echo "Erreur:" . $e->getMessage();
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
        die('Erreur:' . $e->getMessage());
    }
}
