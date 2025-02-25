<?php

include_once __DIR__ . '/../Agendamento.php';
include_once __DIR__ . '/../../core/Database.php';

class AgendamentoDAO {

    private $pdo;

    public function __construct() {
        $this->pdo = Database::conexao();
    }

    public function listarTudo(): array {
        $sql = 'SELECT * FROM agendamentos';
        $stmt = $this->pdo->query($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $agendamentos = [];
        foreach ($result as $agendamento) {
            $agendamentos[] = new Agendamento(
                $agendamento['cliente_id'],
                $agendamento['servico_id'],
                $agendamento['data'],
                $agendamento['horario'],
                $agendamento['duracao'],
                $agendamento['status']
            );
            $agendamentos[count($agendamentos) - 1]->setId($agendamento['id']);
        }
        return $agendamentos;
    }

    public function inserir(Agendamento $agendamento): bool {
        $cliente_id = $agendamento->getCliente_id();
        $servico_id = $agendamento->getServico_id();
        $data = $agendamento->getData();
        $horario = $agendamento->getHorario();
        $duracao = $agendamento->getDuracao();
        $status = $agendamento->getStatus() ? 1 : 0;

        $sql = 'INSERT INTO agendamentos (cliente_id, servico_id, data, horario, duracao, status)
        VALUES(:cliente_id, :servico_id, :data, :horario, :duracao, :status)';
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':cliente_id', $cliente_id);
        $stmt->bindParam(':servico_id', $servico_id);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':horario', $horario);
        $stmt->bindParam(':duracao', $duracao);
        $stmt->bindParam(':status', $status);

        return $stmt->execute();
    }

    public function bucar($id): Agendamento {
        $sql = 'SELECT * FROM agendamentos WHERE id = :id';

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
      
        $agendamento = new Agendamento(
            $result['cliente_id'],
            $result['servico_id'],
            $result['data'],
            $result['horario'],
            $result['duracao'],
            $result['status']
        );
        $agendamento->setId($result['id']);
        
        return $agendamento;
    }

    public function alterar(Agendamento $agendamento): bool {
        $id = $agendamento->getId();
        $cliente_id = $agendamento->getCliente_id();
        $servico_id = $agendamento->getServico_id();
        $data = $agendamento->getData();
        $horario = $agendamento->getHorario();
        $duracao = $agendamento->getDuracao();
        $status = $agendamento->getStatus() ? 1 : 0;

        $sql = 'UPDATE agendamentos
        SET cliente_id = :cliente_id, servico_id = :servico_id, data = :data, horario = :horario, duracao = :duracao, status = :status
        WHERE id = :id';

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':cliente_id', $cliente_id);
        $stmt->bindParam(':servico_id', $servico_id);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':horario', $horario);
        $stmt->bindParam(':duracao', $duracao);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function excluir(Agendamento $agendamento): bool {
        $id = $agendamento->getId();
        $sql = 'DELETE FROM agendamentos WHERE id = :id';

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}
