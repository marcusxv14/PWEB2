<?php

include_once __DIR__ . '/../model/Cliente.php';
include_once __DIR__ . '/../model/DAO/ClienteDAO.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class ClienteController {

    private Cliente $cliente;
    private ClienteDAO $clienteDAO;

    public function __construct() {
        $this->clienteDAO = new ClienteDAO();
    }

    public function index() {
        $clientes = $this->clienteDAO->listarTudo();
        $_SESSION['clientes'] = $clientes;
        header('Location: ../view/cliente/mostrar_tudo.php');
    }

    public function show(int $id) {
        $cliente = $this->clienteDAO->bucar($id);
        $_SESSION['cliente'] = $cliente;
        header("Location: ../view/cliente/mostrar_registro.php?id=$id");
    }

    public function create() {
        header('Location: ../view/cliente/novo.php');
    }

    public function store() {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $dt_nasc = $_POST['dt_nasc'];
        $whatsapp = $_POST['whatsapp'];
        $logradouro = $_POST['logradouro'];
        $num = $_POST['num'];
        $bairro = $_POST['bairro'];

        $this->cliente = new Cliente($nome, $cpf, $dt_nasc, $whatsapp, $logradouro, $num, $bairro);

        $this->clienteDAO->inserir($this->cliente);

        header('Location: ../view/cliente/novo.php');
    }

    public function edit(int $id) {
        $cliente = $this->clienteDAO->bucar($id);
        $_SESSION['cliente'] = $cliente;
        header("Location: ../view/cliente/editar.php?id=$id");
    }

    public function update(int $id) {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $dt_nasc = $_POST['dt_nasc'];
        $whatsapp = $_POST['whatsapp'];
        $logradouro = $_POST['logradouro'];
        $num = $_POST['num'];
        $bairro = $_POST['bairro'];

        $this->cliente = new Cliente($nome, $cpf, $dt_nasc, $whatsapp, $logradouro, $num, $bairro);
        $this->cliente->setId($id);

        $this->clienteDAO->alterar($this->cliente);

        header('Location: ../index.php?classe=Cliente&metodo=index');
    }

    public function delete(int $id) {
        $this->cliente = $this->clienteDAO->bucar($id);
        $this->clienteDAO->excluir($this->cliente);

        header('Location: ../index.php?classe=Cliente&metodo=index');
    }
}