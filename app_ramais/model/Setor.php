<?php

class Setor {
	private $id;
	private $setor;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
        return $this;
	}
}

?>