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
    <meta name="description" content="conditions generales de vente du site">
    <title>CGV(condition generale de vente) du site</title>
</head>

<body>
    <div class="col-12">
        <h1>CGV</h1>
        <h2>Article 1:Champ d'application</h2>
        <p>Ces Conditions Générales de Vente s’appliquent aux livres vendus sur le site www.clementKhorsimino.com. Elle ne concernent pas les achats realisés en librairie.Les commandes effectués sur le site sont faite à la société ................., inscrite au RCS de ........ sous le n° .............., dont le siège social est situé .............., .Siret : ..............
            Numéro de TVA : .................
            Les présentes Conditions Générales de Vente régissent ainsi exclusivement les ventes de livres.
        </p>

        <h2>Article 2 - Commandes</h2>
        <p>Les commandes sont passées sur le site www.clementKhorsimino.com.
            La validation de votre commande suppose l'acceptation de l'intégralité des conditions de vente du site .Il vous sera demandé de cocher une case au moment de passer la commande afin de confirmer votre acceptation des conditions generales de ventes.La loi(article L221-5 du code de la consommation) donne au client un delais de retractation de 14 jours francs.Il n'aura pas a fournir de justifications et il n'aura pas a payer de penalités en dehors des frais de retours.Les frais de retours sont a la charge du client et le remboursement se fera par virement après avoir après verification de l'etat du livre. Ce virement se fera sur le compte qui a été utilisé pour payer la commande </p>

        <h2>Article 3- Prix</h2>
        <p>Les prix sont indiqués en Euros et sont donnés toutes taxes comprises.Ces prix n'incluent pas les frais de d'expeditions.Le prix des livres est en confirmité avec la legislation actuelle(Loi Lang 81-766 du 10 août 1981 ) qui veut que l'editeur fixe le prix du livre.Le libraire peut lui appliquer un remise ne dépassant pas 5%.Les prix peuvent etre mis a jour mais ils seront facturés selon le prix en vigueur le jour de la commande. </p>


        <h2>Article 4- Disponibilité des articles</h2>
        <p>Le site est mis à jour jour frequemment.Néanmoins certains livres peuvent etre en ruptures de stock ou definitivement indisponibles.Si un ou plusieurs livre d'une commande sont indisponible un mail sera envoyé au client.</p>

        <h2>Article 5-Paiement</h2>
        <p>Le reglement s'effectue par carte bancaire(Visa, Eurocard, Mastercard).Pour
            effectuer un paiement vous devez saisir votre numero de carte,sa date de validité et le cryptogramme situé au dos dans les champs réservés au moment du paiement. La commande est encaissé au moment de son expedition.
        </p>

        <h2>Article 6 - Livraisons</h2>
        <p>Librairie Fléchir se charge de l'expedition des commandes et de leurs livraisons à l'adresse indiqué par le client.Les frais de livraison varient en fonction de l'adresse.Les livraisons s'effectueront via chronopost(24H) ou collissimo suivi(48H).Les délais indiqué varient en fonction du choix du client.Si il y a un retard chez le transporteur notre responsabilité ne sera pas engagé.Pour faciliter la livraison nous vous conseillons de donner une adresse ou une personne pourra la réceptionner pendant les heures de livraisons indiqués. Si vous choisissez de retirer votre commande en point relais vous pourrez faire effectuer ce retrait par un proche muni de votre piece d'identité et de la sienne. </p>

        <h2>Article 7 Réclamations , Rétractation
        </h2>
        <p> 7-1:Reclamations:Si un article reçu ne correspond pas a votre commande il sera repris dans les plus bref délais si il nous ait retourné en parfait état. Vous devrez nous prévenir de votre reclamation dans un délais de 96heures par mail ou par courrier en nous indiquant le numero de votre commande.Après ce délais votre commande sera considéré comme valide.

            7-2:Retractions:L'article L 121-21 du Code de la consommation offre au client un délais de 14 jours francs pour se retracter après un achat.Cette retractation se fera sans justifications ,ni paiement d'aucunes penalités en dehors des frais de retours.Après signalement de sa retractation le client disposera
            de 14 jours pour retourner les livres a ses frais.Pour exercer ce droit vous devrez nous envoyer un mail a *********@*****.com avec le numero de la commande et les noms du ou des livres la composant.Le remboursement de votre commande ne s'effectuera qu'après réception des livres retournés et vérification de leurs etats.
        </p>


        <h2>Article 8 Responsabilité</h2>
        <p>Les articles proposé a la vente sur le site sont conforme a la legislation en vigueur.Librairie Flechir n'est pas responsable des visuel et du contenu des livres.En cas d'inexecution du contrat et en vertu de l'article Article L221-15 du code de la consommation la responsabilité de Librairie Fléchir ne pourra etre engagé si cette inexcution est :"imputable soit au consommateur, soit au fait, imprévisible et insurmontable, d'un tiers au contrat, soit à un cas de force majeure" .
        </p>

        <h2>Article 9 Litiges</h2>
        <p>La loi française s'appliquera en cas de litige entre Librairie Flechir et un de ses clients.
            En vertu des articles L 611-1 et R 612-1 du Code de la Consommation un consommateur peut contacter le mediateur de la consommation si il a envoyé une reclamation écrite au professionnel avec lequel il est en litige et si il n'a pas obtenu satisfaction ou de reponse dans un délais de 2 mois.Le mediateur de la consommation est le Centre de médiation de la consommation de conciliateurs de justice(CM2C).
            Son adresse est :49 Rue de Ponthieu 75008 Paris.email:cm2c@cm2c.net.numero:01 89 47 00 14.
        </p>

        <h2>Article 10 - Information nominatives </h2>
        <p>Les informations nominatives que nous collectons nous servent aux traitement des commandes.Vous disposez d'un droit d'acces, de modifications,de rectification,d'opposition et de suppression de vos données personnelles conformement à la loi informatique et libertés du 6 janvier 1978 modifiée par la loi 2004-801 du 6 août 2004.Pour les consulter ou les modifier il vous suffit de nous ecrire à ************** ****** ***** ou de nous ecrire en ligne.</p>
    </div>
</body>

</html>


<?php
//require the footer of the site

require_once(dirname(__DIR__) . "/common/footer.php");
?>