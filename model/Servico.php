<?php

class Servico {

    private int $id;
    private string $nome;
    private float $valor;
    private string $descricao;

	public function __construct(string $nome, float $valor, string $descricao) {

		$this->nome = $nome;
		$this->valor = $valor;
		$this->descricao = $descricao;
	}

	public function getId() : int {
		return $this->id;
	}

	public function setId(int $value) {
		$this->id = $value;
	}

	public function getNome() : string {
		return $this->nome;
	}

	public function setNome(string $value) {
		$this->nome = $value;
	}

	public function getValor() : float {
		return $this->valor;
	}

	public function setValor(float $value) {
		$this->valor = $value;
	}

	public function getDescricao() : string {
		return $this->descricao;
	}

	public function setDescricao(string $value) {
		$this->descricao = $value;
	}
}
