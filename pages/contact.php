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
  <meta name="description" content="page du site permettant de contacter l'administrateur du site ">
  <title>Page de contact</title>
</head>

<body>
  <h1>Nous contacter</h1>

  <div id="contact ">
    <p class="text-center">Pour nous contacter veuillez remplir le formulaire suivant.</p>
    <form action="" method="post">
      <!-- Name input -->
      <div class="form-outline mb-4 w-25 mx-auto text-center">
        <input type="text" id="nom" placeholder="Nom" minlength="1" maxlength="255" name="contactNom" class="form-control" required />
      </div>

      <!-- Email input -->
      <div class="form-outline mb-4 w-25 mx-auto text-center">

        <input type="email" id="email" placeholder="Email" minlength="9" maxlength="255" name="contactEmail" class="form-control" required />

      </div>

      <div class="form-outline mb-4 w-25 mx-auto text-center">

        <input type="text" id="sujet" placeholder="Sujet du message" minlength="15" maxlength="255" name="contactSujet" class="form-control" required />

      </div>

      <!-- Message input -->
      <div class="form-outline mb-4">

        <textarea class="form-control" name="contactMessage" placeholder="Message" minlength="15" maxlength="255" id="form4Example3" rows="4" required></textarea>

      </div>



      <!-- Submit button -->
      <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block mb-4" name="envoyer" value="envoyer">Envoyer</button>

      </div>
    </form>
  </div>
</body>

</html>
<?php
//require the footer of the site

require_once(dirname(__DIR__) . "/common/footer.php");
?>