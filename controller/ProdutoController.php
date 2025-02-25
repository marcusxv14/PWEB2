<?php

include_once __DIR__ . '/../model/Produto.php';
include_once __DIR__ . '/../model/DAO/ProdutoDAO.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class ProdutoController {

    private Produto $produto;
    private ProdutoDAO $produtoDAO;

    public function __construct() {
        $this->produtoDAO = new ProdutoDAO();
    }

    public function index() {
        $produtos = $this->produtoDAO->listarTudo();
        $_SESSION['produtos'] = $produtos;
        header('Location: ../view/produto/mostrar_tudo.php');
    }

    public function show(int $id) {
        $produto = $this->produtoDAO->bucar($id);
        $_SESSION['produto'] = $produto;
        header("Location: ../view/produto/mostrar_registro.php?id=$id");
    }

    public function create() {
        header('Location: ../view/produto/novo.php');
    }

    public function store() {
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $marca = $_POST['marca'];
        $categoria = $_POST['categoria'];

        $this->produto = new Produto($nome, $valor, $marca, $categoria);

        $this->produtoDAO->inserir($this->produto);

        header('Location: ../view/produto/novo.php');
    }

    public function edit(int $id) {
        $produto = $this->produtoDAO->bucar($id);
        $_SESSION['produto'] = $produto;
        
        header("Location: ../view/produto/editar.php?id=$id");
    }

    public function update(int $id) {
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $marca = $_POST['marca'];
        $categoria = $_POST['categoria'];

        $this->produto = new Produto($nome, $valor, $marca, $categoria);
        $this->produto->setId($id);

        $this->produtoDAO->alterar($this->produto);

        header('Location: ../index.php?classe=Produto&metodo=index');
    }

    public function delete(int $id) {
        $this->produto = $this->produtoDAO->bucar($id);

        $this->produtoDAO->excluir($this->produto);

        header('Location: ../index.php?classe=Produto&metodo=index');
    }
}