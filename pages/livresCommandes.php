<?php
//starting the session
session_start();
/*checking the value of 2 session variable to determine which header is gonna be show*/
if (isset($_SESSION["connexionEmail"]) and isset($_SESSION["connexionPassword"])) {
    if ($_SESSION["connexionTest"] == 1) {
        if ($_SESSION["connexionEmail"] == "JohnDoe1@test.com" and $_SESSION["connexionPassword"] == "passwordAmin1!") {
            require_once(dirname(__DIR__) . '/common/headerAdmin.php');
        } else {
            require_once(dirname(__DIR__) . '/common/headerAccount.php');
        }
    } else {
        require_once(dirname(__DIR__) . '/common/header.php');
    }
} else {
    require_once(dirname(__DIR__) . '/common/header.php');
}
//require this file allow us to manage the data in an other file

require_once(dirname(__DIR__) . "/dataManagement/livresCommandesdataManagement.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Livres Commandés par le client</title>
    <meta name="description" content="Cette page montre au client un historique des livres qu'il a commandé">
</head>

<body>
    <h1>Livres Commandés</h1>
    <table class=" mx-auto table-bordered border-dark  p-4 m-4">
        <thead>
            <tr>

                <th scope="col">Titre du livre</th>
                <th scope="col">date commande</th>
                <th scope="col">Total commande</th>


            </tr>
        </thead>
        <?php
        /*use a foreach loop to show the  books of ordered by a client. json_decode and implode allow us to  recover the data in the booktitle column of the database and read it*/
        foreach ($datas as $data) :
            $book = json_decode($data["bookTitle"]);
            $bookTitle = implode(" , ", $book);

        ?>

            <tbody>
                <tr>

                    <td scope="row" class=""><?php echo $bookTitle; ?></td>
                    <td scope="row"><?php echo $data["orderDate"]; ?></td>
                    <td scope="row"><?php echo $data["orderPrice"]; ?>€</td>
                    </form>
                    </td>
                </tr>

            </tbody>
        <?php endforeach; ?>
    </table>
</body>
<?php
//require the footer of the site

require_once(dirname(__DIR__) . '/common/footer.php');
?>

</html>