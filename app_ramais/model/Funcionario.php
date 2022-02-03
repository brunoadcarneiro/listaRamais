<?php

class Funcionario {
	private $id;
	private $nome;
	private $ramal_id;
	private $setor_id;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
        return $this;
	}
}

?>