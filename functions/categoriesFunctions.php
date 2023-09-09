
<?php

//show the category of books
function getCategory()
{
    try {
        //connection to the database
        $database = dbConnect();
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //preparation and execution of the query
        $req = $database->prepare('SELECT * from category');
        $req->execute();
        /*creation of a empty array and insertion of a second array containing data inside the first in order to use a foreach loop to show the data*/
        $datas = [];
        while (($category = $req->fetch())) {
            $data = [
                'categoryId' => $category['categoryId'],
                'categoryName' => $category['categoryName'],
                'categoryImage' => $category['categoryImage'],
                'alt' => $category['alt']

            ];
            $datas[] = $data;
        }
        $req->closeCursor();

        return $datas;
    } catch (PDOException $e) {
        die('Erreur' . $e->getMessage());
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
        die('Erreur' . $e->getMessage());
    }
}
