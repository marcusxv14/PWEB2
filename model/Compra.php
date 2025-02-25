<?php

class Compra {

    private int $id;
    private int $cliente_id;
    private int $produto_id;
    private string $data;
    private string $horario;
    private int $qtd;

	public function __construct(int $cliente_id, int $produto_id, string $data, string $horario, int $qtd) {

		$this->cliente_id = $cliente_id;
		$this->produto_id = $produto_id;
		$this->data = $data;
		$this->horario = $horario;
		$this->qtd = $qtd;
	}

	public function getId() : int {
		return $this->id;
	}

	public function setId(int $value) {
		$this->id = $value;
	}

	public function getCliente_id() : int {
		return $this->cliente_id;
	}

	public function setCliente_id(int $value) {
		$this->cliente_id = $value;
	}

	public function getProduto_id() : int {
		return $this->produto_id;
	}

	public function setProduto_id(int $value) {
		$this->produto_id = $value;
	}

	public function getData() : string {
		return $this->data;
	}

	public function setData(string $value) {
		$this->data = $value;
	}

	public function getHorario() : string {
		return $this->horario;
	}

	public function setHorario(string $value) {
		$this->horario = $value;
	}

	public function getQtd() : int {
		return $this->qtd;
	}

	public function setQtd(int $value) {
		$this->qtd = $value;
	}
}
