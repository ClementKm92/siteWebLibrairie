<?php
require_once(dirname(__DIR__) . '/functions/rechercheFunctions.php');
//check if the variable which store the type of data is empty
if (isset($_POST["envoyer"]) && !empty(($_POST["Information"]))) {
    $_SESSION["Information"] = $_POST["Information"];
    if (
        /*check if the variable which store the research of the client respect 2 conditions*/
        !empty($_POST["researchInfo"]) && strlen($_POST["researchInfo"]) >= 5
        && preg_match("^[A-Za-z0-9 '-]+$^", $_POST["researchInfo"])
    ) {
        //a switch is use to allow us to respond to the different choice
        switch ($_POST["Information"]) {
            case 'bookTitle':
                /*we store the researched data in a value and we use a function to find the possible result*/
                $infoVoulue = "titre du livre";
                $datasSearch = resultBook($_POST["researchInfo"]);
                break;
            case 'authorName':
                /*we store the researched data in a value and we use a function to find the possible result*/
                $infoVoulue = "nom de l'auteur";
                $datasSearch = resultAuthor($_POST["researchInfo"]);
                break;
            case 'editorName':
                /*we store the researched data in a value and we use a function to find the possible result*/
                $infoVoulue = "nom de l'editeur";
                $datasSearch = resultEditor($_POST["researchInfo"]);
                break;
            default:
                //if the info is not one of the case we write an error message
                echo "l'information demandé est incorrect";
                break;
        }
    } else {
        echo "il n'y a pas de resultat";
    }
}
