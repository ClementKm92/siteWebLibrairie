<?php
// starting the session
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

require_once(dirname(__DIR__) . "/dataManagement/categoriedataManagement.php");

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/style.css">
  <meta name="description" content="livres en vente de la categorie choisi ar le visiteur">
  <title><?php echo $title; ?></title>
</head>

<body>
  <!-- we use the variable to show the name of the category-->
  <h2 class="text-center"><?php echo $title ?></h2>
  <div class="container">

    <div class="row">
      <?php
      //use a foreach loop to show the  books of the category

      foreach ($infos as $info) :
      ?>

        <div class="col-md-3 text-center">

          <div class="card card bg-secondary mb-2 text-white" style="width: 180px;">
            <img src="../public/images/<?= $info['coverPage'] ?>" class="card-img-top " style="width:40%" alt="<?= $info['alt'] ?>">
            <div class="card-body ">
              <h5 class="card-title">titre:<?= $info['bookTitle'] ?></h5>

              <p class="card-text">auteur:<?= $info['authorName'] ?></p>
              <p class="card-text">prix:<?= $info['price'] ?></p>
              <p class="card-text">editeur:<?= $info['EditorName'] ?></p>

              <a href="livre.php?titre=<?= $info['bookTitle'] ?>" class="btn btn-primary">Livre <?= $info['bookId'] ?></a>
            </div>
          </div>
        </div>


      <?php endforeach; ?>
    </div>
  </div>
</body>

</html>







<?php
//require the footer of the site

require_once(dirname(__DIR__) . '/common/footer.php');


?>