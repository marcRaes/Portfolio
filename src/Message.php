<?php

namespace Portfolio;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Message {

	private $username;
	private $email;
	private $subject;
	private $message;

	public function __construct(Array $data) {

		foreach($data as $key => $value) {
			$this->$key = $value;
		}

		$this->sendMail();

	}

	// Méthode d'envoie d'email
	private function sendMail() {

		$mail = new PHPMailer();
		// Modifie la langue du mail
		$mail->setLanguage('fr', '/optional/path/to/language/directory/');
		// Modifie l'encodage du mail
		$mail->CharSet = "UTF-8";

		// Paramètres SMTP
		$mail->SMTPAuth = true; // on l’informe que ce SMTP nécessite une autentification
		$mail->SMTPSecure = 'tls'; // protocole utilisé pour sécuriser les mails 'ssl' ou 'tls'
		$mail->Host = "auth.smtp.1and1.fr"; // définition de l’adresse du serveur SMTP : 25 en local, 465 pour ssl et 587 pour tls
		$mail->Port = 465; // définition du port du serveur SMTP
		$mail->Username = "contact@marcraes.fr"; // le nom d’utilisateur SMTP
		$mail->Password = "m@r62cus"; // Mot de passe SMTP

		// Expéditeur
		$mail->SetFrom($this->email, $this->username);
		// Destinataire
		$mail->AddAddress('contact@marcraes.fr', 'Raes Marc');
		// Objet
		$mail->Subject = $this->subject;

		// Votre message
		$mail->MsgHTML($this->messageHtml($this->message));

		// Envoi du mail avec gestion des erreurs
		if(!$mail->Send()) {

			$_SESSION['errorMail'] = 'Erreur : ' . $mail->ErrorInfo;

		} else {

			$_SESSION['sendMail'] = true;
			$_SESSION['subject'] = $mail->Subject;

		}

		// récupére l'adresse du site et effectue la redirection
		$adresse = "http://".$_SERVER['SERVER_NAME'];
		header('Location: '.$adresse);
		exit();

	}

	// Méthode de mis en forme de l'email
	private function messageHtml() {
		return '
			<!DOCTYPE html>
			<html>
				<head>
				    <meta charset="UTF-8">
				    <meta name="viewport" content="initial-scale=1, user-scalable=no">
				</head>

				<body>

					<p style="font-size: 2em; font-weight: bold; color: red;">Un message de votre site :</p>

					<p>
						<li>nom du contact : ' . $this->username . '</li>
						<li>email du contact : ' . $this->email . '</li>
					</p>

					<p>' . $this->subject . '</p>
					
					<p>' . $this->message . '</p>

				</body>

			</html>
		';
	}

}