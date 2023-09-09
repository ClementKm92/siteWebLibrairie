<?php


require_once(dirname(__DIR__) . "/functions/livresCommandesFunctions.php");

//search the account id

$accountId = getAccountId($_SESSION["connexionEmail"]);

//find the books command by this account

$datas = getOrderedBooks($accountId);
