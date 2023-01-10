<?php

// Inclusion de la connexionà la base de données require_once("conf.php");

// Inclusion de la requéte SQL
require_once("models/eleve.php");

// Appel de la méthode readAl() de notre class eleve,qui nnous permet de charger la liste de tous les éléves

$eleves = Eleve:: readAll();

// echo "<pre>";
//var_dump($eleves);
//echo"</pre>";



?>

<?php

include("assets/inc/head.php");

?>

<title>Liste des élèves</title>

<?php
include("assets/inc/header.php");
?>
<main>
    <h1>Liste des élèves</h1>
    <table class="table text-black text-center">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
        </tr>
        <?php
        foreach ($eleves as $eleve) {
            $eleve->afficherInfos();
        }
        ?>
    </table>
    
</main>

<?php
include("assets/inc/footer.php");
?>