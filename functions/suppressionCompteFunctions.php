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


function deleteOrderBooks($accountId)
{
    try {
        //connection to the database
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //creation of the DELETE prepare query and execution of it
        $req = $database->prepare(" DELETE  FROM orderBook where accountId=:accountId");
        $req->bindParam(":accountId", $accountId, PDO::PARAM_INT);

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


function deleteClient($accountId)
{
    try {
        //connection to the database
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //creation of the DELETE prepare query and execution of it
        $req = $database->prepare(" DELETE  FROM client where accountId=:accountId");
        $req->bindParam(":accountId", $accountId, PDO::PARAM_INT);

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


function deleteAccount($accountId)
{
    try {
        //connection to the database
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //creation of the DELETE prepare query and execution of it
        $req = $database->prepare(" DELETE  FROM account where accountId=:accountId");
        $req->bindParam(":accountId", $accountId, PDO::PARAM_INT);

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
