<?php

namespace Portfolio;

class Field extends Form {

	// Méthodes de création d'un champ text
	public function fieldText($nameField, $placeholder, $valueField) {

		return '<input type="text" 
				name="' . $nameField . '" 
				id="' . $nameField . '" 
				placeholder="' . $placeholder . '"' 
				. $this->valueField($nameField, $valueField) . 
				' required >';

	}

	// Méthodes de création d'un champ email
	public function fieldEmail($nameField, $placeholder, $valueField) {

		return '<input type="email" 
				name="' . $nameField . '" 
				id="' . $nameField . '" 
				placeholder="' . $placeholder . '"' 
				. $this->valueField($nameField, $valueField) . 
				' required >';

	}

	public function fieldTextarea($nameField, $placeholder, $valueField) {

		return '<textarea name="' . $nameField . '" 
				id="' . $nameField . '" 
				placeholder="' . $placeholder . '" 
				rows="' . self::ROWS . '" 
				cols="' . self::COLS . '" required >' 
				. $this->valueField($nameField, $valueField) . 
				'</textarea>';

	}

	private function valueField($namefield, $valueField) {

		if($namefield !== 'message') {

			return 'value="' . $valueField . '"';

		}

		return $valueField;

	}

}