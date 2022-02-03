<?php

class Ramal {
	private $id;
	private $numero;
	

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
        return $this;
	}
}

?>