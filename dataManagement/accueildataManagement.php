<?php

require_once(dirname(__DIR__) . '/functions/accueilFunctions.php');

if (isset($_SESSION["connexionEmail"]) and isset($_SESSION["connexionPassword"])) {

    if ($_SESSION["connexionEmail"] == "JohnDoe1@test.com" and $_SESSION["connexionPassword"] == "passwordAmin1!") {
        $datas = getbooksOutofStock();
        $outOfStock = [];
        foreach ($datas as $data) :
            array_push($outOfStock, $data);

        endforeach;
?>
        <script>
            let test = <?php echo $outOfStock; ?>
            alert(test);
        </script>
<?php
    }
}


//we declare 2 variables which gonna get the last book add and the favorite
$datas = getBooks();
$infos = getFavoriteBook();
