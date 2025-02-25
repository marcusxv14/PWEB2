<?php

include_once __DIR__ . '/../model/DAO/ServicoDAO.php';
include_once __DIR__ . '/../model/Servico.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class ServicoController {

    private Servico $servico;
    private ServicoDAO $servicoDAO;

    public function __construct() {
        $this->servicoDAO = new ServicoDAO();
    }

    public function index() {
        $servicos = $this->servicoDAO->listarTudo();
        $_SESSION['servicos'] = $servicos;
        header('Location: ../view/servico/mostrar_tudo.php');
    }

    public function show(int $id) {
        $servico = $this->servicoDAO->bucar($id);
        $_SESSION['servico'] = $servico;
        header("Location: ../view/servico/mostrar_registro.php?id=$id");
    }

    public function create() {
        header('Location: ../view/servico/novo.php');
    }

    public function store() {
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $descricao = $_POST['descricao'];

        $this->servico = new Servico($nome, $valor, $descricao);

        $this->servicoDAO->inserir($this->servico);

        header('Location: ../view/servico/novo.php');
    }

    public function edit(int $id) {
        $servico = $this->servicoDAO->bucar($id);
        $_SESSION['servico'] = $servico;
        header("Location: ../view/servico/editar.php?id=$id");
    }

    public function update(int $id) {
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $descricao = $_POST['descricao'];
        
        $this->servico = new Servico($nome, $valor, $descricao);
        $this->servico->setId($id);

        $this->servicoDAO->alterar($this->servico);

        header('Location: ../index.php?classe=Servico&metodo=index');
    }

    public function delete(int $id) {
        $this->servico = $this->servicoDAO->bucar($id);

        $this->servicoDAO->excluir($this->servico);

        header('Location: ../index.php?classe=Servico&metodo=index');
    }
}