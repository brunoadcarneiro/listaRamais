<?php


class Usuario
{

	private $id;
	private $nome;
	private $senha;
	private $permissao;
	private $status;
	

	public function __get($atributo)
	{
		return $this->$atributo;
	}

	public function __set($atributo, $valor)
	{
		$this->$atributo = $valor;
		return $this;
	}
}