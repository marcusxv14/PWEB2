<?php

include_once __DIR__ . '/../Servico.php';
include_once __DIR__ . '/../../core/Database.php';

class ServicoDAO {

    private $pdo;

    public function __construct() {
        $this->pdo = Database::conexao();
    }

    public function listarTudo(): array {
        $sql = "SELECT * FROM servicos";

        $stmt = $this->pdo->query($sql);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $servicos = [];
        foreach ($result as $servico) {
            $servicos[] = new Servico(
                $servico['nome'],
                $servico['valor'],
                $servico['descricao']
            );
            $servicos[count($servicos) - 1]->setId($servico['id']);
        }
        return $servicos;
    }

    public function inserir(Servico $servico): bool {
        $nome = $servico->getNome();
        $valor = $servico->getValor();
        $descricao = $servico->getDescricao();

        $sql = "INSERT INTO servicos (nome, valor, descricao) VALUES (:nome, :valor, :descricao)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':descricao', $descricao);

        return $stmt->execute();
    }

    public function bucar($id): Servico {
        $sql = "SELECT * FROM servicos WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $servico = new Servico(
            $result['nome'],
            $result['valor'],
            $result['descricao']
        );
        $servico->setId($result['id']);

        return $servico;
    }

    public function alterar(Servico $servico): bool {
        $id = $servico->getId();
        $nome = $servico->getNome();
        $valor = $servico->getValor();
        $descricao = $servico->getDescricao();

        $sql = "UPDATE servicos SET nome = :nome, valor = :valor, descricao = :descricao WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':descricao', $descricao);

        return $stmt->execute();
    }

    public function excluir(Servico $servico): bool {
        $id = $servico->getId();

        // Excluir primeiro todos os agendamentos associados ao serviço
        $sql = 'SELECT * FROM agendamentos WHERE servico_id = :id';

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $agendamento) {
            $sql = 'DELETE FROM agendamentos WHERE id = :id';

            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':id', $agendamento['id']);

            $stmt->execute();
        }

        // Depois exclui o serviço
        $sql = 'DELETE FROM servicos WHERE id = :id';

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

}
