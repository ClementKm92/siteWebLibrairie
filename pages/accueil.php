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
require_once(dirname(__DIR__) . '/dataManagement/accueildataManagement.php')
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/style.css">
  <title>Librairie Fléchir-(achat de livres)</title>
  <meta name="description" content="Decouvrez les livres en vente en ligne ou  disponible dans nos locaux . Sciences-Fantasy-Policier-SF-Cuisine-Voyage">
</head>

<body>

  <h2>Nouveaux Livres</h2>

  <div class="container">

    <div class="row">
      <?php
      //use a foreach loop to show the last books add on the site
      foreach ($datas as $data) :
      ?>

        <div class="col-md-3 mb-2">
          <div class="card card bg-secondary text-white" style="width: 180px;">
            <img src="../public/images/<?= $data['coverPage'] ?>" class="card-img-top " style="width:40%" alt="<?= $data['alt'] ?>">
            <div class="card-body ">
              <h5 class="card-title">titre:<?= $data['bookTitle'] ?></h5>

              <p class="card-text">auteur:<?= $data['authorName'] ?></p>
              <p class="card-text">prix:<?= $data['price'] ?></p>

              <a href="livre.php?titre=<?= htmlspecialchars($data['bookTitle']); ?>" class="btn btn-primary">Livre <?= $data['bookId'] ?></a>
            </div>
          </div>
        </div>

      <?php endforeach; ?>
    </div>
  </div>

  <h2>Coup de coeurs</h2>
  <div class="container">
    <div class="row">
      <?php
      /*use a foreach loop to show the favorite book choose by the sales team available on the site */
      foreach ($infos as $info) :
      ?>
        <div class="col-md-3 mb-2">
          <div class="card card bg-secondary text-white" style="width: 180px;">
            <img src="../public/images/<?= $info['coverPage'] ?>" class="card-img-top " style="width:40%" alt="<?= $info['alt'] ?>">
            <div class="card-body ">
              <h5 class="card-title">titre:<?= $info['favoriteTitle'] ?></h5>

              <p class="card-text">auteur:<?= $info['authorName'] ?></p>
              <p class="card-text">prix:<?= $info['price'] ?></p>

              <a href="livre.php?titre=<?= htmlspecialchars($info['favoriteTitle']); ?>" class="btn btn-primary">Livre <?= $info['bookId'] ?></a>
            </div>
          </div>
        </div>


      <?php endforeach; ?>
    </div>
  </div>

</body>
<?php
//require the footer of the site
require_once(dirname(__DIR__) . '/common/footer.php');
?>



</html>