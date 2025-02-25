<?php

include_once __DIR__ . '/../model/Compra.php';
include_once __DIR__ . '/../model/Cliente.php';
include_once __DIR__ . '/../model/Produto.php';
include_once __DIR__ . '/../model/DAO/CompraDAO.php';
include_once __DIR__ . '/../model/DAO/ClienteDAO.php';
include_once __DIR__ . '/../model/DAO/ProdutoDAO.php';

class CompraController {

    private Compra $compra;
    private CompraDAO $compraDAO;
    private ClienteDAO $clienteDAO;
    private ProdutoDAO $produtoDAO;

    public function __construct() {
        $this->compraDAO = new CompraDAO();
        $this->clienteDAO = new ClienteDAO();
        $this->produtoDAO = new ProdutoDAO();
    }

    public function index() {
        $compras = $this->compraDAO->listarTudo();
        $cliente_id = $this->clienteDAO->listarTudo();
        $produto_id = $this->produtoDAO->listarTudo();

        $_SESSION['compras'] = $compras;
        $_SESSION['cliente_id'] = $cliente_id;
        $_SESSION['produto_id'] = $produto_id;
        header('Location: ../view/compra/mostrar_tudo.php');
    }

    public function show(int $id) {
        $compra = $this->compraDAO->bucar($id);
        $cliente_id = $this->clienteDAO->listarTudo();
        $produto_id = $this->produtoDAO->listarTudo();

        $_SESSION['compra'] = $compra;
        $_SESSION['cliente_id'] = $cliente_id;
        $_SESSION['produto_id'] = $produto_id;
        header("Location: ../view/compra/mostrar_registro.php?id=$id");
    }

    public function create() {
        $cliente_id = $this->clienteDAO->listarTudo();
        $produto_id = $this->produtoDAO->listarTudo();

        $_SESSION['cliente_id'] = $cliente_id;
        $_SESSION['produto_id'] = $produto_id;
        header('Location: ../view/compra/novo.php');
    }

    public function store() {
        $cliente_id = $_POST['cliente_id'];
        $produto_id = $_POST['produto_id'];
        $data = $_POST['data'];
        $horario = $_POST['horario'];
        $qtd = $_POST['qtd'];

        $this->compra = new Compra($cliente_id, $produto_id, $data, $horario, $qtd);

        $this->compraDAO->inserir($this->compra);

        header('Location: ../view/compra/novo.php');
    }

    public function edit(int $id) {
        $compra = $this->compraDAO->bucar($id);
        $cliente_id = $this->clienteDAO->listarTudo();
        $produto_id = $this->produtoDAO->listarTudo();

        $_SESSION['compra'] = $compra;
        $_SESSION['cliente_id'] = $cliente_id;
        $_SESSION['produto_id'] = $produto_id;        
        header("Location: ../view/compra/editar.php?id=$id");
    }

    public function update(int $id) {
        $cliente_id = $_POST['cliente_id'];
        $produto_id = $_POST['produto_id'];
        $data = $_POST['data'];
        $horario = $_POST['horario'];
        $qtd = $_POST['qtd'];

        $this->compra = new Compra($cliente_id, $produto_id, $data, $horario, $qtd);
        $this->compra->setId($id);

        $this->compraDAO->alterar($this->compra);

        header('Location: ../index.php?classe=Compra&metodo=index');
    }

    public function delete(int $id) {
        $this->compra = $this->compraDAO->bucar($id);

        $this->compraDAO->excluir($this->compra);

        header('Location: ../index.php?classe=Compra&metodo=index');
    }
}

