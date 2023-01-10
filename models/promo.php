<?php
// Inclusion de la connexionà la base de données
require_once("conf.php");
require_once("professeur.php");
class Promo
{
    //Récupération des ID
    public int $id_classes;

    public string $nom;
    public int $niveau;
    public int $id_professeurs;
    public Professeur $prof_principal;

 
    function afficherInfos()
    {
        echo "<tr><td>" . $this->id_classes . " </td><td>". $this->nom . " </td><td>" . $this->niveau . "</td><td> ".$this->id_professeurs ."</td></tr>";
    }
    // static Création d'une méthode statique, qui concerne le concept d'eleve en général,afin de récupérer la liste des élèves
    static function readAll(): array
    {// Permet d'aller chercher la variable $pdo à l'exterieur de la fonction (portée globale)
        global $pdo;
        //requet SQL qui va nous permet d'afficher la liste des élèves ecriture de la requete SQL dans une chaine de caracteres 
        $sql = "SELECT id_classes,nom,niveau,id_professeurs FROM classes";
        //on demande au pdo de preparer la requéte (statement un nom commun) // Préparation de la requete SQL
        $statement = $pdo->prepare($sql);
        // on demande au pdo d'executer la requete :: Execution de la requete
        $statement->execute();
        
        //recupération des données dans une variable $eleves  // et demande de les renvoyée sous forme d'un tableau associatif (PDO::FETCH_ASSOC)
        $liste = $statement->fetchAll(PDO::FETCH_CLASS, "Promo");
foreach($liste as $promo){
    // Chargeons les informations du professeur principale sélectionnée graçe a la propriété id_professeur de mpn objet promo
            $prof_principal = Professeur::readOne
            ($promo->id_professeurs);
    //Enregistrement les informations du professeur principal dans la propriété prof_principal
            $promo->prof_principal = $prof_principal;
    
}
      
        return $liste;
    }
}
?>