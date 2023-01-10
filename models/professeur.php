<?php
// Inclusion de la connexionà la base de données
require_once("conf.php");
require_once("personne.php");
class Professeur extends Personne
{

    public string $adresse_mail;
    // Création d'une propriété statique qui seras commune a tous mes élèves
    public static int $nombre = 0;

    function __construct()
    {
        //Appel du constructeur de la classe parent
        //parent::__construct($nom, $prenom);
        //echo "J'ai créé un élève !"; 
        //$this->dateDeNaissance = $dateDeNaissance;
        //Incrémenter le nombre d'élève
        self::$nombre++;
    }

    function afficherInfos()
    {
        echo "<tr><td>" . $this->nom . " </td><td>" . $this->prenom . " </td><td>" . $this->adresse_mail . "</td></tr>";
    }
    // static Création d'une méthode statique, qui concerne le concept d'eleve en général,afin de récupérer la liste des élèves
    static function readAll(): array
    {// Permet d'aller chercher la variable $pdo à l'exterieur de la fonction (portée globale)
        global $pdo;
        //requet SQL qui va nous permet d'afficher la liste des élèves ecriture de la requete SQL dans une chaine de caracteres 
        $sql = "SELECT nom,prenom,adresse_mail FROM professeurs";
        //on demande au pdo de preparer la requéte (statement un nom commun) // Préparation de la requete SQL
        $statement = $pdo->prepare($sql);
        // on demande au pdo d'executer la requete :: Execution de la requete
        $statement->execute();
        //recupération des données dans une variable $eleves  // et demande de les renvoyée sous forme d'un tableau associatif (PDO::FETCH_ASSOC)
        $liste = $statement->fetchAll(PDO::FETCH_CLASS, "Professeur");
      
        return $liste;
    }
    // Méthode permettant de chargé
    static function readOne(int $id):professeur{
        // Permet d'aller chercher la variable $pdo à l'exterieur de la fonction (portée globale)
        global $pdo;
        //Utilisation d'un paramétre nommé :id afin de se protéger des injections SQL+
        
        $sql = "SELECT nom,prenom,adresse_mail FROM professeurs WHERE id_professeurs =:id";// :id est un paramétre nomée 
        //on demande au pdo de preparer la requéte (statement un nom commun) // Préparation de la requete SQL
        $statement = $pdo->prepare($sql);
        // lien entre le paramétre nommé :id et la variable $id qui sont de type int 
        $statement->bindParam(":id",$id,PDO::PARAM_INT);
        // on demande au pdo d'executer la requete :: Execution de la requete
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "professeur");
        //r2CUP2RATION DU RESULTATS de la requete sous forme d'un objet Professeur grace a fetch
        $professeur = $statement->fetch();
      
        return $professeur;

    }
}
?>