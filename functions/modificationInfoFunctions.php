<?php

function getAccountId($email)
{
    //connexion to the database
    try {
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // prepare query used to reduce the risk of sql injection
        $req = $database->prepare("SELECT accountId from account where email = :email ");
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



function changeEmail($newEmail, $accountId)
{
    try {
        //connexion to the database

        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // prepare query used to reduce the risk of sql injection
        $req = $database->prepare("UPDATE account set email =:email where accountId = :accountId");
        // we bind the param to reduce the risk of sql injection
        $req->bindParam(":accountId", $accountId);
        $req->bindParam(":email", $newEmail);
        //changing the  email use by the session variable
        $_SESSION["connexionEmail"] = $newEmail;
        //execution of the query
        $req->execute();
        //allow other query to be executed
        $req->closeCursor();
        header("Location:../pages/monProfil.php");
    } catch (PDOException $e) {
        die('Erreur' . $e->getMessage());
    }
}


function changePassword($pass, $newPassword, $accountId)
{
    try {
        //connexion to the database
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // prepare query used to reduce the risk of sql injection
        $req = $database->prepare("UPDATE account set accountPassword =:accountPassword where accountId = :accountId");
        // we bind the param to reduce the risk of sql injection
        $req->bindParam(":accountId", $accountId);
        $req->bindParam(":accountPassword", $newPassword);
        $_SESSION["connexionPassword"] = $pass;
        //execution of the query
        $req->execute();
        //allow other query to be executed
        $req->closeCursor();
        header("Location:../pages/monProfil.php");
    } catch (PDOException $e) {
        die('Erreur' . $e->getMessage());
    }
}

function registerPersonalData($accountId, $firstName, $Name, $phoneNumber, $email, $streetNumber, $streetName, $city, $postalcode)
{
    try {
        //connexion to the database

        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // prepare query used to reduce the risk of sql injection
        $req = $database->prepare("INSERT INTO client(accountId,firstName,Name,phoneNumber,Email,streetNumber,streetName,city,PostalCode) VALUES(:accountId,:firstName,:Name,:phoneNumber,:Email,:streetNumber,:streetName,:city,:PostalCode)");
        // we bind the param to reduce the risk of sql injection
        $req->bindParam(":accountId", $accountId);
        $req->bindParam(":firstName", $firstName);
        $req->bindParam(":Name", $Name);
        $req->bindParam(":phoneNumber", $phoneNumber);
        $req->bindParam(":Email", $email);
        $req->bindParam(":streetNumber", $streetNumber);
        $req->bindParam(":streetName", $streetName);
        $req->bindParam(":city", $city);
        $req->bindParam(":PostalCode", $postalcode);
        //execution of the query
        $req->execute();
        //allow other query to be executed

        $req->closeCursor();
        header("Location:../pages/monProfil.php");
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
