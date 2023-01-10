<?php
require_once("models/promo.php");
$promos = Promo::readAll();

//echo "<pre>";
//var_dump($promos);
//echo"</pre>";
?>




<?php
include("assets/inc/head.php");
?>

<title>Liste des promotions</title>
<?php
include ("assets/inc/header.php");
?>

<main>
    <h1>Liste des promotions </h1>
    <table class="table text-black text-center">
        <tr>
        <th>id_classes</th>
        <th>Nom</th>
        <th>Niveau</th>
        <th>id_professeurs</th>
        <th>action</th>
        </tr>
        <?php
    // afficher la liste de chaque promos, et de son prof principale avec la boucle foreach
        foreach ($promos as $promo) {
            $promo->afficherInfos();
        }
        ?>
    </table>
    <!--
    //TODO: afficher la liste de tous les professeurs, en utilisant un fichier models:professeur.php contenant une classe professeur (comme nous l'avons fait pour les élèves)
-->

</main>