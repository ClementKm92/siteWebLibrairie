<?php
require_once(dirname(__DIR__) . '/functions/categorieFunctions.php');
/*we check if the value is not empty and we do verification to reduce the xss attack risk*/
if (!empty($_GET["nom"])) {
    $categoryName = checkData($_GET["nom"]);
}
/*using a function to get the categorie id and use a other one to get the books of this category*/
$id = getCategoryId($categoryName);
$infos = categoryBooks($id);

//we use a loop to get the name of the category to show it
foreach ($infos as $info) {

    $title = $info['categoryName'];
}
