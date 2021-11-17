<?php
namespace Portfolio;

class Manager
{
    protected $bdd;
    // identifiants connexion WAMP
    // Constante de connexion
    const HOST_NAME = 'db5001971455.hosting-data.io';
    const DATABASE = 'dbs1610202';
    const USER_NAME = 'dbu1014274';
    const PASSWORD = 'Distract8-Harmonics-Harbor';

    public function __construct()
    {
        // Connexion à la BDD
        return $this->bdd = new \PDO('mysql:host='.self::HOST_NAME.';dbname='.self::DATABASE.'; charset=utf8', self::USER_NAME, self::PASSWORD);
    }
}