<?php

include_once __DIR__ . '/../model/Agendamento.php';
include_once __DIR__ . '/../model/Cliente.php';
include_once __DIR__ . '/../model/Servico.php';
include_once __DIR__ . '/../model/DAO/AgendamentoDAO.php';
include_once __DIR__ . '/../model/DAO/ClienteDAO.php';
include_once __DIR__ . '/../model/DAO/ServicoDAO.php';

class AgendamentoController {

    private Agendamento $agendamento;
    private AgendamentoDAO $agendamentoDAO;
    private ClienteDAO $clienteDAO;
    private ServicoDAO $servicoDAO;

    public function __construct() {
        $this->agendamentoDAO = new AgendamentoDAO();
        $this->clienteDAO = new ClienteDAO();
        $this->servicoDAO = new ServicoDAO();
    }

    public function index() {
        $cliente_id = $this->clienteDAO->listarTudo();
        $servico_id = $this->servicoDAO->listarTudo();
        $agendamentos = $this->agendamentoDAO->listarTudo();
        $_SESSION['agendamentos'] = $agendamentos;
        $_SESSION['cliente_id'] = $cliente_id;
        $_SESSION['servico_id'] = $servico_id;
        header('Location: ../view/agendamento/mostrar_tudo.php');
    }

    public function show(int $id) {
        $agendamento = $this->agendamentoDAO->bucar($id);
        $cliente_id = $this->clienteDAO->listarTudo();
        $servico_id = $this->servicoDAO->listarTudo();
        
        $_SESSION['agendamento'] = $agendamento;
        $_SESSION['cliente_id'] = $cliente_id;
        $_SESSION['servico_id'] = $servico_id;
        header("Location: ../view/agendamento/mostrar_registro.php?id=$id");
    }

    public function create() {
        $cliente_id = $this->clienteDAO->listarTudo();
        $servico_id = $this->servicoDAO->listarTudo();
        
        $_SESSION['cliente_id'] = $cliente_id;
        $_SESSION['servico_id'] = $servico_id;
        header('Location: ../view/agendamento/novo.php');
    }

    public function store() {
        $cliente_id = $_POST['cliente_id'];
        $servico_id = $_POST['servico_id'];
        $data = $_POST['data'];
        $horario = $_POST['horario'];
        $duracao = $_POST['duracao'];
        $status = $_POST['status'];

        $this->agendamento = new Agendamento($cliente_id, $servico_id, $data, $horario, $duracao, $status);

        $this->agendamentoDAO->inserir($this->agendamento);

        header('Location: ../view/agendamento/novo.php');
    }

    public function edit(int $id) {
        $agendamento = $this->agendamentoDAO->bucar($id);
        $cliente_id = $this->clienteDAO->listarTudo();
        $servico_id = $this->servicoDAO->listarTudo();
        
        $_SESSION['agendamento'] = $agendamento;
        $_SESSION['cliente_id'] = $cliente_id;
        $_SESSION['servico_id'] = $servico_id;
        header("Location: ../view/agendamento/editar.php?id=$id");
    }

    public function update(int $id) {
        $cliente_id = $_POST['cliente_id'];
        $servico_id = $_POST['servico_id'];
        $data = $_POST['data'];
        $horario = $_POST['horario'];
        $duracao = $_POST['duracao'];
        $status = $_POST['status'];

        $this->agendamento = new Agendamento($cliente_id, $servico_id, $data, $horario, $duracao, $status);
        $this->agendamento->setId($id);

        $this->agendamentoDAO->alterar($this->agendamento);

        header('Location: ../index.php?classe=Agendamento&metodo=index');
    }

    public function delete(int $id) {
        $this->agendamento = $this->agendamentoDAO->bucar($id);

        $this->agendamentoDAO->excluir($this->agendamento);

        header('Location: ../index.php?classe=Agendamento&metodo=index');  
    }
}

