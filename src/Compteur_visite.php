<?php

namespace Portfolio;

class Compteur_visite extends Manager
{
    // Méthode d'inscription du visiteur
    public function createEntry()
    {
        $query = $this->bdd->prepare(
            'INSERT INTO compteur_visite(date_visite, heure_visite, remote_addr, server_addr, user_agent) VALUES(CURDATE(), CURTIME(), :remote_addr, :server_addr, :user_agent)');
        $query->bindValue(':remote_addr', $this->get_ip());
        $query->bindValue(':server_addr', $_SERVER['SERVER_ADDR']);
        $query->bindValue(':user_agent', $_SERVER['HTTP_USER_AGENT']);

        // Execute la requete d'inscription du visiteur
        $query->execute() or die(print_r($query->errorInfo(), TRUE)); // or die permet d'afficher les erreurs de MySql
    }

    // Méthode de vérification du visiteur sur la journée
    public function dayVisitorCheck()
    {
        $query = $this->bdd->prepare('SELECT TIMEDIFF(heure_visite, CURTIME()) as difference FROM compteur_visite WHERE date_visite = CURDATE() AND remote_addr = :remote_addr');
        $query->bindValue(':remote_addr', $this->get_ip());

        // Execute la requete de vérification du visiteur
        $query->execute() or die(print_r($query->errorInfo(), TRUE)); // or die permet d'afficher les erreurs de MySql

        $data = $query->fetch(); // On assemble les données reçu

        if($data) {
            // Si la visite à eu lieu il y'a plus d'une heure
            if((int)substr($data['difference'], 1, 2) >= 01) {
                return false;
            }
            return true;
        }
        return false;
    }

    //Récupérer la véritable adresse IP d'un visiteur
    private function get_ip() {
        // IP si internet partagé
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }
        // IP derrière un proxy
        elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        // Sinon : IP normale
        else {
            return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
        }
    }
}