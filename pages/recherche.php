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
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/style.css">
  <meta name="description" content="page permettant aux clients de faire une recherche précise via une information a sélection">
  <title>Recherche d'informations</title>
</head>

<body>
  <h1>Recherche</h1>
  <p>Pour effectuer votre recherche veuillez remplir l'un des champs suivants</p>
  <!-- after validation the form redirect us to an other file where the result of the research is gonna be show -->

  <form action="resultatRecherche.php" method="post" class="text-center">
    <div class="form-outline mb-4">
      <label for="titre">Information Recherchée</label>
      <input type="text" id="researchInfo" minlength="5" maxlength="50" name="researchInfo" class="form-control" pattern="^[a-zA-Z0-9 '-]$" required />
    </div>


    <p> <label for="researchInformation">Choisissez le type d'information recherché</label></p>
    <select name="Information" id="Information" required>

      <option name="bookTitle" value="bookTitle">Titre du livre</option>
      <option name="authorName" value="authorName">Auteur du livre</option>
      <option name="editorName" value="editorName">Editeur du livre</option>

    </select>
    <br>
    <button type="submit" class="btn btn-primary btn-block mb-4 mt-4" id="envoyer" name="envoyer" value="envoyer">Envoyer</button>
  </form>
</body>

</html>
<?php
//require the footer of the site

require_once(dirname(__DIR__) . '/common/footer.php');
?>