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

require_once(dirname(__DIR__) . "/dataManagement/ListeLivresdataManagement.php");

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/style.css">
  <title>Liste des livres disponible a la vente sur le site</title>
  <meta name="description" content="Liste des livres disponible a la vente sur le site">
</head>

<body>
  <table class=" mx-auto table-bordered border-dark  p-4 m-4">
    <thead>
      <tr>
        <th>id du livre</th>
        <th scope="col">Titre du livre</th>
        <th scope="col">Auteur du livre</th>
        <th scope="col">Stock du livre</th>
        <th scope="col">Modifier Stock</th>
        <th scope="col">Supprimer le livre</th>
      </tr>
    </thead>
    <?php
    //use a foreach loop to show the  book choose  available on the site 
    foreach ($datas as $data) :
    ?>

      <tbody>
        <tr>
          <th><?php echo $data["bookId"]; ?></th>
          <td scope="row" class=""><?php echo $data["bookTitle"]; ?></td>
          <td scope="row"><?php echo $data["authorName"]; ?></td>
          <td scope="row" class="text-center"><?php echo $data["bookSupply"]; ?></td>
          <td scope="row"><a href="modifierStock.php?id=<?php echo $data["bookId"]; ?>" class="btn btn-primary">Modifier Stock</a></td>
          <td scope="row">
            <form action="listeDesLivres.php" method="post" class="pt-3">
              <input type="hidden" id="" name="supprId" value="<?php echo $data["bookId"]; ?>">
              <input type="submit" class="btn btn-primary " name="supprimer" value="supprimer">
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