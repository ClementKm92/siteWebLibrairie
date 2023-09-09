<?php

function createBasket()
{
    try {
        if (empty($_SESSION['basket'])) {
            //creation of the basket
            $_SESSION['basket'] = array();
            /* creation of subpart  of the basket */
            $_SESSION['basket']['bookTitles'] = array();
            $_SESSION['basket']['authorName'] = array();
            $_SESSION['basket']['quantity'] = array();
            $_SESSION['basket']['prices'] = array();
        }
        return true;
    } catch (PDOException $e) {
        die("Erreur" . $e->getMessage());
    }
}

function addArticle($bookTitle, $authorName, $quantity, $price)
{
    //we check if the basket exist
    if (createBasket()) {
        // we add the product
        array_push($_SESSION['basket']['bookTitles'], $bookTitle);
        array_push($_SESSION['basket']['authorName'], $authorName);
        array_push($_SESSION['basket']['quantity'], $quantity);
        array_push($_SESSION['basket']['prices'], $price);
    }
    //creation of the basket if he don't exist
    else {
        createBasket();
    }
}

function deleteArticle($indice)
{
    /*we remove the value of the article in the basket using an index which show his position and we reset the basket to have every index available */
    unset($_SESSION['basket']['bookTitles'][$indice]);
    $_SESSION['basket']['bookTitles'] = array_values($_SESSION['basket']['bookTitles']);
    unset($_SESSION['basket']['authorName'][$indice]);
    $_SESSION['basket']['authorName'] = array_values($_SESSION['basket']['authorName']);
    unset($_SESSION['basket']['quantity'][$indice]);
    $_SESSION['basket']['quantity'] = array_values($_SESSION['basket']['quantity']);
    unset($_SESSION['basket']['prices'][$indice]);
    $_SESSION['basket']['prices'] = array_values($_SESSION['basket']['prices']);
    header("Location:../pages/panier.php");
}


function deleteBasket()
{
    //we delete the basket completely
    unset($_SESSION['basket']['bookTitles']);
    unset($_SESSION['basket']['authorName']);
    unset($_SESSION['basket']['quantity']);
    unset($_SESSION['basket']['prices']);
}

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
function checkAdress()
{
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
