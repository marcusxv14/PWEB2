<?php

include_once __DIR__ . '/../Compra.php';
include_once __DIR__ . '/../../core/Database.php';

class CompraDAO {

    private $pdo;

    public function __construct() {
        $this->pdo = Database::conexao();
    }

    public function listarTudo(): array {
        $sql = 'SELECT * FROM compras';

        $stmt = $this->pdo->query($sql);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $compras = [];
        foreach ($result as $compra) {
            $compras[] = new Compra(
                $compra['cliente_id'],
                $compra['produto_id'],
                $compra['data'],
                $compra['horario'],
                $compra['qtd']
            );
            $compras[count($compras) - 1]->setId($compra['id']);
        }
        return $compras;
    }

    public function inserir(Compra $compra): bool {
        $cliente_id = $compra->getCliente_id();
        $produto_id = $compra->getProduto_id();
        $data = $compra->getData();
        $horario = $compra->getHorario();
        $qtd = $compra->getQtd();

        $sql = 'INSERT INTO compras (cliente_id, produto_id, data, horario, qtd)
        VALUES (:cliente_id, :produto_id, :data, :horario, :qtd)';

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':cliente_id', $cliente_id);
        $stmt->bindParam(':produto_id', $produto_id);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':horario', $horario);
        $stmt->bindParam(':qtd', $qtd);

        return $stmt->execute();
    }

    public function bucar($id): Compra {
        $sql = 'SELECT * FROM compras WHERE id = :id';

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $compra = new Compra(
            $result['cliente_id'],
            $result['produto_id'],
            $result['data'],
            $result['horario'],
            $result['qtd']
        );
        $compra->setId($result['id']);

        return $compra;
    }

    public function alterar(Compra $compra): bool {
        $id = $compra->getId();
        $cliente_id = $compra->getCliente_id();
        $produto_id = $compra->getProduto_id();
        $data = $compra->getData();
        $horario = $compra->getHorario();
        $qtd = $compra->getQtd();

        $sql = 'UPDATE compras
        SET cliente_id = :cliente_id, produto_id = :produto_id, data = :data, horario = :horario, qtd = :qtd
        WHERE id = :id';

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':cliente_id', $cliente_id);
        $stmt->bindParam(':produto_id', $produto_id);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':horario', $horario);
        $stmt->bindParam(':qtd', $qtd);

        return $stmt->execute();
    }

    public function excluir(Compra $compra): bool {
        $id = $compra->getId();

        $sql = 'DELETE FROM compras WHERE id = :id';

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

}
