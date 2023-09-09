<?php


function getPassword($email)
{
    //connexion to the database
    try {
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // prepare query used to reduce the risk of sql injection
        $req = $database->prepare("SELECT accountPassword from account where email = :email ");
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

function connexionCheck($email, $password)
{
    try {
        //connexion to the database
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // prepare query used to reduce the risk of sql injection
        $req = $database->prepare("SELECT count(*) from account where email= :email and accountPassword=:accountPassword");
        $req->bindParam(":email", $email);
        $req->bindParam(":accountPassword", $password);
        //execution of the query
        $req->execute();
        //creation of a variable to return the data
        $account = $req->fetchColumn();
        //allow other query to be executed
        $req->closeCursor();

        return $account;
    } catch (PDOException $e) {
        //allow us to see the  error if the connection doesn't work
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
