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
function checkAdress($accountId)
{
    try {
        //connection to the database
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //creation of the prepare query and execution of it
        $req = $database->prepare("SELECT streetNumber,streetName,city,postalCode from client where accountId = :accountId");
        // we bind the param to reduce the risk of sql injection
        $req->bindParam(":accountId", $accountId);
        $req->execute();
        //creation of a multidimensionnal array to stock the result of the request
        $datas = [];
        while (($address = $req->fetch())) {
            $data = [
                'streetNumber' => $address['streetNumber'],
                'streetName' => $address['streetName'],
                'city' => $address['city'],
                'postalCode' => $address['postalCode'],

            ];
            $datas[] = $data;
        }
        //we close the cursor to allow other request
        $req->closeCursor();

        return $datas;
    } catch (PDOException $e) {
        die('ERREUR:' . $e->getMessage());
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
