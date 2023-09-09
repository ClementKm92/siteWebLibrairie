<?php
function memberInscription($email, $password)
{
    try {
        //creation of a data which use the connection function
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //creation of a prepare query to insert the data of the new account in the database
        $req = $database->prepare("INSERT INTO account(email,accountPassword) VALUES(:email,:accountPassword)");
        //binding param to a value to reduce the injection risk
        $req->bindParam(':email', $email);
        $req->bindParam(':accountPassword', $password, PDO::PARAM_STR);
        //execution of the query

        $req->execute();
        //allow other query to be executed

        $req->closeCursor();
        //after the query the client is redirect to the connexion page 
        header("Location:../pages/connexion.php");
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
        //allow us to see the  error if the connection doesn't work
        die("Erreur" . $e->getMessage());
    }
}
