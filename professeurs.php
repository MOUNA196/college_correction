<?php
require_once("models/professeur.php");
$professeurs = Professeur::readAll();
?>




<?php
include("assets/inc/head.php");
?>

<title>Liste des professeurs</title>
<?php
include ("assets/inc/header.php");
?>

<main>
    <h1>Liste des professeurs </h1>
    <!--
    //TODO: afficher la liste de tous les professeurs, en utilisant un fichier models:professeur.php contenant une classe professeur (comme nous l'avons fait pour les élèves)
-->
<table class="table text-black text-center">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>adresse_mail</th>
        </tr>
        <?php
        foreach ($professeurs as $professeur) {
            $professeur->afficherInfos();
        }
        ?>
    </table>
</main>

<?php
include ("assets/inc/footer.php");
?>
