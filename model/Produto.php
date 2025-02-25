<?php 

class Produto {

    private int $id;
    private string $nome;
    private float $valor;
    private string $marca;
    private string $categoria;

	public function __construct(string $nome, float $valor, string $marca, string $categoria) {

		$this->nome = $nome;
		$this->valor = $valor;
		$this->marca = $marca;
		$this->categoria = $categoria;
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

	public function getMarca() : string {
		return $this->marca;
	}

	public function setMarca(string $value) {
		$this->marca = $value;
	}

	public function getCategoria() : string {
		return $this->categoria;
	}

	public function setCategoria(string $value) {
		$this->categoria = $value;
	}
}
