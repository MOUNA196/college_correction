<?php

class Personne
{
    public string $nom; # public : On peux le lire comme on veux != private :  On ne peux pas le lire comme on veux
    public string $prenom;

    function __construct(string $nom, string $prenom)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
    }
    function direBonjour(): void
    {
        echo "<p> Bonjour, je m'appelle " . $this->nom . " " . $this->prenom . " ";
    }
}


?>