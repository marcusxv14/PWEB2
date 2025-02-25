<?php

class Cliente {
    
    private int $id;
    private string $nome;
    private string $cpf;
    private string $dt_nasc;
    private string $whatsapp;
    private string $logradouro;
    private int $num;
    private string $bairro;

	public function __construct(string $nome, string $cpf, string $dt_nasc, string $whatsapp, string $logradouro, int $num, string $bairro) {

		$this->nome = $nome;
		$this->cpf = $cpf;
		$this->dt_nasc = $dt_nasc;
		$this->whatsapp = $whatsapp;
		$this->logradouro = $logradouro;
		$this->num = $num;
		$this->bairro = $bairro;
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

	public function getCpf() : string {
		return $this->cpf;
	}

	public function setCpf(string $value) {
		$this->cpf = $value;
	}

	public function getDt_nasc() : string {
		return $this->dt_nasc;
	}

	public function setDt_nasc(string $value) {
		$this->dt_nasc = $value;
	}

	public function getWhatsapp() : string {
		return $this->whatsapp;
	}

	public function setWhatsapp(string $value) {
		$this->whatsapp = $value;
	}

	public function getLogradouro() : string {
		return $this->logradouro;
	}

	public function setLogradouro(string $value) {
		$this->logradouro = $value;
	}

	public function getNum() : int {
		return $this->num;
	}

	public function setNum(int $value) {
		$this->num = $value;
	}

	public function getBairro() : string {
		return $this->bairro;
	}

	public function setBairro(string $value) {
		$this->bairro = $value;
	}
}
