<?php

function getAccountId($email)
{
    //connexion to the database
    try {
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // prepare query used to reduce the risk of sql injection
        $req = $database->prepare("SELECT accountId from account where email = :email ");
        // we bind the param to reduce the risk of sql injection
        $req->bindParam(":email", $email);
        //execution of the query
        $req->execute();
        //creation of a variable to return the data
        $account = $req->fetchColumn();
        //allow other query to be executed
        $req->closeCursor();
        return $account;
    } catch (PDOException $e) {
        //allow us to see the  error if the connection doesn't work

        die('Erreur' . $e->getMessage());
    }
}

function addOrder($accountId, $bookTitle, $quantity, $date, $price)
{

    try {
        //connexion to the database
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //creation of a prepare query to insert the data of the new account in the database
        $req = $database->prepare("INSERT INTO orderbook(accountId,bookTitle,quantity,orderDate,orderPrice) VALUES(:accountId,:bookTitle,:quantity,:orderDate,:orderPrice)");
        // we bind the param to reduce the risk of sql injection
        $req->bindParam(':accountId', $accountId, PDO::PARAM_INT);
        $req->bindParam(':bookTitle', $bookTitle, PDO::PARAM_STR);
        $req->bindParam(':quantity', $quantity, PDO::PARAM_STR);
        $req->bindParam(':orderDate', $date);
        $req->bindParam(':orderPrice', $price, PDO::PARAM_INT);
        //execution of the query
        $req->execute();
        //allow other query to be executed
        $req->closeCursor();
        $_SESSION["basket"] = [];
        //after the query the client is redirect to the connexion page 
        header("Location:../pages/paiementAccepte.php");
    } catch (PDOException $e) {
        //allow us to see the  error if the connection doesn't work

        die('Erreur' . $e->getMessage());
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
