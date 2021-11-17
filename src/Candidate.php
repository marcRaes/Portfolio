<?php

namespace Portfolio;

class Candidate {

	private $firstName;
	private $surname;
	private $birthDate;
	private $email;
	private $address;
	private $telephoneNumber;
	private $situation;

	public function  __construct(Array $data) {

		foreach($data as $key => $value) {
			$this->$key = $value;
		}

	}

	// Getters
	public function getFirstName() { return $this->firstName; }

	public function getSurname() { return $this->surname; }

	public function getEmail() { return $this->email; }

	public function getAddress() { return $this->address; }

	public function getTelephoneNumber() { return $this->telephoneNumber; }

	public function getSituation() { return $this->situation; }

	// Méthode de renvoit du prénom suivi du nom
	public function fullName() { return $this->firstName . ' ' . $this->surname; }

	// Méthode de calcul de l'age
	public function calculationAge() {

		// Définit la date de naissance
		//$birthDate = '21-11-1985';
		// Calcule l'age à partir de l'année en cours et l'année de naissance
		$age = \date('Y') - \date('Y', \strtotime($this->birthDate));

		// Si le mois et le jour en cours est inférieur au mois et jour de naissance, alors on retourne l'age -1 ans
		if(\date('md') < \date('md', \strtotime($this->birthDate)))
		{
			$age =  $age - 1;
		}

		// Si le mois et le jour en cours est supérieur au mois et jour de naissance, alors on retourne l'age
		return $age . ' ans';

	}

}