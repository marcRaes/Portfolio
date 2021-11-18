<?php
namespace Portfolio;

class Manager
{
    private const FILENAME = '.config';

    protected $bdd;

    public function __construct()
    {
        // Ouverture du fichier contenant les infos de connexion
        $ressource = fopen(self::FILENAME, 'rb');
        // Connexion à la BDD
        $this->bdd = new \PDO(trim(fgets($ressource)), trim(fgets($ressource)), trim(fgets($ressource)));
        // Fermeture du fichier
        fclose($ressource);

        return $this->bdd;
    }
}