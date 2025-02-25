<?php

class Agendamento {

    private int $id;
    private int $cliente_id;
    private int $servico_id;
    private string $data;
    private string $horario;
    private string $duracao;
    private bool $status;

	public function __construct(int $cliente_id, int $servico_id, string $data, string $horario, string $duracao, bool $status) {
		
		$this->cliente_id = $cliente_id;
		$this->servico_id = $servico_id;
		$this->data = $data;
		$this->horario = $horario;
		$this->duracao = $duracao;
		$this->status = $status;
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

	public function getServico_id() : int {
		return $this->servico_id;
	}

	public function setServico_id(int $value) {
		$this->servico_id = $value;
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

	public function getDuracao() : string {
		return $this->duracao;
	}

	public function setDuracao(string $value) {
		$this->duracao = $value;
	}

	public function getStatus() : bool {
		return $this->status;
	}

	public function setStatus(bool $value) {
		$this->status = $value;
	}
}
