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

require_once(dirname(__DIR__) . "/dataManagement/recherchedataManagement.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../public/css/style.css">
	<meta name="description" content="page permettant aux clients de voir le resultat de la recherche qu'ils ont fait">
	<title>Resultat de votre recherche</title>
</head>

<body>
	<h1>Resultat de votre recherche </h1>

	<h2 class="text-center m-5"><?php
								//show the data searched
								echo $infoVoulue . " ->" . htmlspecialchars($_POST["researchInfo"]); ?></h2>

	<div class="container">
		<div class="row">
			<?php
			//show the absent of result if the variable is empty
			if (empty($datasSearch)) {
			?>
				<div class="h3 text-center m-5">
					<p>AUCUN RESULTAT</p>

				</div>
			<?php
			}
			//use a loop to show the result of the research
			foreach ($datasSearch as $data) :
			?>
				<div class="col-md-3 mb-2">
					<div class="card card bg-secondary text-white" style="width: 180px;">
						<img src="../public/images/<?= $data['coverPage'] ?>" class="card-img-top " style="width:40%" alt="<?= $data['alt'] ?>">
						<div class="card-body ">
							<h5 class="card-title">titre:<?= $data['bookTitle'] ?></h5>

							<p class="card-text">auteur:<?= $data['authorName'] ?></p>
							<p class="card-text">prix:<?= $data['price'] ?></p>

							<a href="livre.php?id=<?= $data['bookId'] ?>" class="btn btn-primary">Livre <?= $data['bookId'] ?></a>
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