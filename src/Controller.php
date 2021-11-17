<?php

namespace Portfolio;

class Controller {

	private $dataForm; // Contient les données du formulaire
	private $validationField; // Contient la valeur de la validation d'un champ
	private $keyField; // Contient la clé du champ

	public function __construct(Array $data) {

		$this->dataForm = array(
			'captcha' => $data['g-recaptcha-response'],
			'username' => htmlspecialchars($data['username']),
			'email' => htmlspecialchars($data['email']),
			'subject' => htmlspecialchars($data['subject']),
			'message' => htmlentities($data['message'], ENT_QUOTES),
		);

		$this->loopData();
	}

	private function loopData() {

		foreach ($this->dataForm as $this->keyField => $value) {

			$this->validationField = $this->trimData();

			if($this->validationField) {
				$key = $this->keyField;
				$this->validationField = $this->$key();
			}

			if($this->validationField !== TRUE) {
				$this->formError();
			}

		}

	}

	private function captcha() {

		if(!Captcha::validCaptcha($this->dataForm[$this->keyField])) {
			return 'Merci de valider le captcha';
		}

		unset($this->dataForm['captcha']);

		return TRUE;

	}

	private function username() {

		$this->validationField = $this->strlenData();

		if($this->validationField === TRUE) {

			$this->validationField = $this->pregMatchField();

			if($this->validationField === TRUE) {
				return TRUE;
			}

		}

		if($this->validationField !== TRUE) {
			return $this->validationField;
		}

	}

	private function email() {

		if(!filter_var($this->getValueKeyField(), FILTER_VALIDATE_EMAIL)) {
			return 'l\'adresse email n\'est pas valide'; // Retourne le message d'erreur
		}

		return TRUE;

	}

	private function subject() {
		return $this->username();
	}

	private function message() {

		$this->validationField = $this->strlenData();

		if($this->validationField === TRUE) {
			
			$this->dataForm[$this->keyField] = nl2br(stripslashes($this->getValueKeyField()));

			$this->createMessage();

		}

		if($this->validationField !== TRUE) {
			return $this->validationField;
		}

	}

	// Vérifie que le champ n'est pas vide
	private function trimData() {

		if(!trim($this->getValueKeyField())) {
			return 'Le champ ' . $this->nameField($this->keyField) . ' est obligatoire'; // Retourne le message d'erreur
		}

		return TRUE;

	}

	private function getValueKeyField() {
		if($this->keyField === 'message') {
			return html_entity_decode($this->dataForm[$this->keyField]);
		}

		return htmlspecialchars_decode($this->dataForm[$this->keyField]);
	}

	// Vérifie la longueur du champ
	private function strlenData() {

		if(($this->keyField === 'username') || ($this->keyField === 'subject')) {

			// La valeur du champ est compris entre 3 et 30 caractéres
			if((strlen($this->getValueKeyField()) <= 3) || (strlen($this->getValueKeyField()) >= 30)) {
				return 'Le champ ' . $this->nameField($this->keyField) . ' doit étre compris entre 3 et 30 caractéres'; // Retourne le message d'erreur
			}
			return TRUE;

		} else if($this->keyField === 'message') {

			// Le message contient plus de 10 caractéres
			if(strlen($this->getValueKeyField()) <= 10) {
				return 'Le champ ' . $this->nameField($this->keyField) . ' doit contenir au moins 10 caractéres'; // Retourne le message d'erreur
			}
			return TRUE;

		}

	}

	private function pregMatchField() {

		$pattern = '#[^a-zA-Z0-9àéè -]#';

		preg_match_all($pattern, htmlspecialchars_decode($this->dataForm[$this->keyField]), $matches);

		if(count($matches[0]) > 0) {
			$falseCharacter = implode($matches[0]);

			if (strlen($falseCharacter) > 1) {
				return 'Les caractéres ' . $falseCharacter . ' ne sont pas autorisé dans le champ ' . $this->nameField($this->keyField);
			} else {
				return 'Le caractére ' . $falseCharacter . ' n\'est pas autorisé dans le champ ' . $this->nameField($this->keyField);
			}
		} else {
			return TRUE;
		}

	}

	private function nameField($field) {

		if($field === 'username') { return 'nom'; }
		else if($field === 'email') { return 'email'; }
		else if($field === 'subject') { return 'sujet du message'; }
		else if($field === 'message') { return 'message'; }

	}

	private function formError() {

		$form = new Form($this->dataForm);
		$form->errorForm($this->validationField, $this->keyField);

		// Récupére l'adresse du site
		$adresse = "http://".$_SERVER['SERVER_NAME'];

		// Effectue la redirection
		header('Location: '.$adresse."/portfolio#contact");
		exit();

	}

	private function createMessage() {

		new Message($this->dataForm);

	}

}