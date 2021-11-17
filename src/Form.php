<?php

namespace Portfolio;

class Form {

	// Attributs
	private $username;
	private $email;
	private $subject;
	private $message;
	private $captcha;
	private $msgError;
	private $fieldError;

	// Constantes
	const ROWS = 10;
	const COLS = 50;

	public function __construct(array $data = null) {

		if($data !== null) {
			foreach ($data as $key => $value) {
				$setter = 'set' . ucfirst($key);

				$this->$setter($value);
			}
		}

	}

	// M�thodes de cr�ation d'un champ text
	public function text($nameField, $placeholder) {

		$field = (new Field)->fieldText($nameField, $placeholder, $this->$nameField);

		return $this->className($nameField, $field);

	}

	// M�thodes de cr�ation d'un champ email
	public function email($nameField, $placeholder) {

		$field = (new Field)->fieldEmail($nameField, $placeholder, $this->$nameField);

		return $this->className($nameField, $field);

	}

	// M�thodes de cr�ation d'un champ textarea
	public function textarea($nameField, $placeholder) {

		$field = (new Field)->fieldTextarea($nameField, $placeholder, $this->$nameField);

		return $this->className($nameField, $field);

	}

	// M�thodes de cr�ation d'un captcha
	public function captcha() {
		return '<div id="captcha" class="g-recaptcha" data-sitekey="6LdLQ1IUAAAAABf_lWO9JTL5PF9yWJKAOooaqzoQ"></div>';
	}

	// M�thodes de cr�ation d'un bouton d'envoi
	public function submit($valueSubmit) {
		return '<p id="submit"><input type="submit" value="' . $valueSubmit . '"></p>';
	}

	// M�thode qui entoure les champ d'un paragraphe avec la bonne classe
	private function className($nameField, $field) {

		// Une erreur � �tait trouver sur le champ en question
		if($this->fieldError === $nameField) {
			return '<p class="field fieldError">' . $field . '</p>';
		}

		return '<p class="field">' . $field . '</p>';

	}

	// M�thode de recup�ration des erreurs sur le formulaire
	public function errorForm($msgError, $fieldError) {

		$this->setMsgError($msgError);
		$this->setFieldError($fieldError);

		$_SESSION['form'] = serialize($this);

	}

	// Setters
	private function setUsername($username) {
		$this->username = $username;
	}

	private function setEmail($email) {
		$this->email = $email;
	}

	private function setSubject($subject) {
		$this->subject = $subject;
	}

	private function setMessage($message) {
		$this->message = $message;
	}

	private function setCaptcha($captcha) {
		$this->captcha = $captcha;
	}

	private function setMsgError($msg) {
		$this->msgError = $msg;
	}

	private function setFieldError($field) {
		$this->fieldError = $field;
	}

	// Getters
	public function getUsername() {
		return $this->username;
	}

	public function getMsgError() {
		return $this->msgError;
	}

}