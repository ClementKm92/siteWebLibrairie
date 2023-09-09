<?php
require_once(dirname(__DIR__) . '/functions/reglementFunctions.php');
//the use of json encode allow us to store an array in a single sql column
$bookTitle = json_encode($_SESSION["basket"]["bookTitles"]);
$quantity = json_encode($_SESSION["basket"]["quantity"]);
//we recover the other data we are going to to store in the database
$price = $_SESSION["totalPanier"];
$date = date("y.m.d");
$accountId = getAccountId($_SESSION["connexionEmail"]);

//use of a function to add an order to the database
addOrder($accountId, $bookTitle, $quantity, $date, $price);
